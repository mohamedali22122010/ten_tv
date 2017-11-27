<?php
if( Request::get('role_id') ==1){
	$page_title = 'backend.Admin Users';
}elseif( Request::get('role_id') == 2){
	$page_title = 'backend.Disk Users';
}elseif( Request::get('role_id') == 3){
	$page_title = 'backend.Doctors';
}elseif( Request::get('role_id') == 4){
	$page_title = 'backend.Hospitals';
}elseif( Request::get('role_id') == 5){
	$page_title = 'backend.Companies';
}elseif( Request::get('role_id') == 6){
	$page_title = 'backend.Regular Users';
}else{
	$page_title = 'backend.Users';
}
?>

@extends('layouts.backend',['page_title'=> trans($page_title)])
@section('title')@parent - {{ trans('user.globals.users') }} @stop
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
							<form id="filter-form" action="">
								<th>
								<input type="checkbox" class="selectAll">
								</th>
								<input type="hidden" name="role_id" value="{{ Request::get('role_id') }}">
								<th> {{ trans('backend.Name') }} </th>

								<th> {{ trans('backend.Email') }} </th>
								<th> {{trans('backend.Status')}} </th>
								<th> {{ trans('backend.Action') }} </th>
							</form>
						</tr>
					</thead>

					<tbody>
						@if($users && count($users) > 0)
							@foreach($users as $user)
							<tr id="{{$user->id}}">
								<td>
								<input class="bulk-action-checkbox" name="checkbox" type="checkbox" data-id="{{$user->id}}" data-delete="{{ route('users.destroy',$user->id) }}"  data-csrf='{{ csrf_token() }}' >
								</td>
								<td>{{ $user->name }}</td>
								<td> {{ $user->email }}</td>
								<td> 
									@if($user->status)
										<div class='badge bg-green'>{{trans('backend.Active')}}</div>
									@else
										<div class='badge bg-red'>{{trans('backend.Pending')}}</div>
									@endif
								</td>
								<td>
									@if(Request::get('role_id') ==1 && Auth::user()->id == $user->id)
										<a href="{{ route('users.edit',$user->id) }}" class="btn btn-warning" data-toggle="tooltip" title="Edit"><i class="icon">&#xf040;</i></a>
									@endif
									@if($user->id != Auth::user()->id)
										@if(!$user->status)
											<a href="{{ route('users.active',$user->id) }}" class="btn bg-green" data-toggle="tooltip" title="{{trans('backend.active')}}"><i class="icon">&#xf00c;</i></a>
										@else
											<a href="{{ route('users.disactive',$user->id) }}" class="btn bg-navy" data-toggle="tooltip" title="{{trans('backend.disactive')}}"><i class="icon">&#xf00d;</i></a>
										@endif
										<a href="#" data-id="{{ $user->id }}" data-csrf='{{ csrf_token() }}' data-action='{{ route('users.destroy',$user->id) }}' class="btn btn-danger delete" data-toggle="tooltip" title="Delete"> <i class="icon">&#xf1f8;</i> </a>
									@endif
								</td>
							</tr>
							@endforeach
						@else
						<tr>
							<td id="no-record-founded" colspan="5">{{ trans('backend.no users founded') }}</td>
						</tr>
						@endif
					</tbody>
				</table>
				<!-- /.box-body -->
				{{$users->render()}}
				<div class="box-footer clearfix"></div>
			</div>
			<!-- /.box -->
		</div>
	</div>
</div>

@stop
@section('scripts')

@stop