<?php
	require_once 'mysql_connect.php';

	$name = $_POST['name'];
	$pwd=$_POST['password1'];
	$username=$_POST['username'];
	$ID=$_POST['ID'];
	
	$query="select * from users where user_id='" .$name ."'";
	$result=mysqli_query($link,$query) or die("用户查询失败:".mysqli_error());
	$num_row=mysqli_num_rows($result);
	$date=mysqli_query($link,"select now()");
	if($num_row!=0){
		echo "<script language='javascript'>";
		echo "alert('注册失败，用户已存在，请重新注册!');";
		echo "window.location.href='reg_page.php';";
  		echo "</script>";
	}
	else{
		//$qd= "update users set date ='" .now() ."' where user='" .$name ."'";
		$query="insert into users(user_id,pwd,user_name,ID,date) 
		value('" .$name ."','" .$pwd ."','" .$username ."','" .$ID."',now()" .")";
		$result = mysqli_query($link,$query) or die("插入记录失败：" .mysqli_error());
		echo "<script language='javascript'>";
		echo "alert('注册成功！');";
		echo "window.location.href='admin.php';";
		echo "</script>";
	}
	mysqli_free_result($result);
	mysqli_close($link);	
?>