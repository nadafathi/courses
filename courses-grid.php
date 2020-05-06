<!DOCTYPE HTML>
<?php
    include "header.php";
    include "config.php";
    
    $WF = array('باقي التخصصات الصحية','الصيدلة ','العلوم الطبية التطبيقية ','الأسنان ','التمريض ','الطب البشري');
    
    
    if(isset($_POST["search"])){
        $work = $_POST["workfiled"];
        $getData = mysqli_query($con, "SELECT * FROM COURSE WHERE STATE = 'valid' AND WORK_FILED = '$work' ORDER BY `C_ID` DESC");
    }else{
        $getData = mysqli_query($con, "SELECT * FROM COURSE WHERE STATE = 'valid' ORDER BY `C_ID` DESC");
    }
    
    ?>	
	<!-- / header -->
	<!-- page content -->
	<div class="page-content">
		<div class="container">
			<!-- main content -->
			<main>
				<section>
				    
<div class="clear-fix">
   <div class="login-block">
    <form method="post"  enctype="multipart/form-data" action="courses-grid.php" class="login-form">
        <div class="form-group">
<p style="text-align:center;">اختر التخصص من هنا</p>
<select name="workfiled" class="form-group">
<?php
    foreach ($WF as $key => $value) {
        print "<option>$value</option>";
    }
    ?>
</select></p>
<input type="submit" name="search" value="ابحث" >

</div>
</div>
    </form>
    
    </br>
    </br>
    <?php
 
    $count=0;
        
    while($rowData = mysqli_fetch_array($getData)){
        $_SESSION["c_id"] = $rowData["C_ID"];
        $count++;
        
        if($count == 6){
            print'<div class="grid-col grid-col-4">
            <!-- course item -->
            </br></br>
            <div class="course-item">
            <div class="course-hover">
            <img src="courseImg/'.$rowData["C_IMG"].'" alt="">
            <div class="hover-bg bg-color-1"></div>
            <a href="courses-single-item.php?id='.$rowData["C_ID"].'">المزيد</a>
            </div>
            <div class="course-name clear-fix">
            <span class="price">'.$rowData["PRICE"].'</span>
            <h3>'.$rowData["C_NAME"].'</h3>
            </div>
            <div class="course-date bg-color-1 clear-fix">
            <div class="day"><i class="fa fa-calendar"></i>'.$rowData["DATE"].'</div><div class="time"><i class="fa fa-clock-o"></i>At '.$rowData["TIME"].'</div>
            <div class="divider"></div>
            <div class="description">'.$rowData["DISCRIPTION"].'</div>
            </div>
            </div>
            </div>
            </div>';
            $count = 0;
            
            
		}else if($count == 4){
			print '<div class="grid-col grid-col-4">
			</br></br>
            <div class="course-item">
            <div class="course-hover">
            <img src="courseImg/'.$rowData["C_IMG"].'" alt="">
            <div class="hover-bg bg-color-5"></div>
            <a href="courses-single-item.php?id='.$rowData["C_ID"].'">المزيد</a>
            </div>
            <div class="course-name clear-fix">
            <span class="price">'.$rowData["PRICE"].'</span>
            <h3>'.$rowData["C_NAME"].'</h3>
            </div>
            <div class="course-date bg-color-5 clear-fix">
            <div class="day"><i class="fa fa-calendar"></i>'.$rowData["DATE"].'</div><div class="time"><i class="fa fa-clock-o"></i>At '.$rowData["TIME"].'</div>
            <div class="divider"></div>
            <div class="description">'.$rowData["DISCRIPTION"].'</div>
            </div>
            </div>
            </div>';
            
        }else if($count == 3){
			print'<div class="grid-col grid-col-4">
            <!-- course item -->
            <div class="course-item">
            <div class="course-hover">
            <img src="courseImg/'.$rowData["C_IMG"].'" alt="">
            <div class="hover-bg bg-color-2"></div>
            <a href="courses-single-item.php?id='.$rowData["C_ID"].'">المزيد</a>
            </div>
            <div class="course-name clear-fix">
            <span class="price">'.$rowData["PRICE"].'</span>
            <h3>'.$rowData["C_NAME"].'</h3>
            </div>
            <div class="course-date bg-color-2 clear-fix">
            <div class="day"><i class="fa fa-calendar"></i>'.$rowData["DATE"].'</div><div class="time"><i class="fa fa-clock-o"></i>At '.$rowData["TIME"].'</div>
            <div class="divider"></div>
            <div class="description">'.$rowData["DISCRIPTION"].'</div>
            </div>
            </div>
            </div>';

        }else if($count == 5){
			print'<div class="grid-col grid-col-4">
			</br></br>
            <div class="course-item">
            <div class="course-hover">
            <img src="courseImg/'.$rowData["C_IMG"].'" alt="">
            <div class="hover-bg bg-color-4"></div>
            <a href="courses-single-item.php?id='.$rowData["C_ID"].'">المزيد</a>
            </div>
            <div class="course-name clear-fix">
								    <span class="price">'.$rowData["PRICE"].'</span>
            <h3>'.$rowData["C_NAME"].'</h3>
            </div>
            <div class="course-date bg-color-4 clear-fix">
							    	<div class="day"><i class="fa fa-calendar"></i>'.$rowData["DATE"].'</div><div class="time"><i class="fa fa-clock-o"></i>At '.$rowData["TIME"].'</div>
            <div class="divider"></div>
            <div class="description">'.$rowData["DISCRIPTION"].'</div>
            </div>
            </div>
            </div>';
									
        }else if($count == 2){
            print '<div class="grid-col grid-col-4">
            <div class="course-item">
            <div class="course-hover">
            <img src="courseImg/'.$rowData["C_IMG"].'" alt="">
            <div class="hover-bg bg-color-3"></div>
            <a href="courses-single-item.php?id='.$rowData["C_ID"].'">المزيد</a>
            </div>
            <div class="course-name clear-fix">
            <span class="price">'.$rowData["PRICE"].'</span>
            <h3>'.$rowData["C_NAME"].'</h3>
            </div>
            <div class="course-date bg-color-3 clear-fix">
            <div class="day"><i class="fa fa-calendar"></i>'.$rowData["DATE"].'</div><div class="time"><i class="fa fa-clock-o"></i>At '.$rowData["TIME"].'</div>
            <div class="divider"></div>
            <div class="description">'.$rowData["DISCRIPTION"].'</div>
            </div>
            </div>
            </div>';

        }else{
            print '<div class="grid-col-row">
            <div class="grid-col grid-col-4">
            <div class="course-item">
            <div class="course-hover">
            <img src="courseImg/'.$rowData["C_IMG"].'" alt="">
            <div class="hover-bg bg-color-6"></div>
            <a href="courses-single-item.php?id='.$rowData["C_ID"].'">المزيد</a>
            </div>
            <div class="course-name clear-fix">
            <span class="price">'.$rowData["PRICE"].'</span>
            <h3>'.$rowData["C_NAME"].'</h3>
            </div>
            <div class="course-date bg-color-6 clear-fix">
            <div class="day"><i class="fa fa-calendar"></i>'.$rowData["DATE"].'</div><div class="time"><i class="fa fa-clock-o"></i>At '.$rowData["TIME"].'</div>
            <div class="divider"></div>
            <div class="description">'.$rowData["DISCRIPTION"].'</div>
            </div>
            </div>
            </div>';
        }
        
    }
?>
</div>
				</section>

			</main>
			<!-- / main content -->
		</div>
	</div>

<?php
    include "footer.php";
    ?>
    