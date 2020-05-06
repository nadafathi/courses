<?php


include_once 'includes/db.php';
include ("includes/header.php");

htmlheader();

htmltopheader();


$Courses = getCourses("",null);
$Coursesgrp = getCourses("",null);
$Conferances= getConferances("",null);
?>

    <div class="home-slider">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <ul class="bxslider">
              <li>
                <img src="img/1468714605.jpg" class="c_img" alt="الدورات الطبية" />
                <span>
                      <h1>كن من ضمن المشاركين </h1>
                      <h6>للبرنامج التدريبي للدورات الطبية</h6>
                      <!-- <a href="cv.php"  style="margin-top:0px !important">ابدأ التسجيل</a> -->
                    </span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- home-blocks -->
    <div class="home-blocks">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="in-hmoe-blocks">
              <a style="cursor:pointer" onClick="get_regcourse()" >
                <i class="fa fa-user" aria-hidden="true"></i>
                <h4> <h4>
                تسجيل منتسب للفرد
                  </h4>
                    <p>
                 يرجى التسجيل لتصبح احد منتسبين الدورات الطبية
                   </p></h4>
              </a>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="in-hmoe-blocks">
              <a style="cursor:pointer" onClick="get_group()">
                <i class="fa fa-users" aria-hidden="true"></i>
                <h4> <h4>
                  تسجيل جديد للمجموعات
                  </h4>
                    <p>
                  يرجى ادخال عدد المشاركين بالمجموعة ومن ثم بياناتهم
                   </p></h4>
              </a>
            </div>
          </div>

	<div class="col-md-4 col-sm-6 col-xs-12">
            <div class="in-hmoe-blocks">
              <a style="cursor:pointer" onClick="get_conf()">
                <i class="fa fa-briefcase conf" aria-hidden="true"></i>
                <h4> <h4>
                  تسجيل المشاركين في المؤتمر
                  </h4>
                    <p>
                  يرجى التسجيل في نظام الترشيح في حالة عدم امكانية تسجيل الدخول
                   </p></h4>
              </a>
            </div>
          </div>


        </div>
      </div>
    </div>
    <!-- home-blocks -->

    <div class="home-register">
      <div class="container">
        <div id="results" align="right"></div>
      </div>
    </div>


    <div id="reg_course" style="display:none">

        <div class="home-register">
          <div class="container">
            <div id="results" align="right"></div>
          </div>
            
          <div class="container">
            <div class="in-home-register">
              <div class="row">
                <div class="col-md-12">
                  <h5>سجل بيانات المنتسب للدورة</h5>
                </div>
              </div>
	 <form id="frmregsigle" name="frmregsigle" method="post" action="">
              <div class="row">
                  <input type="hidden" name="userID" id="userID" value="0" >
                  <input type="hidden" name="submit_frmregsigle" id="submit_frmregsigle" value="frmregsigle" >
                  <input type="hidden" name="ptype" id="ptype" value="pu">
                  
				<div class="col-md-4 col-sm-12 col-xs-12">
                                    <input type="text" name="arabicname" id="arabicname" placeholder="* الاسم الثلاثي" >
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12engname">
					<input type="text" name="engname" id="fullname" placeholder="* الاسم الثلاثي بالانجليزي" >
				</div>		
				<div class="col-md-4 col-sm-12 col-xs-12">
                                    <input type="text" name="nationalid" id="nationalid" placeholder="* السجل المدني أو الإقامة" >
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12"><hr></div>  
				<div class="col-md-3 col-sm-12 col-xs-12">
					<input type="number" onKeyPress="if(this.value.length==10) return false;" name="mobilenum" id="mobilenum" placeholder="* رقم الجوال 0500000000" >
				</div>
						
				<div class="col-md-3 col-sm-12 col-xs-12">
					<input type="text" name="tasneefnum" id="tasneefnum" placeholder="رقم تصنيف الهيئة ان وجد" >
				</div>
						
				<div class="col-md-3 col-sm-12 col-xs-12">
					<input type="text" name="email" id="email" placeholder="* الإيميل" >
				</div>
				<div class="col-md-3 col-sm-12 col-xs-12">
					<input type="text" name="workname" id="workname" placeholder="* جهة العمل" >
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12"><hr></div>  
			
					
			<div class="col-md-4 col-sm-12 col-xs-12">
				<select name="location" id="location">
					<option value="">* --- اختر مقر الدورة---  </option>
					<option value="أون لاين">أون لاين </option>
					<option value="مقر الموتمر بجدة">مقر الموتمر بجدة</option>
				</select>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				  <select  name="studentlevel" id="studentlevel">
					<option value="">---اختر التخصص---</option>
					<option>Dentistry</option>
					<option>Medical Laboratories</option>
					<option>Physiotherapy</option>
					<option>Pharmacy</option>
					<option>Nursing</option>
					<option>Medicine</option>
				</select>
			</div>		
						
			<div class="col-md-4 col-sm-12 col-xs-12">
				  <select  name="coursename" id="coursename" >
					<option value="">--- اختر الدورة التدريبية ---</option>
					<?php 
						while($course=mysqli_fetch_array($Courses)) {
					?>
					  <option value="<?php echo $course['ID'];?>"><?php echo  $course['Coursename']; ?></option>		  
					<?php
					}
					?>
				</select>
			</div>
				<div class="col-md-12 col-sm-12 col-xs-12"><hr></div>  
				<div class="col-md-12 col-sm-12 col-xs-12 text-center">
					<input type="button" name="submit_frmregsigle" value="سجل الآن" onclick="return send_reg(document.getElementById('frmregsigle'))">
				</div>
					
             </div>
			 </form>
            </div>
          </div>
        </div>
        <!-- home-register -->
   </div>

    <div id="group" style="display:none">
        <div class="home-register">
          <div class="container">
            <div class="in-home-register">
              <div class="row">
                <div class="col-md-12">
                  <h5>سجل المجموعة للدورة</h5>
                </div>
              </div>
                <form id="frmgrpregsigle" name="frmgrpregsigle" method="post" action="">
              <div class="row">
                  <input type="hidden" name="userID" id="userID" value="0" >
                  <input type="hidden" name="submit_frmregsigle" id="submit_frmregsigle" value="frmgrpregsigle" >
				
				<div class="col-md-6 col-sm-12 col-xs-12">
					<input type="number" name="numofusers" id="numofusers" placeholder="* عدد المشاركين في المجموعة" >
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
				  <select  name="grpcoursename" id="grpcoursename" >
					<option value="">--- اختر الدورة التدريبية ---</option>
					<?php 
						while($course=mysqli_fetch_array($Coursesgrp)) {
					?>
					  <option value="<?php echo $course['ID'];?>"><?php echo  $course['Coursename']; ?></option>		  
					<?php
					}
					?>
				</select>
			</div>

				<div class="col-md-12 col-sm-12 col-xs-12"><hr></div>  
				<div class="col-md-12 col-sm-12 col-xs-12 text-center">
					<input type="button" name="submit_frmregsigle" value="سجل الآن" onclick="goToGroups();">
				</div>
					
             </div>
			 </form>
            </div>
          </div>
        </div>
    </div>

        <div id="conf" style="display:none">
     <div class="home-register">
          <div class="container">
            <div id="results" align="right"></div>
          </div>
            
          <div class="container">
            <div class="in-home-register">
              <div class="row">
                <div class="col-md-12">
                  <h5>سجل بيانات المنتسب للمؤتمر</h5>
                </div>
              </div>
	 <form id="frmconf" name="frmconf" method="post" action="" enctype="multipart/form-data">
              <div class="row">
                  <input type="hidden" name="userID" id="userID" value="0" >
                  <input type="hidden" name="submit_confregsigle" id="submit_confregsigle" value="confregsigle" >
                  <input type="hidden" name="ptype" id="ptype" value="pu">
                  
				<div class="col-md-4 col-sm-12 col-xs-12">
                                    <input type="text" name="arabicname" id="arabicname" placeholder="* الاسم الثلاثي" >
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12engname">
					<input type="text" name="engname" id="engname" placeholder="* الاسم الثلاثي بالانجليزي" >
				</div>		
				<div class="col-md-4 col-sm-12 col-xs-12">
                                    <input type="text" name="nationalid" id="nationalid" placeholder="* السجل المدني أو الإقامة" >
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12"><hr></div>  
				<div class="col-md-4 col-sm-12 col-xs-12">
					<input type="number" onKeyPress="if(this.value.length==10) return false;" name="mobilenum" id="mobilenum" placeholder="* رقم الجوال 0500000000" >
				</div>
											
				<div class="col-md-4 col-sm-12 col-xs-12">
					<input type="text" name="email" id="email" placeholder="* الإيميل" >
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12">
					<input type="text" name="workname" id="workname" placeholder="* جهة العمل" >
				</div>
				
			
				<div class="col-md-12 col-sm-12 col-xs-12"><hr></div>  
			
			<div class="col-md-4 col-sm-12 col-xs-12">
				  <select  name="confname" id="confname" >
					<option value="">--- اختر المؤتمر ---</option>
					<?php 
						while($conf=mysqli_fetch_array($Conferances)) {
					?>
					  <option value="<?php echo $conf['ID'];?>"><?php echo  $conf['Conferancename']; ?></option>		  
					<?php
					}
					?>
				</select>
			</div>
			
			<div class="col-md-4 col-sm-12 col-xs-12">
				<select  name="confparticipatetype" id="confparticipatetype">
					<option value="">---اختر نوع الحضور---</option>
					<option value="مشارك">مشارك</option>
					<option value="حضور فقط">حضور فقط</option>
				</select>
			</div>
			
			<div id="participate"> 
				<div class="col-md-12 col-sm-12 col-xs-12"><hr></div>
				<div class="col-md-4 col-sm-12 col-xs-12">
						<input type="text" name="postertitle" id="postertitle" placeholder="* عنوان البوستر" >
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12">
					  <input type="text" name="postersummery" id="postersummery" placeholder="* ملخص البوستر" >
				</div>		
				 <input type="hidden" name="postertxtfile" id="postersummery" >
				

					<div class="col-md-12 col-sm-12 col-xs-12"><hr></div> 
				<div class="col-md-9 col-sm-12 col-xs-12">
					<span class="ch-radio date-melad"> 
						<label>تحميل بوستر للملف بصيغة ال jpg/png أقل من 2 MB</label>
						<span>
						  <label>
							<input id="posterfile" name="posterfile" type="file" />
						  </label>
						</span>
					</span>
				</div>	
			</div>	
			<div class="col-md-12 col-sm-12 col-xs-12"><hr></div> 
				<div class="col-md-12 col-sm-12 col-xs-12 text-center">
					<input type="button" name="submit_frmregsigle" value="سجل الآن" onclick="return send_conf(document.getElementById('frmconf'))">
				</div>
					
             </div>
			 </form>
            </div>
          </div>
        </div>
    </div>
