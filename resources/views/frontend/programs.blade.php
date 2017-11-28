@extends('layouts.frontend')

@section('page_style')
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/assets/css/Programs-Page.css') }}">
@stop

@section('page_script')

<script src="{{ asset('frontend/assets/js/jquery-3.1.1.min.js') }}"></script><!--Jquery-->
<script src="{{ asset('frontend/assets/js/navigation.js') }}"></script><!--Menu-->
<script src="{{ asset('frontend/assets/js/navigation-script.js') }}"></script><!--Menu-->
<script src="{{ asset('frontend/assets/js/ScrollUpScript.js') }}"></script><!--Home Script-->

@stop

@section('content')

<!--News-->
<!--Programs-->
<section class="Programs">
    <div class="container">
        <div class="AllPrograms">
            @foreach($programs as $program)
            <div class="Program-item">
                <a href="{{url('program_detail',$program->slug)}}"><img src="{{$program->getMedia('images')->first()?$program->getMedia('images')->first()->getUrl():''}}"></a>
                <a href="{{url('program_detail',$program->slug)}}">{{$program->title}}</a>
                <p>{{$program->show_time}}</p>
                <p>{{$program->repeate_time}}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

@stop