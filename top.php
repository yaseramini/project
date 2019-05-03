<div  style="width: 100%;height: 3px;background: #ff008d;"></div>
<div id="tarik" style="width: 100%;height: 100%; position: fixed;cursor: pointer;background: black;z-index: 15;opacity: 0;top: 0;display: none;"></div>
<div id="top">
<div id="login-reg">
	<a href="#" id="reg1">ورود / ثبت نام</a>
	
	<a id="basket" href="#" style="margin-right: 70px;">سبد خرید
	
		<img src="img/basket.png"  style="width: 30px;vertical-align: middle;">
		
		</a><span id="numkharid"></span>
		
	<div id="sabad" style="position: relative;display: none;opacity: 0;z-index: 20;top:-25px;">
		
		
			<div id="majmoo">
				<span>مبلغ کل خرید : <span id="gheymatkol"></span> تومان</span>
				<span><a>مشاهده سبد خرید</a></span>
			</div>
			<div id="sabad1">
			<img id="nomahsool" style="margin-right: 102px;margin-top: 13px;display: none;" src="img/empty-basket.png" >
			<span id="nomahsool2" style="text-align: center;margin-top: -12px;display: none;">محصولی در سبد موجود نیست</span>
			<ul>
			
			<?php
			
				if(isset($_COOKIE['mybasket'])){
					
				include('connect.php');
				$sql="select * from tblsabad where cookiename='".$_COOKIE['mybasket']."' ";
					$stmt=$db->prepare($sql);
					$stmt->execute();
					while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
					$tedad=$result['tedad'];
					//id=$result['id'];
					$idmahsool=$result['idmahsool'];	
			
						
					$sql2="select * from tblmahsool where id=".$idmahsool." ";
					$stmt2=$db->prepare($sql2);
					$stmt2->execute();	
						$result2=$stmt2->fetch(PDO::FETCH_ASSOC);
						$title=$result2['title'];
						$img=$result2['img'];
						$gheymat=$result2['gheymat'];
						
						echo '<li id='.$idmahsool.' style="margin-top: 0px;">
					<img src="'.$img.'">
					<span style="padding-top: 17px;">'.$title.'</span>
					<span>تعداد : <span id="tedad" style="display: initial;">'.$tedad.'</span></span>
					<span style="display: inline;">قیمت : <span id="gheymat" style="display: inline-flex;">'.$gheymat.'<span> تومان</span>
					<span id="delete" style="font-weight: bold;margin-right: 105px;display: initial;">حذف</span>
				</li>';
						
						
						
					}
				}
				
				
			//	else{
//					echo '<img id="nomahsool" style="margin-right: 102px;margin-top: 13px;" src="img/empty-basket.png">';
//					echo '<span id="nomahsool2" style="text-align: center;margin-top: -12px;">محصولی در سبد موجود نیست</span>';
//					
//				}
				
				
			?>	
			
			
		<!--	
				<li style="margin-top: 0;">
					<img src="img/813846.jpg">
					<span style="padding-top: 17px;">شلوار جین جذب زنانه - آبی</span>
					<span>تعداد : 2</span>
					<span>قیمت : 174000 تومان</span>
					<span style="font-weight: bold;text-align: left; margin-left: 16px;margin-top: -30px;">حذف</span>
				</li>
				
				<li>
					<img src="img/813846.jpg">
					<span style="padding-top: 17px;">شلوار جین جذب زنانه - آبی</span>
					<span>تعداد : 2</span>
					<span>قیمت : 174000 تومان</span>
					<span style="font-weight: bold;text-align: left; margin-left: 16px;margin-top: -30px;">حذف</span>
				</li>
				
					<li>
					<img src="img/813846.jpg">
					<span style="padding-top: 17px;">شلوار جین جذب زنانه - آبی</span>
					<span>تعداد : 2</span>
					<span>قیمت : 174000 تومان</span>
					<span style="font-weight: bold;text-align: left; margin-left: 16px;margin-top: -30px;">حذف</span>
				</li>
					<li>
					<img src="img/813846.jpg">
					<span style="padding-top: 17px;">شلوار جین جذب زنانه - آبی</span>
					<span>تعداد : 2</span>
					<span>قیمت : 174000 تومان</span>
					<span style="font-weight: bold;text-align: left; margin-left: 16px;margin-top: -30px;">حذف</span>
				</li>-->
				
				
			</ul>
			
		
		</div>
		<div id="sabt">ثبت خرید و ارسال</div>
	</div>	
	
	<div id="alert1" style="display: none;opacity: 0;">
		
		<div>
		<img id="exit" src="img/exit.png">
			<h4>محصول به سبد خرید شما اضافه شد</h4>
		</div>
		
		<div style="margin-top: 0;" id="test11">
			<img id="addmahsool" src="">
					<span id="addtitle"></span>
					
					<span id="addgheymat"><span></span> </span>
					<span id="tasviye">مشاهده سبد خرید</span>
		</div>
		
	</div> <!--alert1-->
	
	
		<div id="alert2" style="opacity: 0;">
			<h4>حذف محصول</h4>
			<span>محصول از سبد خرید حذف شد.</span>
		</div> <!--alert2-->
	
	
	
	
	<script>
	
		//$("#delete").click(function(){
