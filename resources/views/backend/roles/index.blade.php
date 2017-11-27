@extends('layouts.backend',['page_title'=>'Pages'])
@section('title')@parent - {{ trans('product.globals.categories') }} @stop
@section('content-header')
    <div class="row">
        <div class="col-md-2 col-md-offset-5">
            <h4><strong> {{ trans('backend.Roles') }} </strong></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @if(auth()->user()->role_id == 1 || auth()->user()->can('roles.create'))
                <span><a href="{{ route('roles.create') }}" class="btn btn-primary" data-toggle="tooltip"
                         title="{{trans('backend.Add New')}}">{{trans('backend.Add New')}}</a></span>
            @endif
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover dataTable" id="roles-table">
                        <thead>
                        @if(1!=1)
                            <td>
                                <input type="checkbox" class="selectAll">
                            </td>@endif
                        <th>{{ trans('backend.attributes.name') }}</th>
                        <th colspan="3">{{ trans('backend.Action') }}</th>
                        </thead>
                        <tbody>
                        @if($roles && count($roles) > 0)
                            @foreach($roles as $key=>$role)
                                <tr id="{{$role->id}}" class="@if($key % 2 == 0) even @else odd @endif ">
                                    @if(1!=1)
                                        <td>
                                            <input class="bulk-action-checkbox" name="checkbox" type="checkbox"
                                                   data-id="{{$role->id}}"
                                                   data-delete="{{ route('roles.destroy',$role->id) }}"
                                                   data-csrf='{{ csrf_token() }}'>
                                        </td>@endif
                                    <td>{!! $role->name !!}</td>
                                    <td>
                                        <div class=''>
                                            @if(auth()->user()->role_id == 1 || auth()->user()->can('roles.show'))
                                                <a href="{!! route('roles.show', [$role->id]) !!}"
                                                   class='btn btn-default btn-sm' data-toggle="tooltip"
                                                   title="{{trans('backend.View')}}"><i
                                                            class="glyphicon glyphicon-eye-open"></i></a>
                                            @endif
                                            @if(auth()->user()->role_id == 1 || auth()->user()->can('roles.edit'))
                                                <a href="{!! route('roles.edit', [$role->id]) !!}"
                                                   class='btn btn-default btn-sm' data-toggle="tooltip"
                                                   title="{{trans('backend.Edit')}}"><i
                                                            class="glyphicon glyphicon-edit"></i></a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td id="no-record-founded" colspan="9">{{trans('backend.no records founded')}}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <!-- /.box-body -->
                    {{$roles->render()}}
                    <div class="box-footer clearfix"></div>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop

@section('scripts')

@stop
