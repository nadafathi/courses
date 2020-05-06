function tt(file_name, id) {
    $("div#" + id).empty().html('<img src="images/loading.gif" />');
    $("#" + id).load(file_name);
}

function get_data(file_name, div) {
    $("#" + div).empty().html('<img src="images/loading.gif" />');
    $("#" + div).load(file_name);
}
window.onload = function() {
    get_data('img.php', 'mo3');
}

function add_data(div, id, x) {
    $("#" + div).show();
    $("#" + div).html(" <img src='images/loading-small.gif'  height='20'> ");
    $("#" + div).load("chose_city.php?id=" + id + "&do=" + x);
}



var urlpost = window.location.host ;
var subfolder = "attendance";
var terms = false;
function send_reg(frm) {
    var value = '';
    var errFlag = new Array();
    var _qfGroups = {};
     _qfMsg = '';
  
    value = frm.elements['arabicname'].value;
    if (value == '' && !errFlag['arabicname']) {
    errFlag['arabicname'] = true;
    _qfMsg = _qfMsg + '\n -  تعبئة الاسم باللغة العربية';
    }


    value = frm.elements['engname'].value;
    if (value == '' && !errFlag['engname']) {
    errFlag['engname'] = true;
    _qfMsg = _qfMsg + '\n -  تعبئة الاسم باللغة الانجليزية';
    }

    value = frm.elements['location'].value;
    if (value == '' && !errFlag['location']) {
    errFlag['location'] = true;
    _qfMsg = _qfMsg + '\n -  اختر مقر الدورة';
    }

    value = frm.elements['nationalid'].value;
    if (value == '' && !errFlag['nationalid']) {
    errFlag['nationalid'] = true;
    _qfMsg = _qfMsg + '\n - تعبئة السجل المدني او رقم الاقامة';
    }

    /*value = frm.elements['studentlevel'].value;
    if (value == '' && !errFlag['studentlevel']) {
    errFlag['studentlevel'] = true;
    _qfMsg = _qfMsg + '\n -  اختر المرحلة الدراسية';
    }*/

                value = frm.elements['workname'].value;
    if (value == '' && !errFlag['workname']) {
    errFlag['workname'] = true;
    _qfMsg = _qfMsg + '\n - تعبئة جهة العمل';
    }

    value = frm.elements['email'].value;
    if (value == '' && !errFlag['email']) {
    errFlag['email'] = true;
    _qfMsg = _qfMsg + '\n - تعبئة الايميل';
    }
			
    if(!validateEmail(value) && value != ''){
        errFlag['email'] = true;
        _qfMsg = _qfMsg + '\n - يرجى كتابة الايميل بالشكل الصحيح';
    }

    value = frm.elements['mobilenum'].value;
    if (value == '' && !errFlag['mobilenum']) {
    errFlag['mobilenum'] = true;
    _qfMsg = _qfMsg + '\n - تعبئة رقم الهاتف';
    }


    if (value != '' && !isNumber(value)) {
        errFlag['mobilenum'] = true;
        _qfMsg = _qfMsg + '\n - يجب ان يكون رقم الهاتف مكون من أرقام فقط';
    }
			
    value = frm.elements['mobilenum'].value;
    if (value.length != 10 && value != '' && isNumber(value)) {
            errFlag['mobilenum'] = true;
            _qfMsg = _qfMsg + '\n - يجب أن يحتوي رقم الهاتف على 10 ارقام';
    }

    value = frm.elements['coursename'].value;
    if (value == '' && !errFlag['coursename']) {
    errFlag['coursename'] = true;
    _qfMsg = _qfMsg + '\n -  اختر الدورة التدريبية';
    }	
			
		
    if (_qfMsg != '') {
    _qfMsg = 'يرجى تعبئة الحقول على النحو التالي:' + _qfMsg;
    _qfMsg = _qfMsg + '\n ';
    alert(_qfMsg);
    return ;
    }
	if(terms){
		if(!document.getElementById('checkterm').checked) 
		 {
		alert('يرجى الموافقة على الشروط والأحكام'); 
		document.getElementById('checkterm').focus()
		return;
		 }
	 }
	var numofselectedcourses = $('#coursename').val().length ; 
    $.ajax({
            url: "http://"+urlpost+"/"+subfolder+"/includes/functions.php",
            type: 'POST',
            data: new FormData(frm),
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            beforeSend: function() {
                $("#results").html('<div align="center"><br/><br/><img src="images/loading-small.gif"></div>');
            },
            success: function(data) {
                $('html,body').animate({
                    scrollTop: '460px'
                }, 800);
                if (data > 0) {
                   // frm.trigger('reset');
                    $('#'+frm.id).trigger('reset');
                     $("#reg_course").slideUp();
                    msg =  $('#userID').val() == 0 ? 'تم تسجيل عضويتك بنجاح' : 'تم تعديل بيانات العضو بنجاح';
                    $('#results').html("<br /><br /><div class='alert alert-success'><font style='color:#339900' >"+msg+"<br></font></div>");
                     
                     if($('#userID').val() > 0 && $('#ptype').val() == 'pa'){
                         location.href='users.php';
                     }else if($('#userID').val() == 0 && $('#ptype').val() == 'pu'){
					if(numofselectedcourses == 1 )	
                          location.href='success.php?type=course&uid='+data;
	 		else if(numofselectedcourses > 1 )
			   location.href='success.php?type=courses&uid='+data;
		      }
                   
                } else {
                    $('#results').html(data);
                }
            }
        });
}


