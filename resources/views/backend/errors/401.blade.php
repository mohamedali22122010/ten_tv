@extends('layouts.backend',['page_title'=>'401 Page'])
@section('title')@parent - {{ trans('product.globals.categories') }} @stop
@section('content')
<!-- Small boxes (Stat box) -->
      <div class="row">{{@$message}}</div>
      <!-- /.row -->
      <!-- Main row -->
@stop