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

	
	<section class="row-news">
		<div class="container">
			@if($posts)
				<div class="row">
		            @foreach($posts as $post)
					<div class="col">
						<div class="container-news">
							<div class="image-div">
								<a href="{{url('news_detail',$post->slug)}}"><img src="{{$post->getMedia('images')->first()?$post->getMedia('images')->first()->getUrl():''}}" alt=""/></a>
							</div><!--image-div-->
							<div class="dev-details">
								<h2><a href="{{url('news_detail',$post->slug)}}">{{$post->title}}</a></h2>
								<article>{{ str_limit($post->description,70,'...')}}</article>
							</div><!--dev-details-->
						</div><!--container-news-->
							
					</div><!--col-->
					@endforeach					
				</div>
			@endif
		</div><!--container-->
	</section><!--row-news-->
	
	<section class="dark-area">
		<div class="container">
			@if($videos)
			<div class="row">
				@foreach($videos as $video)
				<div class="col-md-2">
					<div class="container-vid">
						<img src="https://img.youtube.com/vi/{{$video->getYoutubeVedioIdFromUrl($video->link)}}/mqdefault.jpg" alt=""/>
	 				    <a href="{{$video->link}}">{{$video->title}}</a>
	 				</div><!--container-vid-->
				</div><!--col-->
				@endforeach
			</div><!--row-->
			@endif
		</div>
	</section>

	<!--Soon-->
	<section class="Soon">
		<div class="title">
			<div class="container">
				<h2>{{ trans('frontend.soon on ten tv') }}</h2>
			</div>
		</div>
        
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
	            <h2>محطة التحرير للإنتاج الاعلامى والقنوات الفضائية ش.م.م. </h2>
	           <p>
				قناة مصرية الهوي والهوية، شاملة وجامعة لكل الاّراء والأفكار والتوجهات التنويرية، تقدم اعلاما سماته الموضوعية والمهنية وبشكل جذاب ومشوق وفق احدث التقنيات الفنية ..
تعمل القناة على تقديم "الاعلام البديل" الذي يرتكز علي محاور التنوير وخلق حالة من الوعي العام كما تجمع فى محتواها بين توصيل الحقائق والترفيه لمختلف أطياف المشاهدين. 
كما تهدف القناة الي خلق ذراع أكاديمية للارتقاء بمستوي العاملين بها وتقديم الدعم التدريبي لكافة الجهات ذات  <br/>الصِّلة بصناعة الاعلام 
قناة TeN هي قناة كل المصريين
</p>
	           <!-- <div class="about-buttons">
	                <button><a href="#">الهيكل الأداري</a></button>
	                <button><a href="#">نبذة تاريخية</a></button>
	                <button><a href="#">مجلس الإدارة</a></button>
	            </div>-->
	        </div><!--about-right-->
	
	    </div><!--container-->
	</section>
	
	@include('frontend.__partials.contact')

@stop