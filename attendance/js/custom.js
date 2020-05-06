var nav=responsiveNav(".nav-collapse",{animate:true,transition:284,label:"القائمة <i class='fa fa-bars' aria-hidden='true'></i>",insert:"before",customToggle:"",closeOnNavClick:false,openPos:"relative",navClass:"nav-collapse",navActiveClass:"js-nav-active",jsClass:"js",init:function(){},open:function(){},close:function(){}});$(document).ready(function(){$('.bxslider').bxSlider({auto:true,});});jQuery('.backtotop').click(function(){jQuery('html, body').animate({scrollTop:0},'slow');});jQuery('.backtotop2').click(function(){jQuery('html, body').animate({scrollTop:840},'slow');});
$(document).ready(function () {
    $('.menuhyper').on('click', function () {
        $(this).toggleClass('openmenuhyper');
    });
    $("#participate").hide();
	$("#confparticipatetype").change(function () {
		if(this.value == "مشارك"){
			$("#participate").show(800);
		}else{
			$("#participate").hide(800);
		}
	});
});