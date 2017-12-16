@extends('layouts.backend',['page_title'=>'Edit Slide "'.$slider->id.'"'])
@section('title')@parent - {{ trans('product.globals.categories') }} @stop
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form class="form-inputs" id="slider-form" action="{{ route('sliders.update',$slider->id) }}" data-parsley-validate="true" method="post" enctype="multipart/form-data">
					<input type="hidden" name="_method" value="PUT">
					@include('backend.sliders._form')
				</form>
			</div>
			<!-- form -->
		</div>
		<!-- forms div -->
	</div>
</div>
@stop