//				$("#alert2").css('opacity','block);
//			})
		
	
$("#basket").click(function(){
	$("#sabad").show();
	$("#sabad").animate({opacity:1},500);
	$("#tarik").show();
	$("#tarik").animate({opacity:0.3},500);
	
})
$("#tarik").click(function(){
	//$("#alert1").animate({opacity:0},500);
	//$("#alert1").css('display','none');
	
	$("#alert1").animate({opacity:0},700,function(){$("#alert1").hide();});
	$("#alert2").animate({opacity:0},700,function(){$("#alert2").hide();});
	
	
	$("#tarik").animate({opacity:0},500);
	$("#tarik").hide(500);
	$("#sabad").animate({opacity:0},500);
	$("#sabad").hide(500);
	
	
	
	
	
	

})
		
	</script>
	
</div>
<div id="logo">
	<img src="img/logo.png">
</div>  <!--logo-->
<div id="search">

<input type="text" placeholder="جستجو کنید">
<img src="img/search.png">
</div>

</div>  <!--top-->
<div style="width: 100%;height: 2px;background:#ff00001f;margin-top: 3px;"></div>


<div id="top1">
	<div id="menu">
		<ul>
		
			<?php
			
			include('connect.php');
			$sql="select * from tblmenu";
			$stmt=$db->prepare($sql);
			$stmt->execute();
			
			while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
				$title=$result['title'];
				$id=$result['id'];
				
					$sql2="select * from tblzirmenu where parent='".$title."' ";
					$stmt2=$db->prepare($sql2);
					$stmt2->execute();	
					$num=$stmt2->rowCount();
					
				
				echo '<li>'.$title.'';
				
				if($num>0){echo '<ul>';}
				
				while($result2=$stmt2->fetch(PDO::FETCH_ASSOC)){
					
					$title2=$result2['title'];
					$id2=$result2['id'];
					
					$sql3="select * from tblzirmenu2 where parent='".$title2."' ";
					$stmt3=$db->prepare($sql3);
					$stmt3->execute();	
					
					
					
					echo '<li><h4>'.$title2.'</h4>';
					
					
					
					
					echo '<ul>';
					
					while($result3=$stmt3->fetch(PDO::FETCH_ASSOC)){
					$title3=$result3['title'];
					$id3=$result3['id'];
						
						echo '<li>'.$title3.'</li>';
						
					}
					
					echo '</ul>';
					echo '</li>';
					
				}
				
				
				if($num>0){echo '</ul>';}
				
				
				echo '</li>';
				
			}
		
			
			?>
		
			<!--<li>مردانه
			
			<ul>
				<li><h4>لباس مردانه</h4>
				
						<ul>
						<li>کاپشن , پالتو , بارانی</li>
						<li>ژاکت , پلیور</li>
						<li>سویشرت و هودی</li>
		            	<li>پیراهن</li>
		            	<li>کت و شلوار</li>
		            	<li>کت تک و جلیقه</li>
		            	<li>تیشرت و پولوشرت</li>
		            	<li>شلوار</li>
		            	<li>جین</li>
		            	<li>شلوارک</li>
			            </ul>
				
				</li>
				<li><h4>کیف مردانه</h4>
				
							<ul>
						<li>کیف دستی,دوشی,پاسپورتی</li>
						<li>کوله پشتی</li>
						<li>کیف و کوله ورزشی</li>
		           	     <li>کیف پول و کارت</li>
		           	     <li>کیف لب تاپ</li>
		           	     <li>کیف سفری و چمدان</li>
			            </ul>
				
				</li>
				<li><h4>اکسسوری مردانه</h4>
				
					<ul>
				<li>کمربند</li>
				<li>کلاه و کپ</li>
				<li>شال</li>
				<li>دستمال گردن و دستمال جیب</li>
				<li>دتستکش</li>
				<li>کراوات</li>
				<li>پاپیون</li>
					</ul>
					
				</li>
				<li><h4>کفش مردانه</h4>
				<ul>
					<li>بوت و نیم بوت</li>
					<li>رسمی</li>
					<li>روزمره</li>
					<li>ورزشی</li>
					<li>صندل و دمپایی</li>
				</ul>
				</li>
				
				<img id="product-img" src="img/slide2.jpg" style="width: 356px;height: 200px;margin-top:34px;">
			
			</ul>
			
			
			
			</li>
			<li>زنانه
				
							<ul>
				<li><h4>لباس مردانه</h4>
				
						<ul>
						<li>کاپشن , پالتو , بارانی</li>
						<li>ژاکت , پلیور</li>
						<li>سویشرت و هودی</li>
		            	<li>پیراهن</li>
		            	<li>کت و شلوار</li>
		            	<li>کت تک و جلیقه</li>
		            	<li>تیشرت و پولوشرت</li>
		            	<li>شلوار</li>
		            	<li>جین</li>
		            	<li>شلوارک</li>
			            </ul>
				
				</li>
				<li><h4>کیف مردانه</h4>
				
							<ul>
						<li>کیف دستی,دوشی,پاسپورتی</li>
						<li>کوله پشتی</li>
						<li>کیف و کوله ورزشی</li>
		           	     <li>کیف پول و کارت</li>
		           	     <li>کیف لب تاپ</li>
		           	     <li>کیف سفری و چمدان</li>
			            </ul>
				
				</li>
				<li><h4>اکسسوری مردانه</h4>
				
					<ul>
				<li>کمربند</li>
				<li>کلاه و کپ</li>
				<li>شال</li>
				<li>دستمال گردن و دستمال جیب</li>
				<li>دتستکش</li>
				<li>کراوات</li>
				<li>پاپیون</li>
					</ul>
					
				</li>
				<li><h4>کفش مردانه</h4>
				<ul>
					<li>بوت و نیم بوت</li>
					<li>رسمی</li>
					<li>روزمره</li>
					<li>ورزشی</li>
					<li>صندل و دمپایی</li>
				</ul>
				</li>
				
				<img id="product-img2" src="img/slide1.jpg" style="width: 356px;height: 200px;margin-top:34px;">
			
			</ul>

		
			
			</li>
			<li>بچه گانه </li>
			<li>ورزشی </li>
			<li>زیبایی و سلامت </li>-->
	<!--<img id="product-img" src="img/slide2.jpg" style="width: 356px;height: 200px;margin-top:34px;">-->

		</ul>
	</div> <!--menu-->
	
	<div id="zirmenu" style="width: 100%;height: 300px;background:rgba(113, 3, 84, 0.82);;position: absolute;display: none;z-index: 15;"></div>
	
</div> <!--top1-->

<?php

include('form1.php');

?>


