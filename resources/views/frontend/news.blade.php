@extends('layouts.frontend')

@section('page_style')
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/assets/css/AllNews-page.css') }}">
@stop

@section('page_script')

<script src="{{ asset('frontend/assets/js/jquery-3.1.1.min.js') }}"></script><!--Jquery-->
<script src="{{ asset('frontend/assets/js/navigation.js') }}"></script><!--Menu-->
<script src="{{ asset('frontend/assets/js/navigation-script.js') }}"></script><!--Menu-->
<script src="{{ asset('frontend/assets/js/ScrollUpScript.js') }}"></script><!--Home Script-->

@stop

@section('content')

<!--News-->
<section class="AllNews">
   <section class="container">
       <div class="All"><!--All-->
           @foreach($posts as $post)
           <div class="News-item"><!--item-->
               <div class="news-img"><!--news-img-->
                   <a href="{{url('news_detail',$post->slug)}}">
                       <img src="{{$post->getMedia('images')->first()?$post->getMedia('images')->first()->getUrl():''}}">
                   </a>
               </div><!--news-img-->
               <div class="news-content"><!--news-content-->
                   <a href="{{url('news_detail',$post->slug)}}">{{$post->title}}</a>
                   <span>{{$post->created_at}}</span>
                   <p>{{ str_limit($post->description,50,'...')}}</p>
                   <button type="button"><a href="{{url('news_detail',$post->slug)}}">{{trans('frontend.Read More')}}</a></button>
               </div><!--news-content-->
           </div><!--item-->
           @endforeach
       </div><!--All-->
   </section>
</section>
@stop