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