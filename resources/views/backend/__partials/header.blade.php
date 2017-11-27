<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ route('backend.home') }}" class="logo"><b>{{trans('backend.Admin')}}</b> </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Navbar Right Menu -->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
	        <span class="sr-only">Toggle navigation</span>
	    </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="user-image" alt="User Image"/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ @auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
                            <p>
                                {{ @auth()->user()->name }}
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="{{URL('/logout')}}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"
                                         class="btn btn-default btn-flat">{{trans('backend.Sign out')}}</a>
                            </div>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>