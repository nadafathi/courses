<?php
    include "header.php";
    include "config.php";
    
    $WF = array('باقي التخصصات الصحية','الصيدلة ','العلوم الطبية التطبيقية ','الأسنان ','التمريض ','الطب البشري');
    $t = array( 'ميداني و إلكتروني','ميداني','إلكتروني');
    
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
        
        move_uploaded_file($_FILES['file']['tmp_name'], "courseImg/".$_FILES['file']['name']);

        $insert = mysqli_query($con, "INSERT INTO COURSE (`C_NAME`, `C_IMG`, `WORK_FILED`, `PRICE`, `TIME`, `DATE`, `DISCRIPTION`, `STRUCTURE`, `I_NAME`, `TYPE`, `HOURS`, `CITY`, `ADDRESS`,`STATE`) VALUES ('$cname', '".$_FILES['file']['name']."', '$workfiled', '$price', '$time', '$date', '$discription', '$stracture', '$iname', '$type', '$hours', '$city', '$address', 'valid')");
        if($insert){
            echo "<script> alert('تم إضافة الدورة بنجاح'); </script>" ;
            $getData = mysqli_query($con, "SELECT * FROM NOTIVICATION");
            $msg = "تم إضافة دورة جديدة في الموقع";
            while($rowData = mysqli_fetch_array($getData)){
                mail($rowData["EMAIL"],"دورة جديدة",$msg);
            }
            print'<meta http-equiv="refresh" content="0; URL=index.php">';
        }
    }
    ?><head>
	<title>إضافة دورة جديدة</title>
</head>
	
<main>
		<section class="fullwidth-background bg-2">
			<div class="grid-row">
				<div class="login-block">
					<div class="logo">
						<img src="img/logo2.png" alt>
						<h2>إضافة دورة جديدة</h2>
					</div>

					<div class="clear-both"></div>

					<form method="post"  enctype="multipart/form-data" action="add-course.php" class="login-form">
<div class="form-group">
<p style="text-align:center;">اسم الدورة</p>
<input type="text" name="cname" class="login-input" style="text-align:center;">
</div>

<div class="form-group">
<p style="text-align:center;">الفئة</p>
<select name="workfiled" id="workfiled" class="form-group">
<?php
    foreach ($WF as $key => $value) {
        print "<option>$value</option>";
    }
    ?>
</select>
</div>

<div class="form-group">
<p style="text-align:center;">نوع الدورة</p>
<select name="type" id="type" class="form-group">
<?php
    foreach ($t as $key => $value) {
        print "<option>$value</option>";
    }
    ?>
</select>
</div>

<div class="form-group">
<p style="text-align:center;">عدد الساعات</p>
<input type="text" name="hours" class="login-input" style="text-align:center;">
</div>

<div class="form-group">
<p style="text-align:center;">اسم المحاضر</p>
<input type="text" name="iname" class="login-input" style="text-align:center;">
</div>

<div class="form-group">
<p style="text-align:center;">المدينة</p>
<input type="text" name="city" class="login-input" style="text-align:center;">
</div>

<div class="form-group">
<p style="text-align:center;">العنوان</p>
<textarea required name="address" cols="35" rows="5" class="form-group"></textarea>
</div>

<div class="form-group">
<p style="text-align:center;">الوقت</p>
<input type="text" name="time" class="login-input" placeholder="٠٠:٠٠ ص/م" style="text-align:center;">
</div>

<div class="form-group">
<p style="text-align:center;">التاريخ</p>
<input type="text" name="date" class="login-input" placeholder="٠٠-٠٠-٠٠٠٠" style="text-align:center;">
</div>

<div class="form-group">
<p style="text-align:center;">الرسوم</p>
<input type="text" name="price" class="login-input" placeholder="SR" style="text-align:center;">
</div>

<div class="form-group">
<p style="text-align:center;">صورة عن الدورة</p>
<input type="file" name="file">
</div>

<div class="form-group">
<p style="text-align:center;">الوصف</p>
<textarea required name="discription" cols="35" rows="5" class="form-group"></textarea>
</div>

<div class="form-group">
<p style="text-align:center;">محاور الدورة</p>
<textarea required name="stracture" cols="35" rows="5" class="form-group"></textarea>
</div>

        <input type="submit" name="submit" value="إضافة دورة" class="button-fullwidth cws-button bt-color-3 border-radius alt">
					</form>
				</div>
			</div>
		</section>
	</main>
<?php
    include "footer.php";
    ?>