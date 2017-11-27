<!--Footer-->
<footer>
    <hr>
    <div class="container"><!--container-->
        <div class="footer-left"><!--footer-left-->
            <span>©</span>
            <p>{{trans('frontend.copyright')}}</p>
        </div><!--footer-left-->
        <div class="footer-mid"><!--footer-mid-->
            <ul>
            	@foreach($pages as $page)
                <li><a href="{{url('page',$page->slug)}}">{{$page->title}}</a></li>
                @endforeach
            </ul>
        </div><!--footer-mid-->
        <div class="footer-right"><!--footer-right-->
            <ul>
                <li><a target="_blank" href="{{config('custom-setting.TwitterLink')}}" class="twitter"><svg><use xlink:href="#twitter"></use></svg></a></li>
                <li><a target="_blank" href="{{config('custom-setting.FacebookLink')}}" class="facebook"><svg><use xlink:href="#facebook"></use></svg></a></li>
                <li><a target="_blank" href="{{config('custom-setting.LinkedInLink')}}" class="linkedin"><svg><use xlink:href="#linkedin"></use></svg></a></li>
                <li><a target="_blank" href="{{config('custom-setting.InstagramLink')}}" class="instagram"><svg><use xlink:href="#instagram"></use></svg></a></li>
                <li><a target="_blank" href="{{config('custom-setting.YoutubeLink')}}" class="youtube"><svg><use xlink:href="#youtube"></use></svg></a></li>
                <li><a target="_blank" href="{{config('custom-setting.GooglePlusLink')}}" class="googleplus"><svg><use xlink:href="#googleplus"></use></svg></a></li>
                <li><a target="_blank" href="{{config('custom-setting.PinterestLink')}}" class="pinterest"><svg><use xlink:href="#pinterest"></use></svg></a></li>
            </ul>
        </div><!--footer-right-->
    </div><!--container-->
</footer>
