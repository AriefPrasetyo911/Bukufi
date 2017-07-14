<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Sign-Up/Login Form</title>
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{asset('theme/css/Login/style.css')}}">
</head>

<body>
    <div class="form">
        <div id="login">   
            <h1>Welcome Back!</h1>
      
            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login.submit') }}">
                {{ csrf_field() }}
      
                <div class="field-wrap{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label>
                        Email Address<span class="req">*</span>
                    </label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="off">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
      
                <div class="field-wrap{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label>
                        Password<span class="req">*</span>
                    </label>
                    <input id="password" type="password" class="form-control" name="password" required autocomplete="off">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <p class="forgot"><a href="{{ route('password.request') }}">Forgot Password?</a></p>
                <button class="button button-block"/>Log In</button>
            </form>
        </div>
    </div> <!-- /form -->
</body>
<script type="text/javascript" src="{{asset('theme/js/Bootstrap/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme/js/Login/index.js')}}"></script>
