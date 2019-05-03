<?php
include('injection.php');
include('jdf.php');
$email=$_POST['email'];
$email=check($email);
$pass=$_POST['password'];
$pass=check($pass);
$pass=md5($pass);
$tarikh=jdate('Y/n/j');
include('connect.php');
$sql="insert into tblozv (email,password,tarikh) values ('$email','$pass','$tarikh') ";
$stmt=$db->prepare($sql);
$stmt->execute();


?>