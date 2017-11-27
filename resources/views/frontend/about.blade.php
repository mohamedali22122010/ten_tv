@extends('layouts.frontend')

@section('page_style')
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/assets/css/About-Page.css') }}">
@stop

@section('page_script')

<script src="{{ asset('frontend/assets/js/jquery-3.1.1.min.js') }}"></script><!--Jquery-->
<script src="{{ asset('frontend/assets/js/navigation.js') }}"></script><!--Menu-->
<script src="{{ asset('frontend/assets/js/navigation-script.js') }}"></script><!--Menu-->
<script src="{{ asset('frontend/assets/js/CounterScript.js') }}"></script><!--FancyBox-->
<script src="{{ asset('frontend/assets/js/ScrollUpScript.js') }}"></script><!--Home Script-->

@stop

@section('content')

	<!--entertainment-->
<section class="entertainment">
    <div class="container"><!--Container-->
        <h2>شركة محطة التحرير للإنتاج الاعلامى والقنوات الفضائية</h2>
        <p class="title">Lorum Cras ultricies ligula sed magna dictum porta</p>
       <div class="entertainment-content">
           <div class="entertainment-left"><!--entertainmentLeft-->
               <p> Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus.</p>
               <div class="highlightParagraph">
                   <p>...Lorem Ipsum proin gravida nibh vel velit auctor aliquet. Aenean convallis quis ac lectus. </p>
                   <span>”</span>
               </div>
               <p> Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus.</p>
           </div><!--entertainmentLeft-->
           <div class="entertainment-right"><!--entertainmentRight-->
               <p>
                   Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Pellentesque in ipsum id orci porta dapibus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Nulla porttitor accumsan tincidunt. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel.
               </p>
           </div><!--entertainmentRight-->
       </div>
    </div><!--Container-->
</section>
<!--Facts-->
<section class="facts">
    <div class="container"><!--container-->
        <h2>حقائق و انجازات</h2>
        <p class="title">Lorum Cras ultricies ligula sed magna dictum porta</p>
        <div class="facts-conetent"><!--facts-conetent-->
            <div class="facts-paragraph"><!--facts-paragraph-->
                <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Donec sollicitudin molestie malesuada. Nulla porttitor accumsan tincidunt.</p>
                <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Donec sollicitudin molestie malesuada. Nulla porttitor accumsan tincidunt.</p>
                <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Donec sollicitudin molestie malesuada. Nulla porttitor accumsan tincidunt.</p>
            </div><!--facts-left-->
            <div class="facts-mid"><!--facts-mid-->
                <div>
                    <svg><use xlink:href="#icon5"></use></svg>
                    <p>Lorum Ipsum</p>
                </div>
                <div class="darkColor">
                    <svg><use xlink:href="#icon1"></use></svg>
                    <p>Lorum Ipsum</p>
                </div>
                <div class="darkColor">
                    <svg><use xlink:href="#icon4"></use></svg>
                    <p>Lorum Ipsum</p>
                </div>
                <div>
                    <svg><use xlink:href="#icon6"></use></svg>
                    <p>Lorum Ipsum</p>
                </div>
                <div >
                    <svg><use xlink:href="#icon3"></use></svg>
                    <p>Lorum Ipsum</p>
                </div>
                <div class="darkColor">
                    <svg><use xlink:href="#icon2"></use></svg>
                    <p>Lorum Ipsum</p>
                </div>
            </div><!--facts-mid-->
            <div class="facts-paragraph"><!--facts-paragraph-->
                <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Donec sollicitudin molestie malesuada. Nulla porttitor accumsan tincidunt.</p>
                <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Donec sollicitudin molestie malesuada. Nulla porttitor accumsan tincidunt.</p>
                <p>Donec rutrum congue leo eget malesuada. Proin eget tortor risus. Donec sollicitudin molestie malesuada. Nulla porttitor accumsan tincidunt.</p>
            </div><!--facts-right-->
        </div><!--facts-conetent-->
    </div><!--container-->
    <hr>
</section>
<!--Services-->
<section class="Services">
    <div class="Services-item"><!--Services-item-->
        <h3>01.</h3>
        <h2><span>انتاج</span>
            <span>الميديا</span>
        </h2>
        <p>Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.</p>
        <a href="#"></a>
    </div><!--Services-item-->
    <div class="Services-item"><!--Services-item-->
        <h3>02.</h3>
        <h2><span>TEN</span>
            <span>TV</span>
        </h2>
        <p>Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.</p>
        <a href="#"></a>
    </div><!--Services-item-->
    <div class="Services-item"><!--Services-item-->
        <h3>03.</h3>
        <h2><span>المسئوليه</span>
            <span>الاجتماعيه</span>
        </h2>
        <p>Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.</p>
        <a href="#"></a>
    </div><!--Services-item-->
</section>
<!--graph-->
<section class="graph">
    <div class="container">
        <img src="{{ asset('frontend/assets/images/graph.png') }}">
        <div class="graph-data">
            <div class="graph-item">
                <div class="graph-icon"><svg><use xlink:href="#list"></use></svg></div>
                <h3 class="counter" data-count="246">0</h3>
                <p>Employee</p>
            </div>
            <div class="graph-item">
                <div class="graph-icon"><svg><use xlink:href="#heart"></use></svg></div>
                <h3 class="counter" data-count="7890">0</h3>
                <p>Hours</p>
            </div>
            <div class="graph-item">
                <div class="graph-icon"><svg><use xlink:href="#star"></use></svg></div>
                <h3 class="counter" data-count="3926">0</h3>
                <p>Ratings</p>
            </div>
            <div class="graph-item">
                <div class="graph-icon"><svg><use xlink:href="#down"></use></svg></div>
                <h3 class="counter" data-count="218">0</h3>
                <p>Show</p>
            </div>
        </div>
    </div>
</section>
<!--Team-->
<section class="team">
    <div class="container">
        <h2>فريق العمل</h2>
        <p class="title">Lorum Cras ultricies ligula sed magna dictum porta.Lorum Cras ultricies ligula sed magna dictum porta.</p>
        <div class="team-data">
            <div class="team-member">
                <div class="member-img">
                    <img src="{{ asset('frontend/assets/images/mem.jpg') }}">
                </div>
                <div class="member-data">
                    <h2>Amr abdelhamed</h2>
                    <hr>
                    <p>General Manager</p>
                </div>
            </div>
            <div class="team-member">
                <div class="member-img">
                    <img src="{{ asset('frontend/assets/images/mem.jpg') }}">
                </div>
                <div class="member-data">
                    <h2>Amr abdelhamed</h2>
                    <hr>
                    <p>General Manager</p>
                </div>
            </div>
            <div class="team-member">
                <div class="member-img">
                    <img src="{{ asset('frontend/assets/images/mem.jpg') }}">
                </div>
                <div class="member-data">
                    <h2>Amr abdelhamed</h2>
                    <hr>
                    <p>General Manager</p>
                </div>
            </div>
        </div>
    </div>

</section>

	
	@include('frontend.__partials.contact')

@stop