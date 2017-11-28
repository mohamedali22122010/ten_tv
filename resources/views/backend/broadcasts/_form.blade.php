<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="nav-tabs-custom">
	<div id="tab-general" class="" >

		<div class="form-group ">
        	<label> {{trans('backend.Program')}} </label>
            <select class="form-control" data-parsley-required="true" name="program_id">
                @if($programs && !empty($programs))
                    @foreach($programs as $id=>$value)
                    <option value="{{$id}}" @if($broadcast->program_id == $id) selected @endif >{{$value}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        
		<div class="form-group ">
        	<label> {{trans('backend.Day')}} </label>
            <select class="form-control" data-parsley-required="true" name="day">
                @if($broadcast->days && !empty($broadcast->days))
                    @foreach($broadcast->days as $id=>$value)
                    <option value="{{$id}}" @if($broadcast->day == $id) selected @endif >{{$value}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        
   		<div class="form-group">
			<label>{{trans('backend.Program Show Time')}}</label>
			<div class="col-md-12 input-group bootstrap-timepicker">
				<input class="form-control timepicker" name="show_at" type="text" value="{{old('show_at',$broadcast->show_at)}}" placeholder="" >				
			</div>
		</div>

        <div class="form-group">
			<label class="col-md-3"><input class="minimal" name="repeate" type="checkbox" @if($broadcast->repeate) checked @endif> {{ trans('backend.Is Repeate') }} </label>			
		</div>		        		
		
        <div class="submit">
            <input class="btn btn-block btn-primary btn-lg pull-right" type="submit" value="{{trans('backend.Submit')}}">
        </div>
		<!-- tab-3 -->
	</div>
</div>
<!-- formTabs -->