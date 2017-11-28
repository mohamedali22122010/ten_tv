@extends('layouts.backend',['page_title'=>trans('backend.Edit Broadcast') ." (".$broadcast->show_at.")"])
@section('title')@parent - {{ trans('product.globals.categories') }} @stop
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form class="form-inputs" id="broadcast-form" action="{{ route('broadcast.update',$broadcast->id) }}" data-parsley-validate="true" method="post" >
					<input type="hidden" name="_method" value="PUT">
					@include('backend.broadcasts._form')
				</form>
			</div>
			<!-- form -->
		</div>
		<!-- forms div -->
	</div>
</div>
@stop