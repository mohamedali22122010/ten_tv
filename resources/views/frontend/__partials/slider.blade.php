<section class="slider">
    <hr>
    <div id="owl-demo" class="owl-carousel owl-theme"><!--OWl Carousel-->
	   @foreach($slides as $slide)
        <div class="item">
            <picture>
					@foreach($slide->getMedia('main_image') as $key => $image)
					    <img src="{{ $image->getUrl() }}" alt="Home Slider">
					@endforeach                    
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
	   @endforeach
    </div>
</section>