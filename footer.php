<div style="background: #710354;">
<div id="footer">
	<div>
		<h2>پربازدید ترین محصولات</h2>
		<ul>
		
		    <?php
		include('connect.php');
	$sql="select * from tblmahsool order by bazdid desc limit 5";
	$stmt=$db->prepare($sql);
	$stmt->execute();
	while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
	$id=$result['id'];
	$img=$result['img'];	
	$gheymat=$result['gheymat'];	
	$title=$result['title'];	
			
		echo '<li><img src="'.$img.'"><div><a>'.$title.'</a><p>'.$gheymat.' تومان</p></div></li>';
	}
		?>
		<!--
			<li><img src="img/product1.jpg"><div><a>محصول پربازدید1</a><p>23000 تومان</p></div></li>
			<li><img src="img/product2.jpg"><div><a>محصول پربازدید1</a><p>23000 تومان</p></div></li>
			<li><img src="img/product3.jpg"><div><a>محصول پربازدید1</a><p>23000 تومان</p></div></li>
			<li><img src="img/product4.jpg"><div><a>محصول پربازدید1</a><p>23000 تومان</p></div></li>
			<li><img src="img/product5.jpg"><div><a>محصول پربازدید1</a><p>23000 تومان</p></div></li>-->
		</ul>
	</div>
	<div>
		<h2>ارزانترین محصولات</h2>
		<ul>
		
				    <?php
		include('connect.php');
	$sql="select * from tblmahsool order by gheymat asc limit 5";
	$stmt=$db->prepare($sql);
	$stmt->execute();
	while($result=$stmt->fetch(PDO::FETCH_ASSOC)){
	$id=$result['id'];
	$img=$result['img'];	
	$gheymat=$result['gheymat'];	
	$title=$result['title'];	
			
		echo '<li><img src="'.$img.'"><div><a>'.$title.'</a><p>'.$gheymat.' تومان</p></div></li>';
	}
		?>
		
		
			<!--<li><img src="img/product1.jpg"><div><a>محصول پربازدید1</a><p>23000 تومان</p></div></li>
			<li><img src="img/product2.jpg"><div><a>محصول پربازدید1</a><p>23000 تومان</p></div></li>
			<li><img src="img/product3.jpg"><div><a>محصول پربازدید1</a><p>23000 تومان</p></div></li>
			<li><img src="img/product4.jpg"><div><a>محصول پربازدید1</a><p>23000 تومان</p></div></li>
			<li><img src="img/product5.jpg"><div><a>محصول پربازدید1</a><p>23000 تومان</p></div></li>-->
		</ul>		
	</div>
	<div>
		<h2>ارزان ترین محصولات</h2>
		
	</div>
	<div id="tamas">
		<h2>تماس با ما</h2>
		<div>
			<img src="img/address.png">
			<span>تهران خیابان جیحون تقاطع هاشمی کوچه اسدی مردی بن بست سعادت غربی  پلاک 10</span>
		</div>
		<div>
			<img src="img/phone.png">
			<span style="font-size: 20px;margin-top: 20px;">021-66848876</span>
			<span style="font-size: 20px;">09196289328</span>
		</div>
		<div>
			<img src="img/email.png">
			<span style="font-size: 17px;margin-top: 33px;">yaseramini.84@gmail.com</span>
		</div>
	</div>
</div> <!--footer-->
	</div>
<div id="copy">&copy; حق چاپ برای صاحب این اثر محفوظ است</div>