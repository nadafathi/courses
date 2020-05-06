<?php
include "header.php";
    include "config.php";
    
    if(isset($_POST['submit'])){
        
        $email= $_POST['email'];
        $getData = mysqli_query($con, "SELECT * FROM NOTIVICATION WHERE EMAIL = '$email'");
        $rowData = mysqli_fetch_array($getData);
        
        if(count($rowData) == 0){
            $insert = mysqli_query($con,"INSERT INTO NOTIVICATION (`EMAIL`) VALUES ('$email')");
            if($insert){
                echo "<script> alert('تم حفظ البريد الالكتروني بنجاح'); </script>" ;
            }
        }
    }
    
    ?>

<!-- revolution slider -->
<style type="text/css">
.counter-block {
}
</style>

<div class="tp-banner-container">
<div class="tp-banner-slider">
<ul>
<li data-masterspeed="700">
<img src="/rs-plugin/assets/loader.gif" data-lazyload="img/slider4.jpg" alt>
<div class="tp-caption sl-content align-left" data-x="['left','center','center','center']" data-hoffset="20" data-y="center" data-voffset="0"  data-width="['720px','600px','500px','300px']" data-transform_in="opacity:0;s:1000;e:Power2.easeInOut;"
data-transform_out="opacity:0;s:300;s:1000;" data-start="400">
<div class="sl-title">Doctor T</div>
<p> مشروع يهدف الى تقديم أفضل الخدمات<br/>التدريبية للكادر الطبي و الارتقاء بالمهارات </p>
<a href="page-register.php" class="cws-button border-radius">انضم لنا <i class="fa fa-angle-double-right"></i></a>
</div>
</li>
<li data-masterspeed="700">
<img src="/rs-plugin/assets/loader.gif" data-lazyload="img/slider5.jpg" alt>
<div class="tp-caption sl-content align-right" data-x="['right','center','center','center']" data-hoffset="20" data-y="center" data-voffset="0"  data-width="['720px','600px','500px','300px']" data-transform_in="opacity:0;s:1000;e:Power2.easeInOut;"
data-transform_out="opacity:0;s:300;s:1000;" data-start="400">
<div class="sl-title">تقدم معنا</div>
<p>نقدم افضل الدورات للارتقاء بالمهارات و الكفاءات في المجال الصحي<br>
  عبر دعم الطلبة و الخريجين في تحصيل نقاط الهيئة و ساعاتها</p>
<a href="page-register.php" class="cws-button border-radius">انضم لنا <i class="fa fa-angle-double-right"></i></a>
</div>
</li>
<li data-masterspeed="700" data-transition="fade">
<img src="/rs-plugin/assets/loader.gif" data-lazyload="img/slider6.jpg" alt>
<div class="tp-caption sl-content align-center" data-x="center" data-hoffset="0" data-y="center" data-voffset="0"  data-width="['720px','600px','500px','300px']" data-transform_in="opacity:0;s:1000;e:Power2.easeInOut;"
data-transform_out="opacity:0;s:300;s:1000;" data-start="400">
<div class="sl-title">عدة مجالات</div>
<p>نوفر دورات لعدة تتخصصات في المجال الصحي<br/>بإشراف مباشر من عدة جهات معتمرة و استشاريين </p>
<a href="page-register.php" class="cws-button border-radius">انضم لنا <i class="fa fa-angle-double-right"></i></a>
</div>
</li>

</ul>
</div>
</div>
<!-- / revolution slider -->
	<hr class="divider-color">
	<!-- content -->
	<div id="home" class="page-content padding-none">

		<!-- section -->
	<section class="fullwidth-background padding-section">
				<section class="padding-section">
			<div class="grid-row clear-fix">
				<div class="grid-col-row">
					<div class="grid-col grid-col-6">
						<div class="boxs-tab">
							<div class="animated fadeIn active" data-box="1">
								<img src="img/aboutUs.jpg" alt>
							</div>
							
						</div>
					</div>
				  <div class="grid-col grid-col-6">
					<div class="grid-col grid-col-6 clear-fix">
						
					  <h3 id="who-us">من نحن</h3>
					  <h5>برنامج تنموي يهدف إلى تقديم أفضل الخدمات التدريبية للكادر الطبي و الارتقاء بالمهارات و الكفاءات في المجال الصحي عبر دعم الطلبة و الخريجين و الممارسين في تحصيل نقاط و ساعات الهيئة السعودية للتخصصات بإشراف مباشر من عدة جهات معتمدة و إستشاريين في المجالات المختلفة </h5>
					</div>
