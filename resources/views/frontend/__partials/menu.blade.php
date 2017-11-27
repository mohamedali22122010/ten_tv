<!--Menu-->
<section class="Nav">
    <div class="container"><!--container-->
        <div class="Menu"><!--Menu-->
            <div class="Menu-left"><!--Menu-left-->
                <div class="search">
                    <input type="text" class="SearchInput" placeholder="بحث" >
                    <div class="icon">
                        <input type="submit" class="SearchButton" value="">
                        <div class="SearchIcon">
                            <div class="SvgContainer">
                                <svg><use xlink:href="#search"></use></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--Menu-left-->
            <div class="Menu-mid"><!--Menu-mid-->
                <nav id="navigation2" class="navigation">
                    <div class="nav-header">
                        <div class="nav-toggle"></div>
                    </div>
                    <div class="nav-menus-wrapper">
                        <ul class="nav-menu">
                            <li class="active"><a href="{{url('/')}}">{{trans('frontend.home')}}</a></li>
                            <!--<li><a href="">About</a>
                                <ul class="nav-dropdown">
                                    <li><a href="Beliefs.html">Beliefs</a></li>
                                    <li><a href="Beliefs.html">Beliefs</a></li>
                                </ul>
                            </li>-->
                            <li><a href="#">{{trans('frontend.programs')}}</a></li>
                            <li><a href="#">{{trans('frontend.broadcasttime')}}</a></li>
                            <li><a href="{{url('/about')}}">{{trans('frontend.aboutUs')}}</a></li>
                            <li><a href="{{url('/news')}}">{{trans('frontend.news')}}</a></li>
                            <li><a href="{{url('/live')}}">{{trans('frontend.live')}}</a></li>
                        </ul>
                    </div>
                </nav>
            </div><!--Menu-mid-->
            <div class="Menu-right"><!--Menu-right-->
                <img src="{{ asset('frontend/assets/images/logo.gif') }}" alt="TenTv"><!--Logo-->
                <a href="{{url('/')}}"></a>
            </div><!--Menu-right-->
        </div><!--Menu-->
    </div><!--container-->
</section>
