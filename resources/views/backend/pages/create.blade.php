@extends('layouts.backend',['page_title'=>'Create New Page'])
@section('title')@parent - {{ trans('product.globals.categories') }} @stop
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form class="form-inputs" id="page-form" action="{{ route('pages.store') }}" data-parsley-validate="true" method="post">
					@include('backend.pages._form')
				</form>
			</div>
			<!-- form -->
		</div>
		<!-- forms div -->
	</div>
</div>
@stop