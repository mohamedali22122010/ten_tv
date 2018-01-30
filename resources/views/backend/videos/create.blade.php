@extends('layouts.backend',['page_title'=>trans('backend.Create New Video')])
@section('title')@parent - {{ trans('product.globals.categories') }} @stop
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form class="form-inputs" id="video-form" action="{{ route('video.store') }}" data-parsley-validate="true" method="post">
					@include('backend.videos._form')
				</form>
			</div>
			<!-- form -->
		</div>
		<!-- forms div -->
	</div>
</div>
@stop