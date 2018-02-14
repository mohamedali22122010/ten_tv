@extends('layouts.backend',['page_title'=>trans('backend.videos')])
@section('title')@parent - {{ trans('product.globals.categories') }} @stop
@section('content-header')
<ol class="breadcrumb">
	<li>
		<span><a href="{{ route('video.create') }}" class="btn btn-primary" data-toggle="tooltip" title="{{trans('backend.Add New')}}"><i class="icon">&#xf067;</i> </a></span>
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
							<form id="filter-form" action="{{  route('video.index') }}">
								<td>
								<input type="checkbox" class="selectAll">
								</td>
								<th> {{trans('backend.Title')}} </th>
								<th> {{trans('backend.Program')}} </th>
								<th> {{trans('backend.In Home')}} </th>
								<th> {{trans('backend.Action')}} </th>
							</form>
						</tr>
					</thead>

					<tbody>
						@if($videos && count($videos) > 0)
							@foreach($videos as $video)
							<tr id="{{$video->id}}">
								<td>
									<input class="bulk-action-checkbox" name="checkbox" type="checkbox" data-id="{{$video->id}}" data-delete="{{ route('video.destroy',$video->id) }}"  data-csrf='{{ csrf_token() }}' >
								</td>
								<td>{{ str_limit($video->title,70)}}</td>
								<td>{{$video->program->title}}</td>
								<td> 
									@if($video->is_home == 1)
										<div class='badge bg-green'>{{trans('backend.In Home')}}</div>
									@elseif($video->is_home == 0)
										<div class='badge bg-red'>{{trans('backend.Not Home')}}</div>
									@endif
								</td>
								<td>
									<a href="{{ route('video.edit',$video->id) }}" class="btn btn-warning" data-toggle="tooltip" title="{{trans('backend.Edit')}}"><i class="icon">&#xf040;</i></a>
									<a href="#" data-id="{{ $video->id }}" data-csrf='{{ csrf_token() }}' data-action='{{ route('video.destroy',$video->id) }}' class="btn btn-danger delete" data-toggle="tooltip" title="{{trans('backend.Delete')}}"> <i class="icon">&#xf1f8;</i> </a>
								</td>
							</tr>
							@endforeach
						@else
						<tr>
							<td  id="no-record-founded" colspan="5">{{trans('backend.no videos founded')}}</td>
						</tr>
						@endif
					</tbody>
				</table>
				<!-- /.box-body -->
				<div class="box-footer clearfix"></div>
			</div>
		</div>
		<!-- /.box -->
	</div>
</div>
@stop

@section('scripts')
<script type="text/javascript">
$(function () {

	$(".dataTable").dataTable( {
	    "drawCallback": function( settings ) {
	        deleteRecord();
	    }
	});
});

</script>

@stop
