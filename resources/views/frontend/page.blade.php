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

<!--policy-->
<section class="page">
    <div class="container">
        <h2>{{$page->title}}</h2>
        <article>
        	{!! $page->description !!}
        </article>
    </div>
</section>

	@include('frontend.__partials.contact')

@stop