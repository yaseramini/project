<script>

$("#menu>ul>li").hover(function(){
	
	var x=$(this).find("ul").length;
	if(x>0){
	
	$("#zirmenu").slideDown(200);
	$(this).find("ul").slideDown(200);
	//$(this).find("ul").css('display','block');
	}else{$("#zirmenu").slideUp(200);	}
},function(){
	
	$(this).find("ul").css('display','none');
	

})

$("#menu").mouseleave(function(){
		$("#zirmenu").slideUp(200);	
})

</script>