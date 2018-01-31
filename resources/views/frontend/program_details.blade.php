@extends('layouts.frontend')

@section('page_style')
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/assets/css/Programs-details-Page.css') }}">
@stop

@section('page_script')

<script src="{{ asset('frontend/assets/js/jquery-3.1.1.min.js') }}"></script><!--Jquery-->
<script src="{{ asset('frontend/assets/js/navigation.js') }}"></script><!--Menu-->
<script src="{{ asset('frontend/assets/js/navigation-script.js') }}"></script><!--Menu-->
<script src="{{ asset('frontend/assets/js/ScrollUpScript.js') }}"></script><!--Home Script-->

@stop

@section('content')

<!--Program-details-->
<section class="Program-details">
    <div class="container">
        <div class="blog-details">
            <div class="middle">
                <h2>{{$program->title}}</h2>
                <div class="about-art">
                    <div class="share">
                        <ul>
                            <li><span>{{trans('frontend.follow_us_on')}}</span></li>
                            @if($program->facebook_link)
                            <li><a href="{{$program->facebook_link}}" target="_blank" class="facebook" title=""><svg><use xlink:href="#facebook"></use></svg> </a></li>
                            @endif
                            @if($program->twitter_link)
                            <li><a href="{{$program->twitter_link}}" target="_blank" class="twitter" title=""><svg><use xlink:href="#twitter"></use></svg> </a></li>
                            @endif
                            @if($program->instagram_link)
                            <li><a href="{{$program->instagram_link}}" target="_blank" class="instagram" title=""><svg><use xlink:href="#instagram"></use></svg> </a></li>
                            @endif
                            @if($program->youtube_link)
                            <li><a href="{{$program->youtube_link}}" target="_blank" class="youtube" title=""><svg><use xlink:href="#youtube"></use></svg> </a></li>
                            @endif
                        </ul>
                    </div>
                </div><!--about-art-->
                <div class="blog-img">
                    <img src="{{$program->getMedia('images')->first()?$program->getMedia('images')->first()->getUrl():''}}" alt="" />
                </div><!--blog-img-->
                <div class="text">
                    <article>
                    	{!! $program->description !!}
                    </article>
                </div>
                <div class="Program-data">
                    <h2>{{trans('frontend.full_eposides')}}</h2>
                    <div class="Program-videos">
                        @foreach($eposides as $eposide)
                        <div class="video-item">
                            <div class="video-content">
                                <a href="{{$eposide->link}}" data-fancybox data-caption="My caption">
                                    <img src="https://img.youtube.com/vi/{{$eposide->getYoutubeVedioIdFromUrl($eposide->link)}}/mqdefault.jpg" alt="" />
                                    <div class="Icon">
                                        <svg><use xlink:href="#play"></use></svg>
                                    </div>
                                </a>
                            </div>
                            <a href="{{$eposide->link}}" data-fancybox data-caption="My caption">
                                <h4>{{$eposide->title}}</h4>
                            </a>
                        </div>
                        @endforeach                      
                    </div>
                </div>
            </div>
			
			<div class="row-left">
                <div class="Program-time">
                    <h2>{{trans('frontend.broadcasttime')}}</h2>
                    <div class="Times">
                        <p>{{$program->show_text}}</p>
                        <span>{{$program->show_time}}</span>
                        <p>{{trans('frontend.cairoTime')}}</p>
                    </div>
                </div><!--Program-time-->
                @if($program->about_announcer)
    			    <div class="about-announcer">
        				<h3>{{trans('frontend.about announcer')}}</h3>
        				<article>{!! $program->about_announcer !!}</article>
        			</div><!--about-announcer-->
				@endif
                @if(!$videos->isEmpty())
                    <div class="pro-fe">
    					<h3>{{trans('frontend.featured video')}}</h3>
                        <div class="row">
                            @foreach($videos as $video)
                            <div class="video-item">
                                <div class="video-content">
                                    <img src="https://img.youtube.com/vi/{{$video->getYoutubeVedioIdFromUrl($video->link)}}/mqdefault.jpg" alt="">
                                </div>
                                <a href="{{$video->link}}" data-fancybox="" data-caption="My caption">
                                    <h4>{{$video->title}}</h4>
                                </a>
                            </div><!--video-item-->
                            @endforeach
                        </div><!--row-->
    				</div><!--pro-fe-->
                @endif				
			</div><!--row-left-->
        </div>
    </div>
</section>
@stop