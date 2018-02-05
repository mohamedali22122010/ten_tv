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
				<label>{{trans('backend.Post Title')}}</label>
				<input class="form-control" name="title[{{$language}}]" type="text" data-parsley-required="true" value="{{old('title.'.$language,$post->getTranslation('title',$language))}}" placeholder="" >
			</div>
	
			<div class="form-group">
				<label>{{trans('backend.Post Description')}}</label>
				<textarea class="form-control" name="description[{{$language}}]" id="description-{{$language}}" placeholder="">{{old('description.'.$language,$post->getTranslation('description',$language))}}</textarea>
			</div>
			
			<div class="form-group">
				<label>{{trans('backend.Post Content')}}</label>
				<textarea class="form-control ckEditor" name="content[{{$language}}]" id="content-{{$language}}" placeholder="">{{old('content.'.$language,$post->getTranslation('content',$language))}}</textarea>
			</div>
			
		    <div class="form-group">
				<label>{{trans('backend.Post Meta Tag Title')}}</label>
				<input class="form-control" name="meta_tag_title[{{$language}}]" type="text" value="{{old('meta_tag_title.'.$language,$post->getTranslation('meta_tag_title',$language))}}" placeholder="" >
			</div>
			
			<div class="form-group">
				<label>{{trans('backend.Post Meta Tag Description')}}</label>
				<textarea class="form-control" name="meta_tag_description[{{$language}}]" id="meta_tag_description-{{$language}}" placeholder="">{{old('meta_tag_description.'.$language,$post->getTranslation('meta_tag_description',$language))}}</textarea>
			</div>
			
			<div class="form-group">
				<label>{{trans('backend.Post Meta Tag Keywords')}}</label>
				<input class="form-control selectize" name="meta_tag_keywords[{{$language}}]" type="text" value="{{old('meta_tag_keywords.'.$language,$post->getTranslation('meta_tag_keywords',$language))}}" placeholder="" >
			</div>
			
			<div class="nextTab">
				<a href="#tab-{{$name}}" class="btn btn-primary btn-lg pull-right" data-tab-index="{{++$data_tab_index}}">Next</a>
			</div>
		</div>
	@endforeach
	<div id="tab-general" class="tab-pane"  data-tab-index="{{$data_tab_index}}">

		<div class="form-group ">
        	<label> {{trans('backend.Category')}} </label>
            <select class="form-control" data-parsley-required="true" name="category_id">
            	<option value="">{{trans('backend.Please Select Category')}}</option>
                @if($categories && !empty($categories))
                    @foreach($categories as $id=>$value)
                    <option value="{{$id}}" @if($post->category_id == $id) selected @endif >{{$value}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        
        <div class="form-group ">
        	<label> {{trans('backend.Type')}} </label>
            <select class="form-control" data-parsley-required="true" name="type">
                @foreach($post->types as $id=>$value)
                <option value="{{$id}}" @if($post->type == $id) selected @endif >{{$value}}</option>
                @endforeach
            </select>
        </div>
        	   						
		
		<div class="form-group">
			<label>{{trans('backend.Post Link')}}</label>
			<input class="form-control" name="link" type="text" value="{{old('link',$post->link)}}" placeholder="" >
		</div>
			
		<div class="imagesBlock row">
            <ul>
                @foreach($post->getMedia('images') as $key => $image)
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
		<label class="lowMargin"> <span>{{ trans('backend.Post Images') }}</span> </label>


        <div class="dropzone form-group"></div>
        
   		<div class="form-group">
				<label class="col-md-3"><input class="minimal" name="status" type="checkbox" @if($post->status) checked @endif> {{ trans('backend.Set Active') }} </label>			
                <label class="col-md-3"><input class="minimal" name="home_page_soon" type="checkbox" @if($post->home_page_soon) checked @endif> {{ trans('backend.Home Page Soon Section') }} </label>                
				<label class="col-md-3"><input class="minimal" name="home_page" type="checkbox" @if($post->home_page) checked @endif> {{ trans('backend.Home Page') }} </label>			   				
		</div>
	
		<div class="form-group">.</div>
        		
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