function send_conf(frm) {
 var value = '';
    var errFlag = new Array();
    var _qfGroups = {};
     _qfMsg = '';
   
    value = frm.elements['arabicname'].value;
    if (value == '' && !errFlag['arabicname']) {
    errFlag['arabicname'] = true;
    _qfMsg = _qfMsg + '\n -  تعبئة الاسم باللغة العربية';
    }


    value = frm.elements['engname'].value;
    if (value == '' && !errFlag['engname']) {
    errFlag['engname'] = true;
    _qfMsg = _qfMsg + '\n -  تعبئة الاسم باللغة الانجليزية';
    }

    

    value = frm.elements['nationalid'].value;
    if (value == '' && !errFlag['nationalid']) {
    errFlag['nationalid'] = true;
    _qfMsg = _qfMsg + '\n - تعبئة اسم عنوان البحث بالكامل';
    }
	
	value = frm.elements['mobilenum'].value;
    if (value == '' && !errFlag['mobilenum']) {
    errFlag['mobilenum'] = true;
    _qfMsg = _qfMsg + '\n - تعبئة رقم الهاتف';
    }


    if (value != '' && !isNumber(value)) {
        errFlag['mobilenum'] = true;
        _qfMsg = _qfMsg + '\n - يجب ان يكون رقم الهاتف مكون من أرقام فقط';
    }
			
    value = frm.elements['mobilenum'].value;
    if (value.length != 10 && value != '' && isNumber(value)) {
            errFlag['mobilenum'] = true;
            _qfMsg = _qfMsg + '\n - يجب أن يحتوي رقم الهاتف على 10 ارقام';
    }
	value = frm.elements['email'].value;
    if (value == '' && !errFlag['email']) {
    errFlag['email'] = true;
    _qfMsg = _qfMsg + '\n - تعبئة الايميل';
    }
			
    if(!validateEmail(value) && value != ''){
        errFlag['email'] = true;
        _qfMsg = _qfMsg + '\n - يرجى كتابة الايميل بالشكل الصحيح';
    }
	
    value = frm.elements['workname'].value;
    if (value == '' && !errFlag['workname']) {
    errFlag['workname'] = true;
    _qfMsg = _qfMsg + '\n - اختر التخصص';
    }
	
    value = frm.elements['confname'].value;
    if (value == '' && !errFlag['confname']) {
    errFlag['confname'] = true;
    _qfMsg = _qfMsg + '\n -  اختر المؤتمر';
    }
    
    value = frm.elements['confparticipatetype'].value;
    if (value == '' && !errFlag['confparticipatetype']) {
    errFlag['confparticipatetype'] = true;
    _qfMsg = _qfMsg + '\n -  اختر نوع الحضور';
    }
	
	
	if(frm.elements['confparticipatetype'].value == "مشارك"){
		value = frm.elements['postertitle'].value;
		if (value == '' && !errFlag['postertitle']) {
		errFlag['postertitle'] = true;
		_qfMsg = _qfMsg + '\n -  يرجى كتابة عنوان البوستر';
		}
		
		value = frm.elements['postersummery'].value;
		if (value == '' && !errFlag['postersummery']) {
		errFlag['postersummery'] = true;
		_qfMsg = _qfMsg + '\n -  يرجى كتابة ملخص البوستر';
		}
		if($('#posterfile')[0].files[0] == null  && frm.elements['postertxtfile'].value == "")
		{	
			_qfMsg = _qfMsg + '\n -  الرجاء تحميل البوستر';	
		}
		if($('#posterfile')[0].files[0] != null )
		{
			var filename = $('#posterfile')[0].files[0].name;
			var size = $('#posterfile')[0].files[0].size ; 
			var filetype = $('#posterfile')[0].files[0].type ;
			var fileex = filename.split('.').pop();
			fileex = fileex.toLowerCase();
			size = size / 1048576;
			if(size > 2){
				_qfMsg = _qfMsg + '\n -  يجب ان يكون الملف أقل من 2 MB';	
			}
			if(fileex != "png" && fileex != "jpg" && fileex != "jpeg"){
				_qfMsg = _qfMsg + '\n -  يجب أن يكون الملف من نوع png او jpg او jpeg';	
			}
		}
	}
	
    if (_qfMsg != '') {
    _qfMsg = 'جى تعبئة الحقول على النحو التالي:' + _qfMsg;
    _qfMsg = _qfMsg + '\n ';
    alert(_qfMsg);
    return ;
    }
	
	if(terms){
		if(!document.getElementById('checkterm2').checked) 
		 {
		alert('يرجى الموافقة على الشروط والأحكام'); 
		document.getElementById('checkterm2').focus()
		return;
		 }
	 }
	
    $.ajax({
            url: "http://"+urlpost+"/"+subfolder+"/includes/functions.php",
            type: 'POST',
            data: new FormData(frm),
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            beforeSend: function() {
                $("#results").html('<div align="center"><br/><br/><img src="images/loading-small.gif"></div>');
            },
            success: function(data) {
                $('html,body').animate({
                    scrollTop: '460px'
                }, 800);
               // alert(data);
                if (data > 0) {
                   // frm.trigger('reset');
                    $('#'+frm.id).trigger('reset');
                     $("#conf").slideUp();
                     
                     
                   msg =  $('#userID').val() == 0 ? 'تم تسجيل عضويتك بنجاح' : 'تم تعديل بيانات العضو بنجاح';
                    if($('#userID').val() > 0 && $('#ptype').val() == 'pa'){
                         location.href='usersconf.php';
                     }else if($('#userID').val() == 0 && $('#ptype').val() == 'pu'){
                          location.href='success.php?type=conf&uid='+data;
                     }
                     
                    $('#results').html("<br /><br /><div class='alert alert-success'><font style='color:#339900' >"+msg+"<br></font></div>");

                } else {
                    $('#results').html(data);
                }
            }
        });
}



