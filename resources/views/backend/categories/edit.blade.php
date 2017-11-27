@extends('layouts.backend',['page_title'=>trans('backend.Edit Category') ." (".$category->title.")"])
@section('title')@parent - {{ trans('product.globals.categories') }} @stop
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form class="form-inputs" id="category-form" action="{{ route('category.update',$category->id) }}" data-parsley-validate="true" method="post" >
					<input type="hidden" name="_method" value="PUT">
					@include('backend.categories._form')
				</form>
			</div>
			<!-- form -->
		</div>
		<!-- forms div -->
	</div>
</div>
@stop