</div>
		</div>
		</section>
		<!-- / section -->
		<!-- paralax section -->
		
				</div>
			</div>
		</div>
		<!-- / paralax section -->
	<hr class="divider-color"/>
		<!-- section -->
		<section class="fullwidth-background padding-section">
			<div class="grid-row">
			  <h4 id="use" class="center-text">طريقة الإستخدام</h4>
			  <!-- time line -->
				<div class="time-line">
					<div class="line-element">
						<div class="action">
							<div class="action-block">
								<span><i class="flaticon-magnifier"></i></span>
								<div class="text">
									<h3> اختيار الدورة</h3>
									<p>اختر الدورة المناسبة من صفحة الدورات</p>
								</div>
							</div>
						</div>
						<div class="level">
							<div class="level-block">الخطوة الأولى</div>
						</div>
					</div>
					<div class="line-element color-2">
						<div class="level">
							<div class="level-block">الخطوة الثانية</div>
						</div>
						<div class="action">
							<div class="action-block">
								<span><i class="flaticon-computer"></i></span>
								<div class="text">
									<h3>التسجيل</h3>
									<p>اضغط على المزيد لرؤية تفاصيل الدورة ثم قم بالتسجيل من رابط "التسجيل في المؤتمر" اعلى الصفحة</p>
								</div>
							</div>
						</div>
					</div>
					<div class="line-element color-3">
						<div class="action">
							<div class="action-block">
								<span><i class="flaticon-shopping"></i></span>
								<div class="text">
									<h3>تأكيد التسجيل</h3>
									<p>بارسال ايصال التحويل البنكي على الرقم الموجود </p>
								</div>
							</div>
						</div>
						<div class="level">
							<div class="level-block">الخطوة الثالثة</div>
						</div>
					</div>
				</div>
				<!-- / time line -->
			</div>
		</section>
		<!-- / paralax section -->
		<hr class="divider-color" />
		<!-- paralax section -->
		<section class="padding-section">
			<div class="grid-row clear-fix">
				<div class="grid-col-row">
					<div class="grid-col grid-col-6">
						<div class="boxs-tab">
							<div class="animated fadeIn active" data-box="1">
								<img src="img/us.jpg" alt>
							</div>
							
						</div>
					</div>
				  <div class="grid-col grid-col-6">
				    <h3 id="majors">المجالات</h3>
				    <h5>الطب البشري بفروعه <br>
				      التمريض <br>
				      الأسنان <br>
				      العلوم الطبية التطبيقية <br>
				      الصيدلة <br>
				      باقي التخصصات الصحية</h5>
				  </div>
				</div>
			</div>
		</section>
		<!-- / paralax section -->
		<hr class="divider-color"/>
		<!-- paralax section -->
		<section class="fullwidth-background padding-section">
			<div class="grid-row clear-fix">
			  <h3 id="services" class="center-text">خدماتنا</h3>
			  <div class="grid-col-row">
					<div class="grid-col grid-col-6">
					  <h5>أول موقع يقدم خدمات الدعم في نقاط الهيئة السعودية للتخصصات الصحية  تحت قالب واحد و بشكل يوفر الوقت و الجهد على المستفيد من الكادر الصحي </h5>
					  <!-- accordions -->
						<div class="accordions">
							<!-- content-title -->
						  <div class="content-title active">
						    <h3>الخدمات</h3>
						  </div>
							<!--/content-title -->
							<!-- accordions content -->
							<div class="content"><strong> دعم في تقديم الأبحاث الطبية في المؤتمرات العلمية <br>
تقديم كورسات معتمدة ومطلوبة <br>
تقديم ورش عمل <br>
تقديم مؤتمرات علمية <br>
تقديم حملات توعوية ممنهجة
							إتاحة الفرصة للمتحدثين </strong></div>
							<!--/accordions content -->
							<!-- content-title -->
							
						<!--/accordions -->
						
					</div>
				</div>
				<div class="grid-col grid-col-6">
						<div class="owl-carousel full-width-slider">
							<div class="gallery-item picture">
								<img src="img/abt1.jpg" data-at2x="../img/abt1.jpg" alt>
							</div>
							<div class="gallery-item picture">
							<img src="img/abt2.jpg" data-at2x="../img/abt2.jpg" alt>
							</div>
						</div>
				</div>
				
			</div>
		</section>

		<!-- parallax section -->
		<div class="parallaxed">
			<div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5">
				<div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5"> </div>
				<img src="img/parallax.png" alt="">
			</div>
			<div class="them-mask bg-color-2"></div>
			<div class="grid-row center-text">
				<div class="font-style-1 margin-none">ليصلك كل جديد</div>
				<div class="divider-mini"></div>
				<p class="parallax-text">ابقى على تواصل معنا بإدخال بريدك الالكتروني ليصلك كل جديد من الدورات </p>
				<form class="subscribe" method="post"  action="index.php">
					<input type="text" name="email" size="40" placeholder="xxx@xxx.xxx"><input type="submit" name="submit" value="اشتراك">
                </form>
			</div>
		</div>

	<hr class="divider-color"/>	<!-- parallax section -->
		<div class="parallaxed">
			<div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5">
				<img src="img/parallax.png" alt="">
			</div>
			<div class="them-mask bg-color-3"></div>
			<div class="grid-row center-text">
				<!-- twitter -->
			  <h3> شركاء النجاح </h3>
				<div class="grid-col-row clear-fix">
					
					<div class="grid-col grid-col-4 alt">
						<div class="counter-block last">
						 <img src="img/5.png" alt="">
					  </div>
				  </div>
					
					<div class="grid-col grid-col-4 alt">
						<div class="counter-block last">
						 <img src="img/10.png" alt="" >
						</div>
					</div>

					<div class="grid-col grid-col-4 alt">
						<div class="counter-block last">
						 <img src="img/11.png" alt="" >
						</div>
					</div>
					
					<div class="grid-col grid-col-4 alt">
						<div class="counter-block last">
						    <img src="img/13.png" alt="" >
						</div>
					</div>
					
					<div class="grid-col grid-col-4 alt">
						<div class="counter-block last">
						 <img src="img/12.png" alt="" >
						</div>
					</div>
					
					<div class="grid-col grid-col-4 alt">
						<div class="counter-block last">
						    <img src="img/100.png" alt="" >
						</div>
					</div>
					
					
					
			  </div>
			</div>
		</div>
		<!-- parallax section -->
		<hr class="divider-color" />
	</div>

<?php
  include "footer.php";
    ?>