function AcceptDigits(objtextbox) {
    var exp = /[^\d]/g;
    document.getElementById("mobile").value = document.getElementById("mobile").value.replace(exp, '');
    document.getElementById("mobile_mep").value = document.getElementById("mobile_mep").value.replace(exp, '');
}

function get_regcourse() {
    $('html,body').animate({
        scrollTop: '760px'
    }, 800);
    $("#conf").hide();
    $("#group").hide();
    $("#reg_course").slideToggle('slow');
}

function get_conf() {
    $('html,body').animate({
        scrollTop: '760px'
    }, 800);
    $("#reg_course").hide();
    $("#group").hide();
    $("#conf").slideToggle('slow');
}

function get_group() {
    $('html,body').animate({
        scrollTop: '760px'
    }, 800);
    $("#reg_course").hide();
    $("#conf").hide();
    $("#group").slideToggle('slow');
}

function get_reg() {
    $('html,body').animate({
        scrollTop: '730px'
    }, 800);
    $("#reg_course").hide();
    $("#mo2").load("img.php");
    $("#reg_emb").slideToggle('slow');
}

	
function validateEmail(email) {
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(String(email).toLowerCase());
}

function isNumber(n) {
	return !isNaN(parseFloat(n)) && isFinite(n);
}


function goToGroups(){
	  
        var num = $('#numofusers').val();
		var course = $('#grpcoursename').val();
        if(num == ''){
            alert("يرجى ادخال عدد أعضاء المجموعة لاستكمال عملية التسجيل");
            return;
        }
		if(course == ''){
            alert("يرجى اختيار الدورة لاستكمال عملية التسجيل");
            return;
        }
		
        window.location.href = "group.php?num=" + num+"&course=" +course;
}
	  
