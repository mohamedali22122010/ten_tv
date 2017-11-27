@extends('layouts.frontend')

@section('page_style')
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/assets/css/News-details-page.css') }}">
@stop

@section('page_script')

<script src="{{ asset('frontend/assets/js/jquery-3.1.1.min.js') }}"></script><!--Jquery-->
<script src="{{ asset('frontend/assets/js/navigation.js') }}"></script><!--Menu-->
<script src="{{ asset('frontend/assets/js/navigation-script.js') }}"></script><!--Menu-->
<script src="{{ asset('frontend/assets/js/ScrollUpScript.js') }}"></script><!--Home Script-->

@stop

@section('content')

<!--News details-->
<div class="News-details">
    <div class="container">
        <div class="blog-details">
            <div class="middle">
                <h2>{{$post->title}}</h2>
                <div class="about-art">
                    <div class="info">
                        <ul>
                            <li><svg><use xlink:href="#date"></use></svg><span>{{$post->created_at}}</span></li>
                        </ul>
                    </div><!--info-->
                    <div class="share">
                        <ul>
                            <li><span>{{trans('frontend.Share now')}}</span></li>
                            <li><a href="{{$post->slug}}" target="_blank" class="facebook" title=""><svg><use xlink:href="#facebook"></use></svg> </a></li>
                            <li><a href="{{$post->slug}}" target="_blank" class="twitter" title=""><svg><use xlink:href="#twitter"></use></svg> </a></li>
                            <li><a href="{{$post->slug}}" target="_blank" class="instagram" title=""><svg><use xlink:href="#instagram"></use></svg> </a></li>
                        </ul>
                    </div>
                </div><!--about-art-->
                <div class="blog-img">
                    <img src="{{$post->getMedia('images')->first()?$post->getMedia('images')->first()->getUrl():''}}" alt="" />
                </div><!--blog-img-->
                <div class="text">
                    <article>
                        {!! $post->content !!}
                    </article>
                </div>
            </div>
            <div class="MoreNews">
                <div class="recent">
                    <h2>{{trans('frontend.Recent News')}}</h2>
                    @foreach($recentPosts as $post)
                    <div class="MoreNews-item">
                        <img src="{{$post->getMedia('images')->first()?$post->getMedia('images')->first()->getUrl():''}}">
                        <div>
                            <h3>{{$post->title}}</h3>
                            <p>{{ str_limit($post->description,200,'...')}}</p>
                        </div>
                        <a href="{{url('news_detail',$post->slug)}}"></a>
                    </div>
                    @endforeach
                </div>
                <div class="popular">
                    <h2>{{trans('frontend.Popular News')}}</h2>
                    @foreach($popularPosts as $post)
                    <div class="popular-item">
                        <div  class="popular-img">
                            <img src="{{$post->getMedia('images')->first()?$post->getMedia('images')->first()->getUrl():''}}">
                        </div>
                        <div class="popular-data">
                            <h3>{{$post->title}}</h3>
                            <svg><use xlink:href="#date"></use></svg><span>{{$post->created_at}}</span>
                        </div>
                        <a href="{{url('news_detail',$post->slug)}}"></a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@stop