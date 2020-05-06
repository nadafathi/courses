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

function check_me(v, div, div2) {
    if (v == "YES") {
        $("#" + div).show();
        $("#" + div2).show();
    } else {
        $("#" + div).hide();
        $("#" + div2).hide();
    }
}

function add_more(v, div, more, top) {
    var x = $('#' + v).val()
    if (x < top) {
        var num = parseInt(x) + 1;
        $("#" + div + "" + num).show();
        $('#' + v).val(num)
    }
    if (x == parseInt(top) - 1) {
        $("#" + more).hide();
    }
}

function check_me2(v) {
    if (v == "1") {
        $("#c_country").hide();
        $("#all_city2").show();
        $("#status").hide();
    } else {
        $("#c_country").show();
        $("#all_city2").hide();
        $("#status").show();
    }
}

function check_me3(v) {
    if (v == "1") {
        $("#all_city3").show();
    } else {
        $("#all_city3").hide();
    }
}

function clr(chk, v) {
    if (chk == 'حتى الآن') {
        $("#" + v).hide();
    } else {
        $("#" + v).show();
    }
}

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
    _qfMsg = 'يرجى تصحيح الاخطاء التالية:' + _qfMsg;
    _qfMsg = _qfMsg + '\n ';
    alert(_qfMsg);
    return ;
    }
    $.ajax({
            url: "includes/functions.php",
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
                alert(data);
                if (data == 1) {
                   // frm.trigger('reset');
                    $('#'+frm.id).trigger('reset');
                     $("#reg_course").slideUp();
                    $('#results').html("<br /><br /><div class='alert alert-success'><font style='color:#339900' > تم تسجيل عضويتك بنجاح <br>    </font></div>");
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

    value = frm.elements['confname'].value;
    if (value == '' && !errFlag['confname']) {
    errFlag['confname'] = true;
    _qfMsg = _qfMsg + '\n -  اختر المؤتمر';
    }	
			
		
    if (_qfMsg != '') {
    _qfMsg = 'يرجى تصحيح الاخطاء التالية:' + _qfMsg;
    _qfMsg = _qfMsg + '\n ';
    alert(_qfMsg);
    return ;
    }
    $.ajax({
            url: "includes/functions.php",
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
                if (data == 1) {
                   // frm.trigger('reset');
                    $('#'+frm.id).trigger('reset');
                     $("#conf").slideUp();
                    $('#results').html("<br /><br /><div class='alert alert-success'><font style='color:#339900' > تم تسجيل عضويتك بالمؤتمر  بنجاح <br>    </font></div>");
                } else {
                    $('#results').html(data);
                }
            }
        });
}

function send_regEmp() {
    var emailfilter = /^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/
    if ($("#name_mep").val().length < 3) {
        alert("ادخل الاسم");
        $("#name_mep").focus();
    } else if (emailfilter.test($("#email_mep").val()) == false) {
        alert("ادخل البريد بشكل صحيح");
        $("#email_mep").focus();
    } else if ($("#pass_mep").val().length < 4) {
        alert(" كلمة المرور اقل من اربع حروف");
        $("#pass_mep").focus();
    } else if ($("#pass_mep").val() != $("#rpass_mep").val()) {
        alert("لايوجد تشابه بين كلمات المرور");
        $("#rpass_mep").focus();
    } else if ($("#country_mep").val() == '') {
        alert("اختر الدولة ");
        $("#country_mep").focus();
    } else if ($("#country_mep").val() == '1' && $("#city_mep").val() == "") {
        alert("ادخل المدينة");
        $("#city_mep").focus();
    } else if ($("#mobile_mep").val().length < 12) {
        alert("  ادخل رقم الجوال بالصيغة الدولية بدون ( 00 ) أو ( + )  مثال (966555555555) ");
        $("#mobile_mep").focus();
    } else if ($("#specialization_emp").val() == '') {
        alert("  ادخل  نشاط المنشأة   ");
        $("#specialization_emp").focus();
    } else if ($("#job_name").val() == '') {
        alert("ادخل حجم المنشأة ");
        $("#job_name").focus();
    } else if ($("#validate_img_mep").val() == "") {
        alert("ادخل كود التحقق");
        $("#validate_img_mep").focus();
    } else {
        $.ajax({
            url: "all_option.php",
            type: 'POST',
            data: new FormData(document.getElementById("form3")),
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
                if (data == 1) {
                    $('#form3').trigger('reset');
                    $('#form3').slideUp();
                    $('#results').html("<br /><br /><div class='alert alert-success'><font style='color:#339900' > تم تسجيل عضويتك بنجاح <br>    </font></div>");
                } else {
                    $('#results').html(data);
                }
            }
        });
    }
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
        if(num == ''){
            alert("يرجى تعبئة عدد أفراد المجموعة");
            return;
        }
        window.location.href = "group.php?num=" + num;
      }
