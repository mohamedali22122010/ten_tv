@extends('layouts.backend',['page_title'=>'Create Admin users'])
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form  class="form-inputs" id="product-form" action="{{ route('users.store') }}" data-parsley-validate="true" method="post">
					@include('backend.users._form')
				</form>
			</div>
			<!-- form -->
		</div>
		<!-- forms div -->
	</div>
</div>
@stop
