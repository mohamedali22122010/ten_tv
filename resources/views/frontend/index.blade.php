@extends('layouts.frontend')

@section('page_style')
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/assets/css/Home-Page.css') }}">
@stop

@section('page_script')

<script src="{{ asset('frontend/assets/js/jquery-3.1.1.min.js') }}"></script><!--Jquery-->
<script src="{{ asset('frontend/assets/OwlCarousl/owl.carousel.min.js') }}"></script><!--Slider-->
<script src="{{ asset('frontend/assets/js/navigation.js') }}"></script><!--Menu-->
<script src="{{ asset('frontend/assets/js/navigation-script.js') }}"></script><!--Menu-->
<script src="{{ asset('frontend/assets/js/jquery.fancybox.min.js') }}"></script><!--FancyBox-->
<script src="{{ asset('frontend/assets/js/Script.js') }}"></script><!--Home Script-->


@stop

@section('content')

	@include('frontend.__partials.slider')
	
	<section class="TimeNow">
	    <hr>
	    <div class="Time"><!--Time-->
	        <div class="Time-left"><!--Time-left-->
	            <h3>{{ trans('frontend.Watching Today') }}</h3>
	            <p><svg><use xlink:href="#left"></use></svg>{{trans('frontend.broadcasttime')}}</p>
	        </div><!--Time-left-->
	        <div class="Time-right"><!--Time-right-->
	        	@if($currentShow)
	            <div class="Time-item">
	                <h4>{{$currentShow->program->title}}</h4>
	                <p>{{$currentShow->show_at}}</p>
	                <button>{{trans('frontend.currently_shown')}}</button>
	            </div>
	            @endif
	            @if($nextShow)
	            <div class="Time-item">
	                <h4>{{$nextShow->program->title}}</h4>
	                <p>{{$nextShow->show_at}}</p>
	                <button>{{trans('frontend.next')}}</button>
	            </div>
	            @endif
	            @if($upcommingShow)
	            <div class="Time-item">
	                <h4>{{$upcommingShow->program->title}}</h4>
	                <p>{{$upcommingShow->show_at}}</p>
	            </div>
	            @endif
	        </div><!--Time-right-->
	    </div><!--Time-->
	</section>
	<!--News-->
	<section class="News">
	    <hr>
	    <div class="container"><!--Container-->
	        <div class="News-Right"><!--News-right-->
	        	@if($rightPost)
	        	
				@if($rightPost->type == 2)
	        	<div class="News-video">
		            <a href="{{$rightPost->link}}" data-fancybox data-caption="My caption">
		                <img src="{{$rightPost->getMedia('images')->first()?$rightPost->getMedia('images')->first()->getUrl():''}}" alt="" />
		                <div class="Icon">
			                <svg><use xlink:href="#play"></use></svg>
			            </div>
		            </a>
	            </div>
	            @elseif($rightPost->type == 1)
	                <img src="{{$rightPost->getMedia('images')->first()?$rightPost->getMedia('images')->first()->getUrl():''}}" alt="" />
	            @endif
	            <div>
	                <h3>{{$rightPost->title}}</h3>
	                <p>{{$rightPost->description}}</p>
	            </div>
	            @endif
	        </div><!--News-right-->
	        <div class="News-Left"><!--News-Left-->
	        	@if($leftPost)
		        	@if($leftPost->type == 2)
		        	<div class="News-video">
			            <a href="{{$leftPost->link}}" data-fancybox data-caption="My caption">
			                <img src="{{$leftPost->getMedia('images')->first()?$leftPost->getMedia('images')->first()->getUrl():''}}" alt="" />
			                <div class="Icon">
				                <svg><use xlink:href="#play"></use></svg>
				            </div>
			            </a>
		            </div>
		            @elseif($leftPost->type == 1)
		                <img src="{{$leftPost->getMedia('images')->first()?$leftPost->getMedia('images')->first()->getUrl():''}}" alt="" />
		            @endif
		            <div>
						<h3>{{$leftPost->title}}</h3>
		                <p>{{$leftPost->description}}</p>
		            </div>
		            <a href="#"></a>
	            @endif
	        </div><!--News-Left-->
	    </div><!--Conatiner-->
	</section>
	<!--Soon-->
	<section class="Soon">
        <h2>{{ trans('frontend.soon on ten tv') }}</h2>
        @if($soonPosts)
	    <div class="container"><!--Container-->
	    	
	        <div id="owl-demo2" class=" owl-carousel owl-theme"><!--OWl Carousel-->
	            @foreach($soonPosts as $post)
	            <div class="item"><!--item-->
	               <div class="item-right">
	               	<img src="{{$post->getMedia('images')->first()?$post->getMedia('images')->first()->getUrl():''}}">
	               </div>
	                <div class="item-left">
	                    <h3>{{$post->title}}</h3>
	                    <p>{{$post->description}}</p>
	                    <button><a href="#">{{trans('frontend.Read More')}}</a></button>
	                </div>
	            </div><!--item-->
	            @endforeach
	        </div><!--OWl Carousel-->
	    </div><!--Container-->
	    @endif
	</section>
	<!--Category-->
	<section class="Category">
	   <div class="Category-item"><!--Category-item-->
	       <svg><use xlink:href="#shopping"></use></svg>
	       <h2>عسل أبيض</h2>
	       <p>Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.</p>
	       <a href="#"></a>
	   </div><!--Category-item-->
	    <div class="Category-item"><!--Category-item-->
	        <svg><use xlink:href="#card"></use></svg>
	        <h2>بيتك و مطبخك</h2>
	        <p>Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.</p>
	        <a href="#"></a>
	    </div><!--Category-item-->
	    <div class="Category-item"><!--Category-item-->
	        <svg><use xlink:href="#square"></use></svg>
	        <h2>صباح الورد</h2>
	        <p>Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.</p>
	        <a href="#"></a>
	    </div><!--Category-item-->
	</section>
	<!--About-->
	<section class="about">
	    <div class="container"><!--container-->
	        <div class="about-left"><!--about-left-->
	            <img src="{{ asset('frontend/assets/images/logo.gif') }}">
	        </div><!--about-left-->
	        <div class="about-right"><!--about-right-->
	            <h2>شبكة قناة التحريرللأنتاج الفنى والقنوات الفضائيه</h2>
	            <p>لكن لا بد أن أوضح لك أن كل هذه الأفكار المغلوطة حول استنكار  النشوة وتمجيد الألم نشأت بالفعل، وسأعرض لك التفاصيل لتكتشف حقيقة وأساس تلك السعادة البشرية، فلا أحد يرفض أو يكره أو يتجنب الشعور بالسعادة، ولكن بفضل هؤلاء الأشخاص الذين لا يدركون بأن السعادة لا بد أن نستشعرها بصورة أكثر عقلانية ومنطقية فيعرضهم هذا لمواجهة الظروف الأليمة، وأكرر بأنه لا يوجد من يرغب في الحب ونيل المنال ويتلذذ بالآلام، الألم هو الألم ولكن نتيجة لظروف ما قد تكمن السعاده فيما نتحمله من كد وأسي.</p>
	            <div class="about-buttons">
	                <button><a href="#">الهيكل الأداري</a></button>
	                <button><a href="#">نبذة تاريخية</a></button>
	                <button><a href="#">مجلس الإدارة</a></button>
	            </div>
	        </div><!--about-right-->
	
	    </div><!--container-->
	</section>
	
	@include('frontend.__partials.contact')

@stop