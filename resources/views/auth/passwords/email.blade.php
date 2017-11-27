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
            	@if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
        			{{ csrf_field() }}
        			
                    <label class="full">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="Email" required autofocus>
                    	@if ($errors->has('email'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('email') }}</strong>
	                        </span>
	                    @endif
                    </label>
				
                    <div>
                        <input type="submit" value="Send Password Reset Link" class="button">
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
