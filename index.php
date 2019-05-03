<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>فروشگاه اینترنتی لوازم آرایشی بهداشتی</title>

<link rel="stylesheet" href="css/style.css">

<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery.jcarousellite.js"></script>


<script src="js/jquery.cycle.all.js"></script>



</head>

<body>
<?php
	include('top.php');
?>	

<div id="undermenu">
<div id="next1"><img src="img/next.png"></div> <!--next-->
<div id="prev1"><img src="img/prev.png"></div> <!--prev-->
	<div id="slideshow">
	<?php
	include('connect.php');
	
	$sql="select * from tblslide";
	$stmt=$db->prepare($sql);
	$stmt->execute();
	while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
	$id=$result['id'];
	$img=$result['img'];
	
	echo '<a><img src="'.$img.'"></a>';	
		
	}
		
		
	?>	
	
	
	
	<!--<a><img src="img/slide1.jpg"></a>
	<a><img src="img/slide2.jpg"></a>
	<a><img src="img/slide3.jpg"></a>
	<a><img src="img/slide4.jpg"></a>
	<a><img src="img/slide5.jpg"></a>-->

	</div> <!--slideshow-->
	
<script>
	
$("#slideshow").cycle({
	fx:'fade',
	timeout:1000,
	next:'#next1',
	prev:'#prev1',
	
})
	
</script>	
	
</div>   <!--undermenu-->

<div id="baner">
	<div><a><img src="img/baner1.jpg"></a>
		<div>مردانه</div>
	</div>
	<div style="margin: 0 100px;"><a><img src="img/baner2.jpg"></a>
		<div>زنانه</div>
	</div>
	<div><a><img src="img/baner3.jpg"></a>
		<div>پچه گانه</div>
	</div>
</div> <!--baner-->


<h2 id="head1">محصولات پر فروش</h2>
<div style="width: 100%; height: auto;position: relative;margin-bottom: 50px;">
<img id="next2" src="img/next.png">
<img id="prev2" src="img/prev.png">
	
	<div class="carousel" style="width: 1400px;height: 100%;margin: 0 auto;">
		
		<ul>
	
	<?php
		include('connect.php');
	$sql="select * from tblmahsool order by foroosh desc limit 10";
	$stmt=$db->prepare($sql);
	$stmt->execute();
	while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
	$id=$result['id'];
	$img=$result['img'];	
	$title=$result['title'];	
	$gheymat=$result['gheymat'];	
	$foroosh=$result['foroosh'];	
		
		echo '<li>
			<img id="ax" src="'.$img.'"><p><span>'.$foroosh.'</span> فروش</p>
			<h4><span id="title">'.$title.'</span></h4><span><span><span id="gheymat">'.$gheymat.'</span></span> تومان</span><img id='.$id.' class="addsabad" src="img/add-to-cart.png"></li>';
		
	}
		
		?>	
		
		
		<!--
			<li>
			<img src="img/product1.jpg">
			<p><span>2</span> فروش</p>
			<h4>ادکلن</h4><span>34000 تومان</span></li>
			<li><img src="img/product2.jpg"><h4>ادکلن</h4><span>34000 تومان</span></li>
			<li><img src="img/product3.jpg"><h4>ادکلن</h4><span>34000 تومان</span></li>
			<li><img src="img/product4.jpg"><h4>ادکلن</h4><span>34000 تومان</span></li>
			<li><img src="img/product5.jpg"><h4>ادکلن</h4><span>34000 تومان</span></li>
			<li><img src="img/product6.jpg"><h4>ادکلن</h4><span><span>34000</span> تومان</span><img id="addsabad" src="img/add-to-cart.png"></li>-->
		</ul>
		
	</div>

	</div>

<script>
	var id=0;
	
	function empty(){
		
		var num=$("#sabad li").length;
		if(num==0){
			
			$("#nomahsool").show();
			$("#nomahsool2").show();
			$("#sabt").hide();
			$("#majmoo").hide();
			$("#sabad1").css('top','0');
			$("#sabad1").css('overflow-y','hidden');
		}else{
			$("#nomahsool").hide();
			$("#nomahsool2").hide();
			$("#sabt").show();
			$("#majmoo").show();
			$("#sabad1").css('top','50px');
			$("#sabad1").css('overflow-y','scroll');
		}
		
	}
	empty();
	
	
	function tedadkol(){
		var number=0;
		$("#sabad1 ul #tedad").each(function(index,element){
			
			number=number+parseInt($(this).html());
		})
		$("#numkharid").html(number);
	}
	
	tedadkol();
	
	
	
	function gheymatkol(){
		
		var number2=0;
		var price=0;
		var totalprice=0;
		$("#sabad ul li").each(function(index,element){
			
			number2=$(this).find("#tedad").html();
			price=$(this).find("#gheymat").html();
			totalprice=totalprice+(parseInt(number2)*parseInt(price));
			
			
				
		})
	$("#gheymatkol").html(totalprice);
		
	}
	
	gheymatkol();
	
	
	function deletesabad(){
	$("#sabad1 #delete").click(function(){
		
		id=$(this).parents('li').attr('id');

		$.ajax({
			
			url:'delete.php',
			type:'POST',
			data:{id:id}
		})
		.done(function(){
			$("#sabad1 ul #"+id+" ").remove();
			
			tedadkol();
			gheymatkol();
			empty();
			
			$("#alert2").animate({opacity:1},700,function(){$("#alert2").show();});
			
			
			
			
			
			
			
			
		})
			
		
			
	})
	

	}
	deletesabad();
	
	
	
