<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!--<div class="user-panel">
        <div class="pull-left image">
        	@if(auth()->user()->image)
	          <img src="{{ auth()->user()->image }}" style="width: 50px;height: 50px;" class="img-circle" alt="User Image">
        	@else
	          <img src="{{ asset("bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">
        	@endif
        </div>
        <div class="pull-left info">
          <p>{{ auth()->user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> {{trans('backend.Online')}}</a>
        </div>
      </div>
	-->
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <!--<li class="header">{{trans('backend.MAIN NAVIGATION')}}</li>-->
            <!-- Optionally, you can add icons to the links -->
            @if(auth()->user()->role_id == 1 || auth()->user()->can('backend.home'))
	            <li ><a href="{{route('backend.home')}}"> <i class="fa fa-pie-chart"></i> <span>{{trans('backend.Dashboard')}}</span></a></li>
            @endif
    		@if(auth()->user()->role_id == 1 || auth()->user()->can('sliders.index'))
	            <li ><a href="{{route('sliders.index')}}"> <i class="fa fa-pie-chart"></i> <span>{{trans('backend.Sliders')}}</span></a></li>
            @endif
    		@if(auth()->user()->role_id == 1 || auth()->user()->can('users.index'))
	            <li ><a href="{{route('users.index')}}"> <i class="fa fa-pie-chart"></i> <span>{{trans('backend.Users')}}</span></a></li>
            @endif
    		@if(auth()->user()->role_id == 1 || auth()->user()->can('roles.index'))
	            <li ><a href="{{route('roles.index')}}"> <i class="fa fa-pie-chart"></i> <span>{{trans('backend.Roles')}}</span></a></li>
            @endif
			@if(auth()->user()->role_id == 1 || auth()->user()->can('category.index'))
	            <li ><a href="{{route('category.index')}}"> <i class="fa fa-pie-chart"></i> <span>{{trans('backend.Categories')}}</span></a></li>
            @endif	            
			@if(auth()->user()->role_id == 1 || auth()->user()->can('post.index'))
	            <li ><a href="{{route('post.index')}}"> <i class="fa fa-pie-chart"></i> <span>{{trans('backend.Posts')}}</span></a></li>
            @endif
			@if(auth()->user()->role_id == 1 || auth()->user()->can('pages.index'))
	            <li ><a href="{{route('pages.index')}}"> <i class="fa fa-pie-chart"></i> <span>{{trans('backend.Pages')}}</span></a></li>
            @endif
			@if(auth()->user()->role_id == 1 || auth()->user()->can('program.index'))
	            <li ><a href="{{route('program.index')}}"> <i class="fa fa-pie-chart"></i> <span>{{trans('backend.Program')}}</span></a></li>
            @endif
			@if(auth()->user()->role_id == 1 || auth()->user()->can('eposide.index'))
	            <li ><a href="{{route('eposide.index')}}"> <i class="fa fa-pie-chart"></i> <span>{{trans('backend.Program Eposide')}}</span></a></li>
            @endif
            @if(auth()->user()->role_id == 1 || auth()->user()->can('video.index'))
                <li ><a href="{{route('video.index')}}"> <i class="fa fa-pie-chart"></i> <span>{{trans('backend.Program Featured Video')}}</span></a></li>
            @endif
			@if(auth()->user()->role_id == 1 || auth()->user()->can('broadcast.index'))
	            <li ><a href="{{route('broadcast.index')}}"> <i class="fa fa-pie-chart"></i> <span>{{trans('backend.Program Broadcast')}}</span></a></li>
            @endif
			@if(auth()->user()->role_id == 1 || auth()->user()->can('setting.index'))
	            <li ><a href="{{ route('setting.index') }}"> <i class="fa fa-cog fa-fw"></i> <span>Setting</span></a></li>
            @endif

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>