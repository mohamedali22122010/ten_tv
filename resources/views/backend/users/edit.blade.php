@extends('layouts.backend',['page_title'=>'Edit Admin User "'.$user->name.'"'])
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form  class="form-inputs" id="product-form" action="{{ route('users.update',$user->id) }}" data-parsley-validate="true" method="post">
					<input type="hidden" name="_method" value="put">
					@include('backend.users._form')
				</form>
			</div>
			<!-- form -->
		</div>
		<!-- forms div -->
	</div>
</div>
@stop