<script type="text/javascript">
                //<![CDATA[
                function validate_signup_register_personal_form(frm) {
                  var value = '';
                  var errFlag = new Array();
                  var _qfGroups = {};
                  _qfMsg = '';

                  value = frm.elements['fullname'].value;
                  if (value == '' && !errFlag['fullname']) {
                        errFlag['fullname'] = true;
                        _qfMsg = _qfMsg + '\n - يجب تسجيل الاسم كامل';
                  }

                  value = frm.elements['fullname'].value;
                  if (value != '' && value.length < 8 && !errFlag['fullname']) {
                        errFlag['fullname'] = true;
                        _qfMsg = _qfMsg + '\n - يرجى التأكد من صحة الاسم بحيث انه قصير ';
                  }



                  value = frm.elements['Rank'].value;
                  if (value == '-1' && !errFlag['Rank']) {
                        errFlag['Rank'] = true;
                        _qfMsg = _qfMsg + '\n -يرجى اختيار الرتبة';
                  }


                  value = frm.elements['MilitaryID'].value;
                  if (value == '' && !errFlag['MilitaryID']) {
                        errFlag['MilitaryID'] = true;
                        _qfMsg = _qfMsg + '\n - يرجى إدخال الرقم العسكري';
                  }
                  
                  
                 value = frm.elements['Unit'].value;
                  if (value == '-1' && !errFlag['Unit']) {
                        errFlag['Unit'] = true;
                        _qfMsg = _qfMsg + '\n -يرجى اختيار الوحدة الرئيسية';
                  }


                  if (_qfMsg != '') {
                        _qfMsg = 'يوجد اخطأء على النحو التالي' + _qfMsg;
                        _qfMsg = _qfMsg + '\nيرجى تصحيح الأخطاء المذكورة أعلاه';
                        alert(_qfMsg);
                        return false;
                  }
                  return true;
                }
                //]]>
                </script>
<?php
echo footer();
?>