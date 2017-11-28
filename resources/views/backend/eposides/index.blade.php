@extends('layouts.backend',['page_title'=>trans('backend.Eposides')])
@section('title')@parent - {{ trans('product.globals.categories') }} @stop
@section('content-header')
<ol class="breadcrumb">
	<li>
		<span><a href="{{ route('eposide.create') }}" class="btn btn-primary" data-toggle="tooltip" title="{{trans('backend.Add New')}}"><i class="icon">&#xf067;</i> </a></span>
		<span><a id="deleteAll-action" type="button" data-toggle="tooltip" title="{{trans('backend.Delete Selected')}}" class="btn btn-danger"><i class="icon">&#xf1f8;</i></a></span>
	</li>
</ol>
@stop

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table class="table table-bordered table-hover dataTable">
					<thead>
						<tr>
							<form id="filter-form" action="{{  route('eposide.index') }}">
								<td>
								<input type="checkbox" class="selectAll">
								</td>
								<th> {{trans('backend.Title')}} </th>
								<th> {{trans('backend.Program')}} </th>
								<th> {{trans('backend.Action')}} </th>
							</form>
						</tr>
					</thead>

					<tbody>
						@if($eposides && count($eposides) > 0)
							@foreach($eposides as $eposide)
							<tr id="{{$eposide->id}}">
								<td>
									<input class="bulk-action-checkbox" name="checkbox" type="checkbox" data-id="{{$eposide->id}}" data-delete="{{ route('eposide.destroy',$eposide->id) }}"  data-csrf='{{ csrf_token() }}' >
								</td>
								<td>{{ str_limit($eposide->title,70)}}</td>
								<td>{{$eposide->program->title}}</td>
								<td>
									<a href="{{ route('eposide.edit',$eposide->id) }}" class="btn btn-warning" data-toggle="tooltip" title="{{trans('backend.Edit')}}"><i class="icon">&#xf040;</i></a>
									<a href="#" data-id="{{ $eposide->id }}" data-csrf='{{ csrf_token() }}' data-action='{{ route('eposide.destroy',$eposide->id) }}' class="btn btn-danger delete" data-toggle="tooltip" title="{{trans('backend.Delete')}}"> <i class="icon">&#xf1f8;</i> </a>
								</td>
							</tr>
							@endforeach
						@else
						<tr>
							<td  id="no-record-founded" colspan="5">{{trans('backend.no eposides founded')}}</td>
						</tr>
						@endif
					</tbody>
				</table>
				<!-- /.box-body -->
				{{$eposides->render()}}
				<div class="box-footer clearfix"></div>
			</div>
		</div>
		<!-- /.box -->
	</div>
</div>
@stop

@section('scripts')

@stop
