@extends('layouts.login')

@section('content')
    <div class="login-box-body">
        <p class="login-box-msg">{{trans('frontend.login_header')}}</p>
        @if (isset($errors) && !empty($errors->all()))
            <span class="help-block">
	        @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
	    </span>
        @endif
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}" lang="ar">
            {{ csrf_field() }}
            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">{{trans('frontend.user_email')}}</label>
                <div class="col-md-6">
                    <input id="email" type="text" class="form-control" name="email" value="" placeholder="Email"
                           required autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
            </div>
            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">{{trans('frontend.user_password')}}</label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required
                           placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
            </div>
            <div class="row margin-t-40">
                <div class="col-xs-4">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember">{{trans('frontend.remember_me')}} </label>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">{{trans('frontend.login_title')}}</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
    <!-- /.login-box-body -->
@endsection