function GetFilename(url)
{
   if (url)
   {
      var m = url.toString().match(/.*\/(.+?)\./);
      if (m && m.length > 1)
      {
         return m[1];
      }
   }
   return "";
}

function checkforms_reg(frm){
	var value = '';
    var errFlag = new Array();
    var _qfGroups = {};
     _qfMsg = '';
   
    value = frm.elements['arabicname'].value;
    if (value == '' && !errFlag['arabicname']) {
    errFlag['arabicname'] = true;
    _qfMsg = _qfMsg + '\n -  تعبئة الاسم باللغة العربية';
    }


    value = frm.elements['engname'].value;
    if (value == '' && !errFlag['engname']) {
    errFlag['engname'] = true;
    _qfMsg = _qfMsg + '\n -  تعبئة الاسم باللغة الانجليزية';
    }

    value = frm.elements['location'].value;
    if (value == '' && !errFlag['location']) {
    errFlag['location'] = true;
    _qfMsg = _qfMsg + '\n -  اختر مقر الدورة';
    }

    value = frm.elements['nationalid'].value;
    if (value == '' && !errFlag['nationalid']) {
    errFlag['nationalid'] = true;
    _qfMsg = _qfMsg + '\n - تعبئة السجل المدني او رقم الاقامة';
    }

    value = frm.elements['studentlevel'].value;
    if (value == '' && !errFlag['studentlevel']) {
    errFlag['studentlevel'] = true;
    _qfMsg = _qfMsg + '\n -  اختر المرحلة الدراسية';
    }

                value = frm.elements['workname'].value;
    if (value == '' && !errFlag['workname']) {
    errFlag['workname'] = true;
    _qfMsg = _qfMsg + '\n - تعبئة جهة العمل';
    }

    value = frm.elements['email'].value;
    if (value == '' && !errFlag['email']) {
    errFlag['email'] = true;
    _qfMsg = _qfMsg + '\n - تعبئة الايميل';
    }
			
    if(!validateEmail(value) && value != ''){
        errFlag['email'] = true;
        _qfMsg = _qfMsg + '\n - يرجى كتابة الايميل بالشكل الصحيح';
    }

    value = frm.elements['mobilenum'].value;
    if (value == '' && !errFlag['mobilenum']) {
    errFlag['mobilenum'] = true;
    _qfMsg = _qfMsg + '\n - تعبئة رقم الهاتف';
    }


    if (value != '' && !isNumber(value)) {
        errFlag['mobilenum'] = true;
        _qfMsg = _qfMsg + '\n - يجب ان يكون رقم الهاتف مكون من أرقام فقط';
    }
			
    value = frm.elements['mobilenum'].value;
    if (value.length != 10 && value != '' && isNumber(value)) {
            errFlag['mobilenum'] = true;
            _qfMsg = _qfMsg + '\n - يجب أن يحتوي رقم الهاتف على 10 ارقام';
    }

    value = frm.elements['coursename'].value;
    if (value == '' && !errFlag['coursename']) {
    errFlag['coursename'] = true;
    _qfMsg = _qfMsg + '\n -  اختر الدورة التدريبية';
    }	
			
		
    if (_qfMsg != '') {
		alert('يرجى تعبئة جميع الحقول لاكمال عملية التسجيل');
		return false;
    }
		 
	return true;

}

function saveform(frm,frmnum){
	$.ajax({
            url: "http://"+urlpost+"/"+subfolder+"/includes/functions.php",
            type: 'POST',
            data: new FormData(frm),
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            beforeSend: function() {
                $("#results").html('<div align="center"><br/><br/><img src="images/loading-small.gif"></div>');
            },
            success: function(data) {
                $('html,body').animate({
                    scrollTop: '460px'
                }, 800);
                if (data > 0) {
                   // frm.trigger('reset');
                    $('#'+frm.id).trigger('reset');
                    $('#'+frm.id).slideUp();
                    $('#results'+frmnum).html("<br /><br /><div class='alert alert-success'><font style='color:#339900' > تم تسجيل عضوية المنتسب بالدورة  بنجاح <br>    </font></div>");
					return true;
				} else {
                    $('#results'+frmnum).html(data);
					return false;
                }
            }
    });
}
