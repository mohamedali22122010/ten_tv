@extends('layouts.backend',['page_title'=>'Create New Bank'])
@section('content-header')
    <h1>
        {{ trans('backend.Roles') }}
    </h1>
@stop

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header with-border">
	        </div>
			<!-- /.box-header -->
			<div class="box-body">
				<form class="form-inputs" id="role-form" action="{{ route('roles.store') }}" data-parsley-validate="true" method="post">
					@include('backend.roles._form')
				</form>
			</div>
			<!-- form -->
		</div>
		<!-- forms div -->
	</div>
</div>
@stop
