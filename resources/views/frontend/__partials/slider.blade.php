<section class="slider">
    <hr>
	@foreach($slides as $slide)
    <div id="owl-demo" class="owl-carousel owl-theme"><!--OWl Carousel-->
        <div class="item">
            <picture>
                @if(\App::getLocale() == "ar")
					@foreach($slide->getMedia('images') as $key => $image)
						@if($image->hasCustomProperty('main-image')) 
			                <source media="(max-width: 551px)" srcset="{{ $image->getUrl() }}">
			                <source media="(max-width: 767px)" srcset="{{ $image->getUrl() }}">
							<img src="{{ $image->getUrl() }}" alt="Home Slider">
							@break
						@endif
					@endforeach				
				@else
					@foreach($slide->getMedia('images') as $key => $image)
						@if(!$image->hasCustomProperty('main-image')) 
		                <source media="(max-width: 551px)" srcset="{{ $image->getUrl() }}">
		                <source media="(max-width: 767px)" srcset="{{ $image->getUrl() }}">
							<img src="{{ $image->getUrl() }}" alt="Home Slider">
							@break
						@endif
					@endforeach					
				@endif
            </picture>
            <div class="container">
                <div class="slider_content">
                    <div class="slider-logo">
                        <img src="{{ asset('frontend/assets/images/logo.gif')}}" alt="TenTv">
                    </div>
                    <div class="slider-data">
                        <div class="slider-data-details">
                            <span> {{$slide->title}} </span>
                            <span> {{$slide->text}} </span>
                            <span> {{trans('frontend.cairoTime')}} </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	@endforeach
</section>