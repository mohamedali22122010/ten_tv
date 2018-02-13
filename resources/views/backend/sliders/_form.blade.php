<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
    	@foreach(config('laravel-translatable.languages') as $language=>$name)
		<li><a href="#tab-{{$name}}">{{$name}}</a></li>
		@endforeach
		<li><a href="#tab-general">General</a></li>
	</ul>
	<div class="tab-content">
	<?php $data_tab_index = 0; ?>
	
	@foreach(config('laravel-translatable.languages') as $language=>$name)
		<div id="tab-{{$name}}" class="tab-pane clearfix"  data-tab-index="{{$data_tab_index}}">
			<div class="form-group">
				<label>Slider Title ({{$name}})</label>
				<input class="form-control" name="title[{{$language}}]" type="text" data-parsley-required="false" value="{{old('title.'.$language)?old('title.'.$language):$slider->getTranslation('title',$language)}}" placeholder="Input Placeholder Goes Here ..." >
			</div>
			<div class="form-group">
				<label>Slider Time ({{$name}})</label>
				<input class="form-control" name="text[{{$language}}]" type="text" data-parsley-required="false" value="{{old('text.'.$language)?old('text.'.$language):$slider->getTranslation('text',$language)}}" placeholder="Input Placeholder Goes Here ..." >
			</div>
			<div class="nextTab">
				<a href="#tab-{{$name}}" class="btn btn-primary btn-lg pull-right" data-tab-index="{{++$data_tab_index}}">Next</a>
			</div>
		</div>
		@endforeach
	<div id="tab-general" class="tab-pane"  data-tab-index="{{$data_tab_index}}">
        
        <div class="imagesBlock row">
            <ul>
                @foreach($slider->getMedia('main_image') as $key => $image)
                <li class="col-md-3">
                    <div>
                        <img src="{{ $image->getUrl() }}"  alt="Image">
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <!-- imagesBlock -->
        <div class="form-group">
            <label>Main Image</label>
            <code>( Image width prefere equal 1920 and height equal 600 )</code>
            <input type="file" data-parsley-required="false" name="main_image">
        </div>
        <!--

        <div class="imagesBlock row">
            <ul>
                @foreach($slider->getMedia('tablet_image') as $key => $image)
                <li class="col-md-3">
                    <div>
                        <img src="{{ $image->getUrl() }}"  alt="Image">
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        -->
        <!-- imagesBlock -->

        <!--
        <div class="form-group">
            <label>Tablet Image</label>
            <input type="file" data-parsley-required="false" name="tablet_image">
        </div>

        <div class="imagesBlock row">
            <ul>
                @foreach($slider->getMedia('mobile_image') as $key => $image)
                <li class="col-md-3">
                    <div>
                        <img src="{{ $image->getUrl() }}"  alt="Image">
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        -->
        <!-- imagesBlock -->
        <!--
        <div class="form-group">
            <label>Mobile Image</label>
            <input type="file" data-parsley-required="true" name="mobile_image">
        </div>
        -->
		<div class="form-group">
			<label>
				<input class="minimal" name="active" type="checkbox" @if($slider-> active) checked @endif> Set Active 
			</label>
		</div>
		<!--
		<div class="form-group">
			<label>
				<input class="minimal" name="new_tab" type="checkbox" @if($slider-> new_tab) checked @endif> Open In New Tab 
			</label>
		</div> -->
		<div class="submit">
            <input class="btn btn-block btn-primary btn-lg pull-right" type="submit" value="Submit">
        </div>
	</div>
	<!-- tab-3 -->
</div>
<!-- formTabs -->
</div>


@section('scripts')

<script type="text/javascript">

maxFiles = 2; // max images to upload
ImageMustHasPrimary = true;
customFieldImage = "Arabic";

$(document).ready(function(){
	
	$("a.makePrimary").on("click", function(event) {
       	event.preventDefault();
       	$("input.main_media_image").remove();
       	filename = $(this).attr('rel');
       	var main_image='<input class="main_media_image" rel="'+filename+'" type="hidden" name="main_image" value="'+ filename +'" />';
    	$('.form-inputs').append(main_image);
    	$("a.makePrimary").show();
    	$(this).hide();
    	
    });
    
});
</script>

@endsection