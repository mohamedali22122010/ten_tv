@extends('layouts.backend',['page_title'=>'Slide Show'])
@section('title')@parent - {{ trans('product.globals.categories') }} @stop
@section('content-header')
<ol class="breadcrumb">
	<li>
		<span><a href="{{ route('sliders.create') }}" class="btn btn-primary" data-toggle="tooltip" title="Add New"><i class="icon">&#xf067;</i> </a></span>
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
							<form id="filter-form" action="{{  route('sliders.index') }}">
								<th>
								<input type="checkbox" class="selectAll">
								</th>
								<th> Image </th>
								<th> Status </th>
								<th> Action </th>
							</form>
						</tr>
					</thead>

					<tbody>
						@if($sliders && count($sliders) > 0)
							@foreach($sliders as $slider)
							<tr id="{{$slider->id}}">
								<td>
									<input class="bulk-action-checkbox" name="checkbox" type="checkbox" data-id="{{$slider->id}}" data-delete="{{ route('sliders.destroy',$slider->id) }}"  data-csrf='{{ csrf_token() }}' >
								</td>
								<td>
									@foreach($slider->getMedia('main_image') as $key => $image)
										@if($image) 
											<img style="width: 50px" src="{{ $image->getUrl() }}"  alt="Image">
										@endif 
									@endforeach
								</td>
								<td>
									@if($slider->active==1)
										<div class='badge bg-green'> Active</div>
									@else
										<div class='badge bg-red'> Pending</div>
									@endif
								</td>
								<td>
									<a href="{{ route('sliders.edit',$slider->id) }}" class="btn btn-warning" data-toggle="tooltip" title="Edit"><i class="icon">&#xf040;</i></a>
									<a href="#" data-id="{{ $slider->id }}" data-csrf='{{ csrf_token() }}' data-action='{{ route('sliders.destroy',$slider->id) }}' class="btn btn-danger delete" data-toggle="tooltip" title="Delete"> <i class="icon">&#xf1f8;</i> </a>
								</td>
							</tr>
							@endforeach
						@else
						<tr>
							<td id="no-record-founded" colspan="5">no slider founded</td>
						</tr>
						@endif
					</tbody>
				</table>
				<!-- /.box-body -->
				{{$sliders->render()}}
				<div class="box-footer clearfix"></div>
			</div>
			<!-- /.box -->
		</div>
	</div>
</div>
@stop

@section('scripts')


@stop