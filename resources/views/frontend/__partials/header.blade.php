<!--GoToTop-->
<div class="scrollup">
    <a href="#"><svg><use xlink:href="#top"></use></svg></a>
</div>
<!--Header-->
<header>
    <hr>
    <div class="container"><!--container-->
        <div class="header"><!--Header-->
            <div class="header-left"><!--header-left-->
                <ul>
   	                <li><a target="_blank" href="{{config('custom-setting.TwitterLink')}}" class="twitter"><svg><use xlink:href="#twitter"></use></svg></a></li>
	                <li><a target="_blank" href="{{config('custom-setting.FacebookLink')}}" class="facebook"><svg><use xlink:href="#facebook"></use></svg></a></li>
	                <li><a target="_blank" href="{{config('custom-setting.LinkedInLink')}}" class="linkedin"><svg><use xlink:href="#linkedin"></use></svg></a></li>
	                <li><a target="_blank" href="{{config('custom-setting.InstagramLink')}}" class="instagram"><svg><use xlink:href="#instagram"></use></svg></a></li>
	                <li><a target="_blank" href="{{config('custom-setting.YoutubeLink')}}" class="youtube"><svg><use xlink:href="#youtube"></use></svg></a></li>
	                <li><a target="_blank" href="{{config('custom-setting.GooglePlusLink')}}" class="googleplus"><svg><use xlink:href="#googleplus"></use></svg></a></li>
	                <li><a target="_blank" href="{{config('custom-setting.PinterestLink')}}" class="pinterest"><svg><use xlink:href="#pinterest"></use></svg></a></li>
                </ul>
            </div><!--header-left-->
            <div class="header-mid"><!--header-mid-->
            	@if(\App::getLocale() == "ar")
	                {{config('custom-setting.HeaderAr')}}
                @else
	                {{config('custom-setting.HeaderEn')}}            
                @endif
            </div><!--header-mid-->
            <div class="header-right"><!--header-right-->
                <nav id="navigation1" class="navigation">
                    <ul class="nav-menu">
                        <li><a href="#"><svg><use xlink:href="#{{ucfirst(App::getLocale())}}Flag"></use></svg>{{config('laravel-translatable.languages.'.App::getLocale())}}</a>
                            <ul class="nav-dropdown">
                                @foreach(config('laravel-translatable.languages') as $language=>$name)
	                                <li><a href="{{url('language')}}/{{$language}}"><svg><use xlink:href="#{{ucfirst($language)}}Flag"></use></svg>{{$name}}</a></li>
    							@endforeach
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div><!--header-right-->

        </div><!--header-->
    </div><!--container-->
</header>
