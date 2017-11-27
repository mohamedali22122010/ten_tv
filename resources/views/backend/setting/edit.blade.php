@extends('layouts.backend',['page_title'=>trans('backend.Edit Site General Setting')])
@section('title')@parent - {{ trans('product.globals.categories') }} @stop
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header"></div>
			<!-- /.box-header -->
			<div class="box-body">
				<form class="form-inputs" id="setting-form" action="{{ route('setting.edit') }}" data-parsley-validate="true" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="nav-tabs-custom">
						<div class="tab-content">
							<div class="form-group row">
								@foreach($setting as $key=>$value)
						        <div class="form-group col-lg-6">
						        	<label>{{ trans('backend.'.preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', $key))}} :</label>
						        	<input class="form-control" type="text" name="{{$key}}" value="{{old($key,$value)}}">
						        </div>
						        @endforeach
							</div>
							<div class="submit">
								<input class="btn btn-block btn-primary btn-lg pull-right" type="submit" value="{{trans('backend.Submit')}}">
							</div>
						</div>
						<!-- tab-3 -->
					</div>
					<!-- formTabs -->
				</form>
			</div>
			<!-- form -->
		</div>
		<!-- forms div -->
	</div>
</div>
@stop