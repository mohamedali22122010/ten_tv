@extends('layouts.frontend')

@section('page_style')
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/assets/css/Timeline-Page.css') }}">
@stop

@section('page_script')

<script src="{{ asset('frontend/assets/js/jquery-3.1.1.min.js') }}"></script><!--Jquery-->
<script src="{{ asset('frontend/assets/js/navigation.js') }}"></script><!--Menu-->
<script src="{{ asset('frontend/assets/js/navigation-script.js') }}"></script><!--Menu-->
<script src="{{ asset('frontend/assets/OwlCarousl/owl.carousel.min.js') }}"></script><!--Home Script-->
<script src="{{ asset('frontend/assets/js/TimeLineScript.js') }}"></script><!--Home Script-->
<script src="{{ asset('frontend/assets/js/ScrollUpScript.js') }}"></script><!--Home Script-->

@stop

@section('content')

<!--Broadcast-->
<section class="Broadcast">
    <div class="container">
        <h2>مواعيد البث</h2>
        <div class="Timeline">
            <div class="Timeline-slider">
                <div id="owl-demo3" class="owl-carousel owl-theme"><!--OWl Carousel-->
                    @foreach($broadcasts as $broadcast)
                    <div class="item @if($currentShow && $currentShow->id == $broadcast->id)itemActive @endif"><!--item-->
                        <div class="time">
                            <button>{{trans('frontend.currently_shown')}}</button>
                            <p>{{$broadcast->show_at}}</p>
                        </div>
                        @if($broadcast->program)
                        <div class="item-img">
                            <img src="{{$broadcast->program->getMedia('images')->first()?$broadcast->program->getMedia('images')->first()->getUrl():''}}">
                            <h3>{{$broadcast->program->title}}</h3>
                        </div>
                        @else
                        <div class="item-img">
                            <img src="{{ asset('frontend/assets/images/logo.gif') }}">
                            <h3>{{$broadcast->program_name}}</h3>
                        </div>
                        @endif
                    </div><!--item-->
		            @endforeach


                </div><!--OWl Carousel-->
            </div>
            <div class="Timeline-logo">
                <div class="logo-time">
                    <h4>{{trans('frontend.'.$today->format('l'))}}</h4>
                    <p>{{$today->format('Y-m-d')}}</p>
                </div>
                <img src="{{ asset('frontend/assets/images/logo.gif') }}">
            </div>
        </div>
    </div>
</section>
@stop