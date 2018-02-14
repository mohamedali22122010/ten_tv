@extends('layouts.backend',['page_title'=>'Pages'])
@section('title')@parent - {{ trans('product.globals.categories') }} @stop
@section('content-header')
<ol class="breadcrumb">
	<li>
		<span><a href="{{ route('pages.create') }}" class="btn btn-primary" data-toggle="tooltip" title="Add New"><i class="icon">&#xf067;</i> </a></span>
		<span><a id="deleteAll-action" type="button" data-toggle="tooltip" title="Delete Selected" class="btn btn-danger"><i class="icon">&#xf1f8;</i></a></span>
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
							<form id="filter-form" action="{{  route('pages.index') }}">
								<th>
								<input type="checkbox" class="selectAll">
								</th>
								<th> Title </th>
								<th> Status </th>
								<th> Action </th>
							</form>
						</tr>
					</thead>

					<tbody>
						@if($pages && count($pages) > 0)
							@foreach($pages as $page)
							<tr id="{{$page->id}}">
								<td>
									<input class="bulk-action-checkbox" name="checkbox" type="checkbox" data-id="{{$page->id}}" data-delete="{{ route('pages.destroy',$page->id) }}"  data-csrf='{{ csrf_token() }}' >
								</td>
								<td>{{$page->title}}</td>
								<td> 
									@if($page->status == 1)
										<div class='badge bg-green'>{{trans('backend.active')}}</div>
									@elseif($page->stage == 0)
										<div class='badge bg-red'>{{trans('backend.inactive')}}</div>
									@endif
								</td>
								<td>
									<a href="{{ route('pages.edit',$page->id) }}" class="btn btn-warning" data-toggle="tooltip" title="Edit"><i class="icon">&#xf040;</i></a>
									<a href="#" data-id="{{ $page->id }}" data-csrf='{{ csrf_token() }}' data-action='{{ route('pages.destroy',$page->id) }}' class="btn btn-danger delete" data-toggle="tooltip" title="Delete"> <i class="icon">&#xf1f8;</i> </a>
								</td>
							</tr>
							@endforeach
						@else
						<tr>
							<td  id="no-record-founded" colspan="5">no pages founded</td>
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
