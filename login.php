<?php

$emailv=$_POST['emailv'];
$emailv=addslashes($emailv);
$passv=$_POST['passwordv'];
$passv=md5($passv);
include('connect.php');
$sql="select * from tblozv where email='".$emailv."' and password='".$passv."' ";
$stmt=$db->prepare($sql);
$stmt->execute();
$num=$stmt->rowCount();
echo $num;
if($num==1){header('location:panel.php');}
else{header('location:login.php');}


?>