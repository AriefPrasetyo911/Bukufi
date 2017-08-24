<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon;
use Validator;
use URL;
use Session;
use Redirect;
 
/** All Paypal Details class **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{   
    private $_api_context;

    public function __construct()
    {
        $user = auth()->guard('user')->user();

        /** setup PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    //dashboard
    public function dashboard(){
        $user = auth()->guard('user')->user();

        $get_user_id        = auth()->guard('user')->user()->id;
        
        $check_membership   = User::where('id', $get_user_id)->get();
        
        $date_now           = date('l , d F Y');

        foreach ($check_membership as $data) {
            //check
            $membership_type    = $data->membership;
            
            if ($membership_type == "Paid") {

                $date_now       = \Carbon\Carbon::now();
                $subscribe_end  = \Carbon\Carbon::parse($data->subscribe_end);
                
                $remaining_minutes  = $date_now->diffInMinutes($subscribe_end);
                $remaining_hours    = $date_now->diffInHours($subscribe_end);
                $remaining_days     = $date_now->diffInDays($subscribe_end);

                if($subscribe_end > $date_now)
                {
                    //do not do anything
                }
                else{
                    //has expired paid membership, lets update membership back to free
                    $frees  = User::where('id', $get_user_id)->first();
                    $frees->membership        = 'Free';
                    $frees->subscribe_start   = null;
                    $frees->subscribe_end     = null;
                    $frees->update();
                }

            }
            else{
                //no need do anything, we only do in paid membership
            }
            
        }

        return view('Back-end/User/user-dashboard', compact('check_membership', 'membership_type', 'remaining_minutes', 'remaining_hours', 'remaining_days', 'date_now'));
    }

    //PAYPAL
    public function payWithPaypal()
    {
        $user = auth()->guard('user')->user();

        $get_user_id        = auth()->guard('user')->user()->id;
        
        $check_membership   = User::where('id', $get_user_id)->get();
        
        $date_now           = date('l , d F Y');

        foreach ($check_membership as $data) {
            //check
            $membership_type    = $data->membership;
            
            if ($membership_type == "Paid") {

                $date_now       = \Carbon\Carbon::now();
                $subscribe_end  = \Carbon\Carbon::parse($data->subscribe_end);
                
                $remaining_minutes  = $date_now->diffInMinutes($subscribe_end);
                $remaining_hours    = $date_now->diffInHours($subscribe_end);
                $remaining_days     = $date_now->diffInDays($subscribe_end);

                if($subscribe_end > $date_now)
                {
                    //do not do anything
                }
                else{
                    //has expired paid membership, lets update membership back to free
                    $frees  = User::where('id', $get_user_id)->first();
                    $frees->membership        = 'Free';
                    $frees->subscribe_start   = null;
                    $frees->subscribe_end     = null;
                    $frees->update();
                }

            }
            else{
                //no need do anything, we only do in paid membership
            }
            
        }

        return view('Back-end/User/user-dashboard', compact('check_membership', 'membership_type', 'remaining_minutes', 'remaining_hours', 'remaining_days', 'date_now'));
    }

    /**
     * Store a details of payment with paypal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function postPaymentWithpaypal(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'quantity'  => 'required|numeric',
            'amount'    => 'required|numeric',
            'user_id'   => 'required'
        ]);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();
        $item_1->setName($request->get('Subscription Paid Membership Bukufi')) /** item name **/
            ->setCurrency('USD')
            ->setQuantity($request->get('quantity'))
            ->setPrice($request->get('amount')); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal(( $request->get('amount') * $request->get('quantity') ));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Subscription Paid Membership Bukufi');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment.status')) /** Specify return URL **/
            ->setCancelUrl(URL::route('payment.status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
            /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::route('paypal.paywithpaypal');
                /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                /** $err_data = json_decode($ex->getData(), true); **/
                /** exit; **/
            } else {
                \Session::put('error','Some error occur, sorry for inconvenient');
                return Redirect::route('paypal.paywithpaypal');
                /** die('Some error occur, sorry for inconvenient'); **/
            }
        }
        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        $request->session()->put('paypal_payment_id', $payment->getId());

        /** add payment user ID to session **/
        $request->session()->put('user_id', $request->user_id);

        if(isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        $request->session()->put('error','Unknown error occurred');
        return Redirect::route('paypal.paywithpaypal');
    }

    public function getPaymentStatus(Request $request)
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** Get the payment user ID before session clear **/
        $user_id = Session::get('user_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            \Session::put('error','Payment failed');
            return Redirect::route('paypal.paywithpaypal');
        }

        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/

        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        /** dd($result);exit; /** DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') { 
            
            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/

            $date_now   = date('Y-m-d');
            $date_30    = date('Y-m-d', strtotime('+30 days', time()));

            $updates = User::where('id', '=', $user_id)->first();
            $updates->membership        = 'Paid';
            $updates->subscribe_start   = $date_now;
            $updates->subscribe_end     = $date_30;
            $updates->update();

            $request->session()->put('success','Payment success, Thank You.');
            return Redirect::route('paypal.paywithpaypal');
        }
        $request->session()->put('error','Payment failed.');
        return Redirect::route('paypal.paywithpaypal');
    }

}
