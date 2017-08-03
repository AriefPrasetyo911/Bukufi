@extends('app')
@section('content')
<style type="text/css">
    h3{
        margin-top: 0;
        margin-bottom: 0;
        text-align: center;
    }

    .user-login{
        position: relative;
        top: 100px;
    }
</style>
<div class="container user-login">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @if (Session::has('notif'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                    {{ Session::get('notif') }}
                </div>
            @endif

            @if (Session::has('notif-fail'))
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                    {{ Session::get('notif-fail') }}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading"><h3>User Login</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('user.auth') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">E-Mail</label>
                            <div class="col-md-7">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label">Password</label>
                            <div class="col-md-7">
                                <input type="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-3">
                                <button type="submit" class="btn btn-primary">Login</button>
                                <button type="reset" class="btn btn-warning pull-right">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer text-center">
                    Not have an account? <a href="{{route('user.register')}}" title="Register new account">Register Here</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection