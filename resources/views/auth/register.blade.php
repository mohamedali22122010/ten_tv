@extends('layouts.frontend')

@section('content')
<div class="bredcramp">
	<div class="container">
		<ul>
			<li><a href="{{ url('/') }}">الرئيسية</a></li>
			<li><span> / </span></li>
			<li><a href="{{ url('register') }}">عضوية جديدة</a></li>
		</ul>
	</div><!--container-->
</div><!--bredcramp-->
<main>
	<div class="container">
		<div class="col-md-5 center-div">
			<div class="login-div">
				<h2>عضوية جديدة</h2>
				<div class="row no-margin">

					<form class="validate-form" method="POST" action="{{ url('/register') }}" data-parsley-validate>

	        			{{ csrf_field() }}
						<input type="hidden" name="type" value="{{ Request::get('type') }}" />
						<div class="row-form">
							<label>اسم المستخدم</label>
							<input id="name" type="text" class="form-control" name="name" data-parsley-required="true" value="{{ old('name') }}" placeholder="اسم المستخدم" required="required">
							@if ($errors->has('name'))
		                        <span class="help-block error">
		                            <strong>{{ $errors->first('name') }}</strong>
		                        </span>
		                    @endif
						</div><!--row-form-->
						<div class="row-form">
							<label>البريد الإلكتروني</label>
							<input id="email" type="email" class="form-control" name="email"  data-parsely-required="true" value="{{ old('email') }}" placeholder="البريد الإلكتروني" required="required">
							@if ($errors->has('email'))
		                        <span class="help-block error">
		                            <strong>{{ $errors->first('email') }}</strong>
		                        </span>
		                    @endif
						</div><!--row-form-->
						<div class="row-form">
							<label>كلمة المرور</label>
							<input id="password" type="password" class="form-control" name="password" data-parsely-required="true" placeholder="كلمة المرور" required="required">
							@if ($errors->has('password'))
		                        <span class="help-block error">
		                            <strong>{{ $errors->first('password') }}</strong>
		                        </span>
		                    @endif
						</div><!--row-form-->
						<div class="row-form">
							<label> تأكيد كلمة المرور</label>
							<input id="password-confirm" type="password" data-parsley-equalto="#password" class="form-control" name="password_confirmation" data-parsely-required="true" placeholder="تأكيد كلمة المرور" required="required">
						</div><!--row-form-->
						<div class="row-form">
							<div class="row">
								<div class="col-md-12">
									<button class="button">عضوية جديدة</button>
								</div><!--col-->
								
							</div><!--row-->
						</div><!--row-form-->
						<div class="row-form">
							<a href="{{ url('/redirect', Request::get('type') ) }}" class="regist-twitter">التسجيل باستخدام تويتر</a>
						</div><!--row-form-->
						<div class="row-form">
														أملك حساب بالفعل  انتقل الى صفحة <a href="{{ url('/login') }}" class="link">تسجيل الدخول </a>

						</div><!--row-form-->
					</form>
				</div><!--row-->
			</div><!--login-div-->
		</div><!--col-->
	</div><!--container-->
</main>

@endsection