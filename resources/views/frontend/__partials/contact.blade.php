	<!--conatct-->
	<section class="contact">
	    <div class="container"><!--container-->
	        <h2>اتصل بنا</h2>
	        <div class="contact-detaills"><!--conatct-details-->
	            <div class="details-item"><!--details-item-->
	                <div class="contact-icon">
	                    <svg><use xlink:href="#location"></use></svg>
	                </div>
	                <h2>العنوان</h2>
	                <div>
	                    <span>908 New Hampshire Avenue</span>
	                    <span>Northwest #100,Washington, DC</span>
	                    <span>20037, United States</span>
	                </div>
	                <a href="#"></a>
	            </div><!--details-item-->
	            <div class="details-item"><!--details-item-->
	                <div class="contact-icon">
	                    <svg><use xlink:href="#phone"></use></svg>
	                </div>
	                <h2>التليفونات</h2>
	                <div>
	                    <span>التليفون:  +1 916-875-2235</span>
	                    <span>الموبيل: +1 916-875-2235</span>
	                    <span>الفاكس: +1 916-875</span>
	                </div>
	            </div><!--details-item-->
	            <div class="details-item"><!--details-item-->
	                <div class="contact-icon">
	                    <svg><use xlink:href="#email"></use></svg>
	                </div>
	                <h2>الإيميل</h2>
	                <div>
	                    <span>info@domain.ltd</span>
	                    <span>thegem@domain.ltd</span>
	                    <span>www.codex-themes.com</span>
	                </div>
	            </div><!--details-item-->
	            <div class="details-item"><!--details-item-->
	                <div class="contact-icon">
	                    <svg><use xlink:href="#clock"></use></svg>
	                </div>
	                <h2>ساعات العمل</h2>
	                <div>
	                    <span>Monday-Friday: 9:00 – 18:00</span>
	                    <span>Saturday:  11:00 – 17:00</span>
	                    <span>Sunday:  Closed</span>
	                </div>
	                <a href="#"></a>
	            </div><!--details-item-->
	        </div><!--conatct-details-->
	        <div class="contact-form"><!--conatct-form-->
	            <form action="{{route('contactPageSubmit')}}" class="contactform" method="post">
	            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	                <div class="form-top">
	                    <input id="name" name="name" type="text" data-rule="required" placeholder="الأسم *">
	                    <input id="email" name="email" type="email" data-rule="required" placeholder="الإيميل *">
	                    <input id="url" name="url" type="url" placeholder="الموقع *">
	                </div>
	                <textarea id="message" name="message" data-rule="required" placeholder="الرسالة"></textarea>
	                <input type="submit" value="ارسال الرسالة">
	                <div class="Sucess" style="display: none">Send Sucessful</div>
	                <div class="Error" style="display: none">Error sending the message</div>
	            </form>
	        </div><!--conatct-form-->
	    </div><!--container-->
	</section>
