<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="tab-content">
	<div class="tab-content">
	    <div class="form-group">
	    	<label>{{ trans('backend.Role Name') }}</label>
			<input class="form-control" name="name" type="text" data-parsley-required="true" value="{{old('name',$role->name)}}" >
	    </div>
	    
	    <div class="col-xs-12 col-sm-12 col-md-12">
	        <div class="form-group">
	            <strong>{{ trans('backend.Permissions') }}</strong>
	            <br/>
	            @foreach($permissions as $value)
	            <div class="col-md-4">
	           	<label> 
	           		<input type="checkbox" name="permissions[]" value="{{$value->id}}"  "@if(in_array($value->id, $rolePermissions) || $value->name == 'restMessagesReplied') checked @endif" >
	            	{{ trans('role.'.$value->display_name) }}
	        	</label>
	        	</div>
	            @endforeach
	        </div>
	    </div>
    	
        <div class="submit">
            <input class="btn btn-block btn-primary btn-lg pull-right" type="submit" value="{{trans('backend.Submit')}}">
        </div>
	</div>
</div>
