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
				<div class="row form-group ">
				    <div class="col-sm-3">
				    	<label>{{ trans('backend.Role Name') }}</label>
				    </div>
				    <div class="col-sm-9">
				    	{{$role->name}}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
			        <div class="form-group">
			            <strong>{{ trans('backend.Permissions') }}</strong>
			            <br/>
			            @foreach($rolePermissions as $value)
			            <div class="col-md-4">
			           	<label> 
			            	{{ trans('role.'.$value->display_name) }}
			        	</label>
			        	</div>
			            @endforeach
			        </div>
			    </div>
				
			</div>
			<!-- form -->
		</div>
		<!-- forms div -->
	</div>
</div>
@stop
