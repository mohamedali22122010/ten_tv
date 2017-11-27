@extends('layouts.backend',['page_title'=>trans('backend.Posts')])
@section('title')@parent - {{ trans('product.globals.categories') }} @stop
@section('content-header')
<ol class="breadcrumb">
	<li>
		<span><a href="{{ route('post.create') }}" class="btn btn-primary" data-toggle="tooltip" title="{{trans('backend.Add New')}}"><i class="icon">&#xf067;</i> </a></span>
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
							<form id="filter-form" action="{{  route('post.index') }}">
								<td>
								<input type="checkbox" class="selectAll">
								</td>
								<th> {{trans('backend.Title')}} </th>
								<th> {{trans('backend.Creator')}} </th>
								<th> {{trans('backend.Category')}} </th>
								<th> {{trans('backend.Status')}} </th>
								<th> {{trans('backend.Action')}} </th>
							</form>
						</tr>
					</thead>

					<tbody>
						@if($posts && count($posts) > 0)
							@foreach($posts as $post)
							<tr id="{{$post->id}}">
								<td>
									<input class="bulk-action-checkbox" name="checkbox" type="checkbox" data-id="{{$post->id}}" data-delete="{{ route('post.destroy',$post->id) }}"  data-csrf='{{ csrf_token() }}' >
								</td>
								<td>{{ str_limit($post->title,70)}}</td>
								<td>{{$post->creator->name}}</td>
								<td>{{$post->category->title}}</td>
								<td> 
									@if($post->status == 1)
										<div class='badge bg-green'>{{trans('backend.active')}}</div>
									@elseif($post->status == 0)
										<div class='badge bg-red'>{{trans('backend.inactive')}}</div>
									@endif
								</td>
								<td>
									<a href="{{ route('post.edit',$post->id) }}" class="btn btn-warning" data-toggle="tooltip" title="{{trans('backend.Edit')}}"><i class="icon">&#xf040;</i></a>
									<a href="#" data-id="{{ $post->id }}" data-csrf='{{ csrf_token() }}' data-action='{{ route('post.destroy',$post->id) }}' class="btn btn-danger delete" data-toggle="tooltip" title="{{trans('backend.Delete')}}"> <i class="icon">&#xf1f8;</i> </a>
								</td>
							</tr>
							@endforeach
						@else
						<tr>
							<td  id="no-record-founded" colspan="5">{{trans('backend.no posts founded')}}</td>
						</tr>
						@endif
					</tbody>
				</table>
				<!-- /.box-body -->
				{{$posts->render()}}
				<div class="box-footer clearfix"></div>
			</div>
		</div>
		<!-- /.box -->
	</div>
</div>
@stop

@section('scripts')

@stop
