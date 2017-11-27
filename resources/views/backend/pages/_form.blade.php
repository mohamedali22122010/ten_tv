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
				<label>{{ trans('backend.Page Title') }} ({{$name}})</label>
				<input class="form-control" name="title[{{$language}}]" type="text" data-parsley-required="true" value="{{old('title.'.$language,$page->getTranslation('title',$language))}}" placeholder="" >
			</div>
	
			<div class="form-group">
				<label>{{ trans('backend.Page Content') }} ({{$name}})</label>
				<textarea class="form-control ckEditor" name="description[{{$language}}]" id="description-{{$language}}" data-parsley-required="true" placeholder="">{{old('description.'.$language,$page->getTranslation('description',$language))}}</textarea>
			</div>
			
		    <div class="form-group">
				<label>{{trans('backend.Page Meta Tag Title')}}</label>
				<input class="form-control" name="meta_tag_title[{{$language}}]" type="text" value="{{old('meta_tag_title.'.$language,$page->getTranslation('meta_tag_title',$language))}}" placeholder="" >
			</div>
			
			<div class="form-group">
				<label>{{trans('backend.Page Meta Tag Description')}}</label>
				<textarea class="form-control" name="meta_tag_description[{{$language}}]" id="meta_tag_description-{{$language}}" placeholder="">{{old('meta_tag_description.'.$language,$page->getTranslation('meta_tag_description',$language))}}</textarea>
			</div>
			
			<div class="form-group">
				<label>{{trans('backend.Page Meta Tag Keywords')}}</label>
				<input class="form-control selectize" name="meta_tag_keywords[{{$language}}]" type="text" value="{{old('meta_tag_keywords.'.$language,$page->getTranslation('meta_tag_keywords',$language))}}" placeholder="" >
			</div>
			
			<div class="nextTab">
				<a href="#tab-{{$name}}" class="btn btn-primary btn-lg pull-right" data-tab-index="{{++$data_tab_index}}">Next</a>
			</div>

		</div>
	@endforeach
	<div id="tab-general" class="tab-pane"  data-tab-index="{{$data_tab_index}}">

		<div class="imagesBlock row">
			<ul>
				@foreach($page->getMedia('images') as $key => $image)
				<li class="col-md-3">
					<div>
						<div class="actions">
							<a href="#" class="removeMedia" data-key="{{$key}}">X</a>
						</div>
						<img src="{{ $image->getUrl() }}"  alt="Image">
					</div>
				</li>
				@endforeach
			</ul>
		</div>
		<!-- imagesBlock -->
		<label class="lowMargin"> <span>{{ trans('backend.Page Images') }}</span> </label>

		<div class="dropzone form-group"></div>

		<div class="form-group">
			<label><input class="minimal" name="status" type="checkbox" @if($page->status) checked @endif> {{ trans('backend.Set Active') }} </label>
		</div>

		<div class="submit">
			<input class="btn btn-block btn-primary btn-lg pull-right" type="submit" value="{{ trans('backend.Submit') }}">
		</div>
	</div>
</div>
<!-- formTabs -->
@section('scripts')
<script type="text/javascript">
	maxFiles = 20;
	// max images to upload
	ImageNotRequired = true;

</script>
@endsection