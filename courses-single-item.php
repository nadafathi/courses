<?php
    include "header.php";
    include "config.php";
    
    if (isset($_GET["id"])){
        $C_ID = $_GET["id"];
    }
    
    $getData = mysqli_query($con, "SELECT * FROM COURSE WHERE C_ID = '$C_ID'");
    $rowData = mysqli_fetch_array($getData);
    
    if(isset($_POST['submit'])){
        
        $email=$_POST['email'];
        $password=$_POST['password'];
        
        $getData1 = mysqli_query($con, "SELECT * FROM USERS WHERE U_EMAIL = '$email' and U_PASSWORD = '$password'");
        $rowData1 = mysqli_fetch_array($getData1);
        
        if(count($rowData1) > 0){
            $insert = mysqli_query($con, "INSERT INTO `SCS`.`USER_COURSES` (`U_ID`, `C_ID`, `C_NAME`) VALUES ('".$rowData1['U_ID']."', '".$C_ID."', '".$rowData['C_NAME']."')");
            if($insert){
                echo "<script> alert('تم الحاقك في الدورة بنجاح'); </script>" ;
            }
        }else{
            echo "<script> alert('تأكد من صحة معلوماتك'); </script>" ;
        }
    }

	print '<div class="page-content">
		<div class="container clear-fix">
			<div class="grid-col-row">
				
					<!-- main content -->
					<main>
						<section style="text-align:right;">
							<h2>'.$rowData["C_NAME"].'</h2>
							<div class="picture">
								<div class="hover-effect"></div>
								<img src="courseImg/'.$rowData["C_IMG"].'" data-at2x="img/course1.jpg" alt>
							</div>

							<div class="tabs">
								<div class="block-tabs-btn clear-fix">
									<div class="tabs-btn active" data-tabs-id="tabs1"style="float:right;"> تفاصيل الدورة</div>
									<div class="tabs-btn" data-tabs-id="tabs2"style="float:right;">المكان و الوقت</div>
									<div class="tabs-btn" data-tabs-id="tabs3"style="float:right;">السعر</div>
									<div class="tabs-btn" data-tabs-id="tabs4"style="float:right;">التسجيل</div>
								</div>

								<div class="tabs-keeper">

                            <div class="container-tabs active" data-tabs-id="cont-tabs1">
                                <h3>'.$rowData["C_NAME"].'</h3>
                                <p>'.$rowData["HOURS"].' ساعات</p>
                                <p>  اسم المحاضر : '.$rowData["I_NAME"].'</p>
                                <p>نوع الدورة : '.$rowData["TYPE"].'</p>
                                <p>'.$rowData["DISCRIPTION"].'</p>
                                <div class="columns-row">
                                    <div>
                                        <ul class="check-list">
                                            '.$rowData["STRUCTURE"].'
                                        </ul>
                                    </div>
                                </div>
                            </div>
    
									<div class="container-tabs" data-tabs-id="cont-tabs2">
                                    <h3>'.$rowData["CITY"].'</h3>
                                    <p>'.$rowData["ADDRESS"].'</p>
                                    <p>بتاريخ  '.$rowData["DATE"].' , الساعة '.$rowData["TIME"].'</p>
                                    <div class="columns-row"> </div>
									</div>

									<div class="container-tabs" data-tabs-id="cont-tabs3">
									  <h3> '.$rowData["PRICE"].' ريال سعودي </h3>
									  <p>الدفع عن طريق التحويل البنكي - </p>
									</div>

									<div class="container-tabs" data-tabs-id="cont-tabs4">
<a href="http://doctortproject.org/attendance/index.php">للتسجيل في الدورة</a>
</br>
										
									</div>
								</div>
							</div>';

    $getData = mysqli_query($con, "SELECT A_USER_NAME FROM ADMIN WHERE A_USER_NAME = '$logged'");
    $rowData = mysqli_fetch_array($getData);
    if( count($rowData) > 0 ){
        print '<a href="update-course.php?id='.$C_ID.'" class="cws-button border-radius small bt-color-3 alt">تعديل</a>';
    }
    ?>

					</main>
			</div>
		</div>
	</div>
<?php
    include "footer.php";
    ?>