$(".addsabad").click(function(){
	
	var ax='';
	var title='';
	var gheymat='';
	var li=$(this).parents('li');
	var ax=li.find("#ax").attr('src');
	var title=li.find("#title").html();
	var gheymat=li.find("#gheymat").html();
	
	
	
   id=$(this).attr('id');
	
	$.ajax({
		type:'post',
		url:"sabad.php",
		data:{idmahsool:id}
		
	})
	.done(function(){
		var length='';
		length=$("#sabad #"+id+" ").length;
		
		if(length==1){
			
			var tedad=$("#sabad #"+id+" #tedad ").html();
			tedad=parseInt(tedad);
			tedad=tedad+1;
			$("#sabad #"+id+" #tedad ").html(tedad);
			
		}else{
			
			$("#sabad1 ul").append('<li id='+id+' style="margin-top: 0;"><img src="'+ax+'"><span style="padding-top: 17px;">'+title+'</span><span>تعداد : <span id="tedad" style="display: initial;">1</span></span><span style="display: inline;">قیمت : <span style="display: inherit;"  id="gheymat">'+gheymat+'</span> تومان</span><span id="delete" style="font-weight: bold;margin-right: 105px;display: initial;">حذف</span></li>');
			$("#nomahsool").css('display','none');
			$("#nomahsool2").css('display','none');
			
		}
		
		deletesabad();
		tedadkol();
		gheymatkol();
		empty();
		
		//$("#addtitle").html(title);
		//$("#addgheymat span").html(gheymat);
		
		//document.getElementById("addmahsool").src = img1;
		//$("#addmahsool src").append(ax);
		
		$("#test11").append('<div style="margin-top: 0;" id="test11"><img id="addmahsool" src="'+ax+'"><span id="addtitle">'+title+'</span><span id="addgheymat">قیمت : <span>'+gheymat+'</span> تومان</span><span id="tasviye">مشاهده سبد خرید</span></div>');
	
		
		
		$("#alert1").css('display','block');
		$("#alert1").animate({opacity:1},300);
		$("#tarik").css('display','block');
		$("#tarik").animate({opacity:0.3},300);
		
		$("#exit").click(function(){
			$("#tarik").animate({opacity:0},500);
			$("#tarik").hide(500);
			$("#alert1").animate({opacity:0},500);
			$("#alert1").animate({display:none},500);
			
		})	
		
	})
	
})
	
	
</script>	

<div id="baner2"><a><img src="img/baner.jpg"></a></div>
<h2 id="head1">برترین برند ها</h2>

<div style="width: 100%; height: auto;position: relative;margin-bottom: 50px;">
<img id="next3" src="img/next.png" style="top: 60px;">
<img id="prev3" src="img/prev.png" style="top: 60px;left: 35px;">
	
	<div class="carousel" id="carousel2" style="width: 1400px;height: 100%;margin: 0 auto;">
	
	<ul>
	    
	    <?php
		include('connect.php');
	$sql="select * from tblbrand limit 10";
	$stmt=$db->prepare($sql);
	$stmt->execute();
	while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
	$id=$result['id'];
	$img=$result['img'];	
			
		echo '<li><img src="'.$img.'"></li>';
	}
		?>
	    
	    
		   <!-- <li><img src="img/brand1.jpg"></li>
			<li><img src="img/brand2.jpg"></li>
			<li><img src="img/brand3.jpg"></li>
			<li><img src="img/brand4.jpg"></li>
			<li><img src="img/brand4.jpg"></li>
			<li><img src="img/brand4.jpg"></li>-->
	</ul>
	
	</div>
	</div>

	<script>
	
	$(".carousel").jCarouselLite({
		
		  btnNext: "#next2",
		  btnPrev: "#prev2",
	
		 // auto:2000,
		speed:1000,
		visible:6,
		scroll:3,
		
		
	})

		
	</script>

<div id="tahvil">
	<h3 style="text-align: center;color: #888;font-weight: normal;font-size: 23px;">با خیال راحت از فروشگاه ما خرید کنید</h3>
	<div>
		<img src="img/7days.png">
		<h3>بازگشت کالا</h3>
		<p>اگر کالا برای شما مناسب نبود تا هفت روز میتوانید با یک تماس آن را تعویض کنید</p>
	</div>
	<div style="margin: 0 50px;">
		<img src="img/freeDelivery.png">
		<h3>تحویل سریع و ارزان</h3>
		<p>سفارشهای بیش از ۱۰۰ هزار تومان در تهران و بیش از ۲۰۰ هزار تومان در شهرستان را رایگان تحویل بگیرید.
</p>
	</div>
	<div>
		<img src="img/original.png">
		<h3>کالای اورجینال</h3>
		<p>
دیجی استایل نماینده رسمی برندهاست، با اطمینان از اورجینال بودن کالا خرید کنید</p>
	</div>
</div>

<?php
	
include('footer.php');
	
?>	

<?php
	include('script.php');	
?>
</body>
</html>