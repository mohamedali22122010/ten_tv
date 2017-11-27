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
				<label>{{trans('backend.Category Title')}} ({{$name}})</label>
				<input class="form-control" name="title[{{$language}}]" type="text" data-parsley-required="true" value="{{old('title.'.$language,$category->getTranslation('title',$language))}}" placeholder="" >
			</div>
	
			<div class="form-group">
				<label>{{trans('backend.Category Description')}} ({{$name}})</label>
				<textarea class="form-control ckEditor" name="description[{{$language}}]" placeholder="">{{old('description.'.$language,$category->getTranslation('description',$language))}}</textarea>
			</div>
			   
		    <div class="form-group">
				<label>{{trans('backend.Category Meta Tag Title')}} ({{$name}})</label>
				<input class="form-control" name="meta_tag_title[{{$language}}]" type="text" value="{{old('meta_tag_title.'.$language,$category->getTranslation('meta_tag_title',$language))}}" placeholder="" >
			</div>
			
			<div class="form-group">
				<label>{{trans('backend.Category Meta Tag Description')}} ({{$name}})</label>
				<textarea class="form-control" name="meta_tag_description[{{$language}}]" placeholder="">{{old('meta_tag_description.'.$language,$category->getTranslation('meta_tag_description',$language))}}</textarea>
			</div>
			
			<div class="form-group">
				<label>{{trans('backend.Category Meta Tag Keywords')}} ({{$name}})</label>
				<input class="form-control selectize" name="meta_tag_keywords[{{$language}}]" type="text" value="{{old('meta_tag_keywords.'.$language,$category->getTranslation('meta_tag_keywords',$language))}}" placeholder="" >
			</div>
			
			<div class="nextTab">
				<a href="#tab-{{$name}}" class="btn btn-primary btn-lg pull-right" data-tab-index="{{++$data_tab_index}}">Next</a>
			</div>
		</div>
  	@endforeach
	<div id="tab-general" class="tab-pane"  data-tab-index="{{$data_tab_index}}">

        <div class="form-group col-md-6">
			<label>
				<input class="minimal" name="status" type="checkbox" @if($category-> status) checked @endif> {{trans('backend.Set Active')}} 
			</label>
		</div>
				
        <div class="submit">
            <input class="btn btn-block btn-primary btn-lg pull-right" type="submit" value="{{trans('backend.Submit')}}">
        </div>
		<!-- tab-3 -->
	</div>
</div>
<!-- formTabs -->
@section('scripts')

@endsection