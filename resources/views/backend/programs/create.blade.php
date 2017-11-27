@extends('layouts.backend',['page_title'=>trans('backend.Create New Program')])
@section('title')@parent - {{ trans('product.globals.categories') }} @stop
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form class="form-inputs" id="program-form" action="{{ route('program.store') }}" data-parsley-validate="true" method="program">
					@include('backend.programs._form')
				</form>
			</div>
			<!-- form -->
		</div>
		<!-- forms div -->
	</div>
</div>
@stop