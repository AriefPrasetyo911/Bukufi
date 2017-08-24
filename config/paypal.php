<?php
return array(
/** set your paypal credential **/
'client_id' =>'AWNje2FgLSV9zQHbFAIWKxBxt84i9tTIOkUJP93Hvpd7d9n4_mzueVY3bnuj26QUJ8-KLExFkIl6R7nJ',
'secret' => 'EE_quzOb8NpH6w4YMph_xpUjj3I-XR_Qzr4yAAiTm1VHOJ5tslcT8w4S4bXyCMvcyayqAdqcsTsDvE7n',
/**
* SDK configuration 
*/
'settings' => array(
/**
* Available option 'sandbox' or 'live'
*/
'mode' => 'live',
/**
* Specify the max request time in seconds
*/
'http.ConnectionTimeOut' => 3000,
/**
* Whether want to log to a file
*/
'log.LogEnabled' => true,
/**
* Specify the file that want to write on
*/
'log.FileName' => storage_path() . '/logs/paypal.log',
/**
* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
*
* Logging is most verbose in the 'FINE' level and decreases as you
* proceed towards ERROR
*/
'log.LogLevel' => 'FINE'
),
);