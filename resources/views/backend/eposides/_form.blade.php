<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="nav-tabs-custom">
	<ul class="nav nav-tabs">
    	@foreach(config('laravel-translatable.languages') as $language=>$name)
		<li><a href="#tab-{{$name}}">{{$name}}</a></li>
		@endforeach
		<li><a href="#tab-general">General</a></li>
	</ul>
	<?php $data_tab_index = 0; ?>
	
	@foreach(config('laravel-translatable.languages') as $language=>$name)
		<div id="tab-{{$name}}" class="tab-pane clearfix"  data-tab-index="{{$data_tab_index}}">
			<div class="form-group">
				<label>{{trans('backend.Eposide Title')}}</label>
				<input class="form-control" name="title[{{$language}}]" type="text" data-parsley-required="true" value="{{old('title.'.$language,$eposide->getTranslation('title',$language))}}" placeholder="" >
			</div>
					
			<div class="nextTab">
				<a href="#tab-{{$name}}" class="btn btn-primary btn-lg pull-right" data-tab-index="{{++$data_tab_index}}">Next</a>
			</div>
		</div>
	@endforeach
	<div id="tab-general" class="tab-pane"  data-tab-index="{{$data_tab_index}}">

		<div class="form-group ">
        	<label> {{trans('backend.Program')}} </label>
            <select class="form-control" data-parsley-required="true" name="program_id">
            	<option value="">{{trans('backend.Please Select Program')}}</option>
                @if($programs && !empty($programs))
                    @foreach($programs as $id=>$value)
                    <option value="{{$id}}" @if($eposide->program_id == $id) selected @endif >{{$value}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        
		
		<div class="form-group">
			<label>{{trans('backend.Eposide Link')}}</label>
			<input class="form-control" name="link" type="text" value="{{old('link',$eposide->link)}}" placeholder="" >
		</div>
			
		        		
        <div class="submit">
            <input class="btn btn-block btn-primary btn-lg pull-right" type="submit" value="{{trans('backend.Submit')}}">
        </div>
		<!-- tab-3 -->
	</div>
</div>
<!-- formTabs -->