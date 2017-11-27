@extends('layouts.frontend')

@section('content')

<!-- Page title -->
    <div class="page-title parallax-style parallax1">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading">
                        <h2>Reset Password</h2>
                    </div>
                    <!-- /.page-title-heading -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.page-title -->

    <div class="page-breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="flat-wrapper">
                    <div class="breadcrumbs">
                        <h2 class="trail-browse">You are here:</h2>
                        <ul class="trail-items">
                            <li class="trail-item"><a href="{{url('/')}}">Home</a></li>
                            <li>Reset Password</li>
                        </ul>
                    </div>
                    <!-- /.breadcrumbs -->
                </div>
                <!-- /.flat-wrapper -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.page-breadcrumbs -->

    <!-- loginForm -->
    <div class="loginSignUpWrapper">
        <div class="container">
            <div class="loginWrapper">
                <form role="form" method="POST" action="{{ url('/password/reset') }}">
        			{{ csrf_field() }}
        			
        			<input type="hidden" name="token" value="{{ $token }}">
                    <label class="full">
                    	<input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="Email" required autofocus>
                    	@if ($errors->has('email'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('email') }}</strong>
	                        </span>
	                    @endif
                    </label>
				
                    <label class="full">
                        <input id="password" type="password" class="form-control" name="password" placeholder="New Password" required>
                    	@if ($errors->has('password'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('password') }}</strong>
	                        </span>
	                    @endif
                    </label>

                    <label class="full">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                    	@if ($errors->has('password_confirmation'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('password_confirmation') }}</strong>
	                        </span>
	                    @endif
                    </label>

                    <div>
                        <input type="submit" value="Reset Password" class="button">
                    </div>
                </form>

                <hr>

            </div>
            <!-- loginWrapper -->
        </div>
        <!-- container -->
    </div>
    <!-- loginForm -->
	
@endsection
