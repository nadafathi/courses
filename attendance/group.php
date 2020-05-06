<?php


include_once 'includes/db.php';
include ("includes/header.php");

htmlheader();

htmltopheader();

$numofforms = isset($_GET["num"]) ? $_GET["num"] : 0 ; 
$CourseID = isset($_GET["course"]) ? $_GET["course"] : 0 ;
$Course = getCourses(" where ID=$CourseID ","array");
$coursename = $Course["Coursename"];

?>

 <?php for($i=1 ; $i<=$numofforms ; $i++ ){ ?>
<div class="home-register">
          <div class="container">
            <div id="results<?php echo $i; ?>" align="right"></div>
          </div>
             
          <div class="container">
            <div class="in-home-register">
              <div class="row">
                <div class="col-md-12">
				<?php if($i == 1) {?>
					<h5><span dir="rtl"><?php echo "الدورة $coursename"?></span></h5>
                 <?php } ?> 
				  <h5><span dir="rtl"><?php echo "سجل بيانات المنتسب رقم $i "?></span></h5>
                </div>
              </div>
			
				<form id="frmregsigle<?php echo $i; ?>" name="frmregsigle<?php echo $i; ?>" method="post" action="">
              <div class="row">
                  <input type="hidden" name="userID" id="userID" value="0" >
				  <input type="hidden" name="coursename" id="coursename" value="<?php echo $CourseID ; ?>" >
				  <input type="hidden" name="isgroup" id="isgroup" value="1" >
                  <input type="hidden" name="submit_frmregsigle" id="submit_frmregsigle" value="frmregsigle" >
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
					<option value="">---اختر المرحلة الدراسية---</option>
					<option value="طالب">طالب</option>
					<option value="طالب امتياز">طالب امتياز</option>
					<option value="طبيب عام">طبيب عام</option>
				</select>
			</div>		

				<div class="col-md-12 col-sm-12 col-xs-12"><hr></div>
					<?php if($i == $numofforms){?>
				<div class="col-md-12 col-sm-12 col-xs-12 text-right">
					<label style="text-align:right"> 
					أوافق على <a href = "terms.php" target="_blank"> الأحكام والشروط</a>
					<input type="checkbox" name="checkterm" id="checkterm"  >
					</label>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 text-center">
					<input type="button" name="submit_frmregsigle" value="سجل الآن" onclick="Submitforms(); ">
				</div>
				<?php } ?>
					
             </div>
			 </form>
            
			
			</div>
          </div>
		 
        </div>
 <?php } ?>
 <script>
	function Submitforms(){
	
		if(!document.getElementById('checkterm').checked) 
		 {
		alert('يرجى الموافقة على الشروط والأحكام'); 
		document.getElementById('checkterm').focus()
		return;
		 }
		for(var i=1; i<= <?php echo $numofforms; ?> ; i++){
			var form = document.getElementById('frmregsigle'+i);
		    if(form.style.display != "none" && form){
				if(!checkforms_reg(form))
					break;
					
				if(saveform(form,i)){
					$("#frmregsigle"+i).remove();
				}
			}
		}
	}
	
 </script>
<?php
echo footer();
?>