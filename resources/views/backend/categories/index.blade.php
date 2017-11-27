@extends('layouts.backend',['page_title'=>trans('backend.Categories')])
@section('title')@parent - {{ trans('product.globals.categories') }} @stop
@section('content-header')
<ol class="breadcrumb">
	<li>
		<span><a href="{{ route('category.create') }}" class="btn btn-primary" data-toggle="tooltip" title="{{trans('backend.Add New')}}"><i class="icon">&#xf067;</i> </a></span>
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
							<form id="filter-form" action="{{  route('category.index') }}">
								<td>
								<input type="checkbox" class="selectAll">
								</td>
								<th> {{trans('backend.Title')}} </th>
								<th> {{trans('backend.Status')}} </th>
								<th> {{trans('backend.Action')}} </th>
							</form>
						</tr>
					</thead>

					<tbody>
						@if($categories && count($categories) > 0)
							@foreach($categories as $category)
							<tr id="{{$category->id}}">
								<td>
									<input class="bulk-action-checkbox" name="checkbox" type="checkbox" data-id="{{$category->id}}" data-delete="{{ route('category.destroy',$category->id) }}"  data-csrf='{{ csrf_token() }}' >
								</td>
								<td>{{$category->title}}</td>
								<td> 
									@if($category->status)
										<div class='badge bg-green'>{{trans('backend.Active')}}</div>
									@else
										<div class='badge bg-red'>{{trans('backend.Pending')}}</div>
									@endif
								</td>
								<td>
									<a href="{{ route('category.edit',$category->id) }}" class="btn btn-warning" data-toggle="tooltip" title="{{trans('backend.Edit')}}"><i class="icon">&#xf040;</i></a>
									<a href="#" data-id="{{ $category->id }}" data-csrf='{{ csrf_token() }}' data-action='{{ route('category.destroy',$category->id) }}' class="btn btn-danger delete" data-toggle="tooltip" title="{{trans('backend.Delete')}}"> <i class="icon">&#xf1f8;</i> </a>
								</td>
							</tr>
							@endforeach
						@else
						<tr>
							<td  id="no-record-founded" colspan="5">no categories founded</td>
						</tr>
						@endif
					</tbody>
				</table>
				<!-- /.box-body -->
				{{$categories->render()}}
				<div class="box-footer clearfix"></div>
			</div>
		</div>
		<!-- /.box -->
	</div>
</div>
@stop

@section('scripts')

@stop
