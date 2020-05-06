<?php
    include "header.php";
    include "config.php";
    
    if (isset($_GET["id"])){
        $C_ID = $_GET["id"];
    }
    $WF = array('باقي التخصصات الصحية','الصيدلة ','العلوم الطبية التطبيقية ','الأسنان ','التمريض ','الطب البشري');
    $t = array('ميداني','إلكتروني');
    $state = array('valid','unvalid');
    
    $getData = mysqli_query($con, "SELECT * FROM COURSE WHERE C_ID = '$C_ID'");
    $rowData = mysqli_fetch_array($getData);
    
    if(isset($_POST['submit'])){
        
        $cname=$_POST['cname'];
        $iname=$_POST['iname'];
        $time=$_POST['time'];
        $date=$_POST['date'];
        $price=$_POST['price'];
        $discription=$_POST['discription'];
        $stracture=$_POST['stracture'];
        $workfiled=$_POST['workfiled'];
        $type=$_POST['type'];
        $hours=$_POST['hours'];
        $city=$_POST['city'];
        $address=$_POST['address'];
        $state=$_POST['state'];
        move_uploaded_file($_FILES['file']['tmp_name'], "courseImg/".$_FILES['file']['name']);

        $update = mysqli_query($con, "UPDATE COURSE SET `C_NAME` = '$cname', `C_IMG` = '".$_FILES['file']['name']."', `I_NAME` = '$iname', `TIME` = '$time', `DATE` = '$date', `PRICE` = '$price', `DISCRIPTION` = '$discription', `STRUCTURE` = '$stracture', `WORK_FILED` = '$workfiled', `TYPE` = '$type', `HOURS` = '$hours', `CITY` = '$city', `ADDRESS` = '$address', `STATE` = '$state' WHERE `C_ID` = '$C_ID'");
        if($update){
            echo "<script> alert('تم تحديث الدورة بنجاح'); </script>" ;
            print'<meta http-equiv="refresh" content="0; URL=index.php">';
        }
    }
    
    if(isset($_POST['delete'])){
        $delete = mysqli_query($con, "DELETE FROM COURSE WHERE `COURSE`.`C_ID` = '$C_ID'");
        if($delete){
            echo "<script> alert('تم حذف الدورة بنجاح'); </script>" ;
            print'<meta http-equiv="refresh" content="0; URL=index.php">';
        }
        
    }
    
    print '<head>
	<title>إضافة دورة جديدة</title>
</head>
	
<main>
		<section class="fullwidth-background bg-2">
			<div class="grid-row">
				<div class="login-block">
					<div class="logo">
						<img src="img/logo1.png" data-at2x="img/logo@2x1.png" alt>
						<h2>تعديل معلومات الدورة</h2>
					</div>

					<div class="clear-both"></div>

					<form method="post"  enctype="multipart/form-data" action="update-course.php?id='.$rowData["C_ID"].'" class="login-form">
<div class="form-group">
<p style="text-align:center;">اسم الدورة</p>
<input type="text" name="cname" class="login-input" style="text-align:center;" value="'.$rowData["C_NAME"].'">
</div>

<div class="form-group">
<p style="text-align:center;">الفئة</p>
<select name="workfiled" id="workfiled" class="form-group">';
    
    foreach ($WF as $key => $value) {
        print "<option>$value</option>";
    }
    
print '</select>
<div class="form-group">
<p style="text-align:center;">نوع الدورة</p>
<select name="type" id="type" class="form-group">';
    
        foreach ($t as $key => $value) {
            print "<option>$value</option>";
        }
print '</select>
</div>

<div class="form-group">
<p style="text-align:center;">عدد الساعات</p>
<input type="text" name="hours" class="login-input" style="text-align:center;" value="'.$rowData["HOURS"].'">
</div>
    
<div class="form-group">
<p style="text-align:center;">اسم المحاضر</p>
<input type="text" name="iname" class="login-input" style="text-align:center;" value="'.$rowData["I_NAME"].'">
</div>
    
<div class="form-group">
<p style="text-align:center;">المدينة</p>
<input type="text" name="city" class="login-input" style="text-align:center;" value="'.$rowData["CITY"].'">
</div>
    
<div class="form-group">
<p style="text-align:center;">العنوان</p>
<textarea required name="address" cols="35" rows="5" class="form-group" value="'.$rowData["ADDRESS"].'"></textarea>
</div>

<div class="form-group">
<p style="text-align:center;">الوقت</p>
<input type="text" name="time" class="login-input" style="text-align:center;" value="'.$rowData["TIME"].'">
</div>

<div class="form-group">
<p style="text-align:center;">التاريخ</p>
<input type="text" name="date" class="login-input" style="text-align:center;" value="'.$rowData["DATE"].'">
</div>

<div class="form-group">
<p style="text-align:center;">الرسوم</p>
<input type="text" name="price" class="login-input" style="text-align:center;" value="'.$rowData["PRICE"].'">
</div>

<div class="form-group">
<p style="text-align:center;">صورة عن الدورة</p>
<input type="file" name="file" value="'.$rowData["C_IMG"].'">
</div>

<div class="form-group">
<p style="text-align:center;">الوصف</p>
<textarea required name="discription" cols="35" rows="5" class="form-group" value="'.$rowData["DISCRIPTION"].'"></textarea>
</div>

<div class="form-group">
<p style="text-align:center;">محاور الدورة</p>
<textarea required name="stracture" cols="35" rows="5" class="form-group" value="'.$rowData["STRUCTURE"].'"></textarea>
</div>

<p style="text-align:center;">صلاحية الدورة</p>
    <select name="state" id="state" class="form-group">';
    
    foreach ($state as $key => $value) {
        print "<option>$value</option>";
    }
    
    print '</select>
</div>

        <input type="submit" name="submit" value="تحديث" class="button-fullwidth cws-button bt-color-3 border-radius alt">
     <input type="submit" name="delete" value="حذف" class="button-fullwidth cws-button bt-color-3 border-radius alt">
					</form>
				</div>
			</div>
		</section>
	</main>';

    include "footer.php";
    ?>