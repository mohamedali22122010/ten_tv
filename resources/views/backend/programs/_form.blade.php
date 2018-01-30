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
				<label>{{trans('backend.Program Title')}}</label>
				<input class="form-control" name="title[{{$language}}]" type="text" data-parsley-required="true" value="{{old('title.'.$language,$program->getTranslation('title',$language))}}" placeholder="" >
			</div>
	
			<div class="form-group">
				<label>{{trans('backend.Program Description')}}</label>
				<textarea class="form-control ckEditor" name="description[{{$language}}]" id="description-{{$language}}" placeholder="">{{old('description.'.$language,$program->getTranslation('description',$language))}}</textarea>
			</div>

            <div class="form-group">
                <label>{{trans('backend.About Announcer')}}</label>
                <textarea class="form-control ckEditor" name="about_announcer[{{$language}}]" id="about_announcer-{{$language}}" placeholder="">{{old('about_announcer.'.$language,$program->getTranslation('about_announcer',$language))}}</textarea>
            </div>            
						
		    <div class="form-group">
				<label>{{trans('backend.Program Show Text')}}</label>
				<input class="form-control" name="show_text[{{$language}}]" type="text" value="{{old('show_text.'.$language,$program->getTranslation('show_text',$language))}}" placeholder="" >
			</div>
			
			<div class="form-group">
				<label>{{trans('backend.Program Repeate Text')}}</label>
				<input class="form-control" name="repeate_text[{{$language}}]" type="text" value="{{old('repeate_text.'.$language,$program->getTranslation('repeate_text',$language))}}" placeholder="" >
			</div>
						
			<div class="nextTab">
				<a href="#tab-{{$name}}" class="btn btn-primary btn-lg pull-right" data-tab-index="{{++$data_tab_index}}">Next</a>
			</div>
		</div>
	@endforeach
	<div id="tab-general" class="tab-pane"  data-tab-index="{{$data_tab_index}}">
	   						
		
		<div class="form-group">
			<label>{{trans('backend.Program Show Time')}}</label>
			<input class="form-control" name="show_time" type="text" value="{{old('show_time',$program->show_time)}}" placeholder="" >
		</div>
			
		<div class="form-group">
			<label>{{trans('backend.Program Repeate Time')}}</label>
			<input class="form-control" name="repeate_time" type="text" value="{{old('repeate_time',$program->repeate_time)}}" placeholder="" >
		</div>

        <div class="form-group">
            <label>{{trans('backend.Program Facebook Page')}}</label>
            <input class="form-control" name="facebook_link" type="text" value="{{old('facebook_link',$program->facebook_link)}}" placeholder="" >
        </div>

        <div class="form-group">
            <label>{{trans('backend.Program Twitter Page')}}</label>
            <input class="form-control" name="twitter_link" type="text" value="{{old('twitter_link',$program->twitter_link)}}" placeholder="" >
        </div>

        <div class="form-group">
            <label>{{trans('backend.Program Instagram Page')}}</label>
            <input class="form-control" name="instagram_link" type="text" value="{{old('instagram_link',$program->instagram_link)}}" placeholder="" >
        </div>

        <div class="form-group">
            <label>{{trans('backend.Program Youtube Page')}}</label>
            <input class="form-control" name="youtube_link" type="text" value="{{old('youtube_link',$program->youtube_link)}}" placeholder="" >
        </div>

		<div class="imagesBlock row">
            <ul>
                @foreach($program->getMedia('images') as $key => $image)
                <li class="col-md-3">
                	<div>
                		<div class="actions">
                			<a class="removeMedia" data-key="{{$key}}">X</a>
            			</div>
            			<img src="{{ $image->getUrl() }}"  alt="Image">
        			</div>
    			</li>
                @endforeach
            </ul>
        </div>
        <!-- imagesBlock -->
		<label class="lowMargin"> <span>{{ trans('backend.Program Image') }}</span> </label>


        <div class="dropzone form-group"></div>
        
   		<div class="form-group">
				<label class="col-md-3"><input class="minimal" name="status" type="checkbox" @if($program->status) checked @endif> {{ trans('backend.Set Active') }} </label>			
		</div>
	
		<div class="form-group"></div>
        		
        <div class="submit">
            <input class="btn btn-block btn-primary btn-lg pull-right" type="submit" value="{{trans('backend.Submit')}}">
        </div>
		<!-- tab-3 -->
	</div>
</div>
<!-- formTabs -->
@section('scripts')
<script type="text/javascript">

maxFiles = 1; // max images to upload
ImageMustHasPrimary = false;
ImageNotRequired = true;
customFieldImage = "{{trans('backend.Primary')}}"

</script>
@endsection