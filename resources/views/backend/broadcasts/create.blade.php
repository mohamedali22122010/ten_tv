@extends('layouts.backend',['page_title'=>trans('backend.Create New Broadcast')])
@section('title')@parent - {{ trans('product.globals.categories') }} @stop
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form class="form-inputs" id="broadcast-form" action="{{ route('broadcast.store') }}" data-parsley-validate="true" method="post">
					@include('backend.broadcasts._form')
				</form>
			</div>
			<!-- form -->
		</div>
		<!-- forms div -->
	</div>
</div>
@stop