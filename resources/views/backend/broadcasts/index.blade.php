@extends('layouts.backend',['page_title'=>trans('backend.Broadcasts')])
@section('title')@parent - {{ trans('product.globals.categories') }} @stop
@section('content-header')
<ol class="breadcrumb">
	<li>
		<span><a href="{{ route('broadcast.create') }}" class="btn btn-primary" data-toggle="tooltip" title="{{trans('backend.Add New')}}"><i class="icon">&#xf067;</i> </a></span>
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
							<form id="filter-form" action="{{  route('broadcast.index') }}">
								<td>
								<input type="checkbox" class="selectAll">
								</td>
								<th> {{trans('backend.Day')}} </th>
								<th> {{trans('backend.Program')}} </th>
								<th> {{trans('backend.Time')}} </th>
								<th> {{trans('backend.Type')}} </th>
								<th> {{trans('backend.Action')}} </th>
							</form>
						</tr>
					</thead>

					<tbody>
						@if($broadcasts && count($broadcasts) > 0)
							@foreach($broadcasts as $broadcast)
							<tr id="{{$broadcast->id}}">
								<td>
									<input class="bulk-action-checkbox" name="checkbox" type="checkbox" data-id="{{$broadcast->id}}" data-delete="{{ route('broadcast.destroy',$broadcast->id) }}"  data-csrf='{{ csrf_token() }}' >
								</td>
								<td>{{$broadcast->day_name}}</td>
								<td>{{$broadcast->program->title}}</td>
								<td>{{$broadcast->show_at}}</td>
								<td> 
									@if($broadcast->repeate == 1)
										<div class='badge bg-red'>{{trans('backend.Is Repeate')}}</div>
									@endif
								</td>
								<td>
									<a href="{{ route('broadcast.edit',$broadcast->id) }}" class="btn btn-warning" data-toggle="tooltip" title="{{trans('backend.Edit')}}"><i class="icon">&#xf040;</i></a>
									<a href="#" data-id="{{ $broadcast->id }}" data-csrf='{{ csrf_token() }}' data-action='{{ route('broadcast.destroy',$broadcast->id) }}' class="btn btn-danger delete" data-toggle="tooltip" title="{{trans('backend.Delete')}}"> <i class="icon">&#xf1f8;</i> </a>
								</td>
							</tr>
							@endforeach
						@else
						<tr>
							<td  id="no-record-founded" colspan="5">{{trans('backend.no broadcasts founded')}}</td>
						</tr>
						@endif
					</tbody>
				</table>
				<!-- /.box-body -->
				{{$broadcasts->render()}}
				<div class="box-footer clearfix"></div>
			</div>
		</div>
		<!-- /.box -->
	</div>
</div>
@stop

@section('scripts')

@stop
