<style>
#tabb{
	width: 500px;
    height: 400px;
		position: absolute;
		top: 18%;
		right: 0;
		left: 0px;
		margin: 0 auto;
		background: #fff;
	z-index: 17;
	display: none;
	opacity: 0;
	
	}
.tab {
    overflow: hidden;
    background-color: #fff;
}
.tab button {
	background-color: #fff;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 7px 0px;
    transition: 0.3s;
    font-size: 17px;
    width: 248px;
	color: dimgray;
}

.tab button:hover {
    //background-color: #ddd;
}

.tab button.active {
    background-color: #fff;
    border-bottom: 2px solid deeppink;
	color: deeppink;
}
.tabcontent {
    display: none;
    padding: 6px 0px;
    border-top: none;
}	
	
	
	#tab01,#tab02{
		color: dimgray;
	}
	#tab01>span, #tab02>span{
	width: 190px;
    display: inline-block;
	}
	#tab01>span, #tab02>span{
	    margin-top: 22px;
    margin-right: 20px;	
	}
	#tab01 input, #tab02 input{
	    width: 264px;
		border: 1px solid #ccc;
	}
	
	#tab01 #check, #tab02 #check2{
	    width: initial;
    margin-top: 45px;
    margin-right: 20px;
	}
	#submit1, #submit2{
	width: 180px !important;
    float: left;
    margin-left: 21px;
    margin-top: 20px;
    background: deeppink;
    border: none;
    color: #fff;
    border-radius: 3px;
    height: 39px;
    font-size: 16px;
    line-height: 37px;	
	cursor: pointer;
	}
	#google-btn, #google-btn2{
	  margin-top: -33px !important;
    float: left;
    text-align: center;
    border: 1px solid #bbb;
    margin-left: 20px;
    width: 180px !important;
	    height: 39px;
    line-height: 39px;	
	}
	#google-btn img, #google-btn2 img{
	    width: 37px;
    vertical-align: middle;
    padding-right: 3px;	
	}
	#tab02 a{
	padding: 0;
    margin: 0;
    margin-top: 14px;
    display: block;
    margin-bottom: -25px;
    margin-right: 20px;	
	}
	#error,#error2,#errorv,#error2v{
    position: absolute;
    right: 212px;
    top: 53px;
    color: #fe2627;
    font-size: 11px;	
	}
	.input-error{border: 1px solid #fe2627 !important;}

</style>


<div id="tabb">
<div class="tab">
  <button id="defaultOpen" class="tablinks" onclick="openCity(event, 'tab01')">ثبت نام در سایت</button>
  <button class="tablinks" onclick="openCity(event, 'tab02')">ورود به سایت</button>
</div>


 <form action="register.php" method="POST" onSubmit="return sabtenam1();">
<div id="tab01" class="tabcontent">
 <span id="email">شماره موبایل یا آدرس ایمیل : </span><input name="email" type="text"><div id="error"></div>
 <span id="pass">کلمه عبور : </span><input type="password" name="password"><br><div id="error2" style="top: 167px;"></div>
 <input id="check" type="checkbox"><span style="width: 342px;margin-right: 3px;">با شرایط و قوانین استفاده و حریم خصوصی سایت موافقم.</span>
 
 <input type="submit" id="submit1" value="ثبت نام در سایت">
</form>

	
 <span style="margin-top: 90px;text-align: left;">با حساب گوگل وارد شوید</span>
 <span id="google-btn">ورود با گوگل<img src="img/google-btn.png"></span>
</div>



 <form action="login.php" method="POST" onSubmit="return login1();">
<!--<div id="tab02" class="tabcontent">

 <span  id="email">شماره موبایل یا آدرس ایمیل : </span><input type="text" name="email"><div id="error"></div><br>
 
 <span  id="pass2">کلمه عبور : </span><input type="password"><br>
 <a href="#">رمز عبور خود را فراموش کرده اید؟</a>
 <input id="check2" type="checkbox"><span style="width: 342px;margin-right: 3px;">مرا به خاطر بسپار</span>
 
 <input type="button" id="submit2" value="ورود به سایت">-->
 <div id="tab02" class="tabcontent">
 <span id="email">شماره موبایل یا آدرس ایمیل : </span><input name="emailv" type="text"><div id="errorv"></div>
 <span id="pass">کلمه عبور : </span><input type="password" name="passwordv"><br><div id="error2v" style="top: 167px;"></div><a href="#">رمز عبور خود را فراموش کرده اید؟</a>
 <input id="check2" type="checkbox"><span style="width: 342px;margin-right: 3px;">مرا به خاطر بسپار</span>
 
 <input type="submit" id="submit1" value="ثبت نام در سایت">
 
 
 </form>
 <span style="margin-top: 90px;text-align: left;">با حساب گوگل وارد شوید</span>
 <span id="google-btn2">ورود با گوگل<img src="img/google-btn.png"></span>
</div>

	</div>  <!--tabb-->


	
<script>
	
	$("#reg1").click(function(){
		$("#tabb").animate({opacity:1},400);
		$("#tabb").css('display','block');
		
		$("#tarik").css('display','block');
		$("#tarik").css('opacity',.3);
	})
	$("#tarik").click(function(){
		$("#tabb").animate({opacity:0},400);
		$("#tabb").css('display','none');
	})
	
	
	function sabtenam1(){
	
	var error=0;

	var email=$("input[name=email]").val();

	var pass=$("input[name=password]").val();
		var len=pass.length;
		
		
	if(email==''){$("#error").html("پست الکترونیک یا شماره موبایل وارد نشده است");$("input[name=email]").addClass('input-error');error=1;}else{$("#error").html("");$("input[name=email]").removeClass('input-error');}
		
    if(pass==''){$("#error2").html("کلمه عبور وارد نشده است");$("input[name=password]").addClass('input-error'); error=1;} 
	if(len<6){$("#error2").html("کلمه عبور باید حداقل 6 کاراکتر باشد");$("input[name=password]").addClass('input-error'); error=1;}else{$("#error2").html("");$("input[name=password]").removeClass('input-error');}
		
	var regexp=/^[a-z0-9_\.-]+@{1}[a-z0-9_\.-]+\.[a-z]{2,4}$/i;	

	
	if(regexp.test(email)==false){error=1; $("#error").html("پست الکترونیک یا شماره موبایل به درستی وارد نشده است");$("input[name=email]").addClass('input-error'); error=1;}	
		
		


	if(error==0){
	$.ajax({
		
		url:'checkemail.php',
		type:'POST',
		async:false,
		data:{email:email}
	})
	.done(function(msg){
		
if(msg==1){error=1; $("#error").html("پست الکترونیک قبلا در پایگاه داده موجود می باشد");$("input[name=email]").addClass('input-error');}
		
	})
		
	
		

		
}
			if(error==1){return false;}	
	
	}
	
	function login1(){
	
	var error=0;

	var emailv=$("input[name=emailv]").val();

	var passv=$("input[name=passwordv]").val();
		var len=passv.length;
		
		
	if(emailv==''){$("#errorv").html("پست الکترونیک یا شماره موبایل وارد نشده است");$("input[name=emailv]").addClass('input-error');error=1;}else{$("#errorv").html("");$("input[name=emailv]").removeClass('input-error');}
		
    if(passv==''){$("#error2v").html("کلمه عبور وارد نشده است");$("input[name=passwordv]").addClass('input-error'); error=1;} 
	if(len<6){$("#error2v").html("کلمه عبور باید حداقل 6 کاراکتر باشد");$("input[name=passwordv]").addClass('input-error'); error=1;}else{$("#error2v").html("");$("input[name=passwordv]").removeClass('input-error');}
		
	var regexpv=/^[a-z0-9_\.-]+@{1}[a-z0-9_\.-]+\.[a-z]{2,4}$/i;	

	
	if(regexpv.test(emailv)==false){error=1; $("#errorv").html("پست الکترونیک یا شماره موبایل به درستی وارد نشده است");$("input[name=emailv]").addClass('input-error'); error=1;}	
		
		


//	if(error==0){
//	$.ajax({
//		
//		url:'login.php',
//		type:'POST',
//		async:false,
//		data:{emailv:emailv}
//	})
//	.done(function(msg){
//		
//if(msg==1){error=1; $("#errorv").html("پست الکترونیک قبلا در پایگاه داده موجود می باشد");$("input[name=emailv]").addClass('input-error');}
//		
//	})
//		
//	
//		
//
//		
//}
			if(error==1){return false;}	
	
	}
	
	
 

	

</script>


<script>

	
	
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
	document.getElementById("defaultOpen").click();
</script>
     


