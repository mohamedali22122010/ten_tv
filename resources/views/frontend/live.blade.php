@extends('layouts.frontend')

@section('page_style')
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/assets/css/Live-Page.css') }}">
@stop

@section('page_script')

<script src="{{ asset('frontend/assets/js/jquery-3.1.1.min.js') }}"></script><!--Jquery-->
<script src="{{ asset('frontend/assets/js/navigation.js') }}"></script><!--Menu-->
<script src="{{ asset('frontend/assets/js/navigation-script.js') }}"></script><!--Menu-->
<script src="{{ asset('frontend/assets/js/ScrollUpScript.js') }}"></script><!--Home Script-->

@stop

@section('content')

<!--Live-->
<section class="Live">
    <div class="container">
        <iframe src="{{config('custom-setting.liveStreamLink')}}" frameborder="0" allowfullscreen></iframe>
    </div>
</section>

@stop