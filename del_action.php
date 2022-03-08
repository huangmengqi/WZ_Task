<?php
	require_once 'mysql_connect.php';

	$delete = $_GET[ 'user_id' ];
	$result = mysqli_query( $link, "delete from users where user_id='$delete'" )or die( "删除失败" );
	$num_row=mysqli_num_rows($result);
	// $date=mysqli_query($link,"select now()");
	if($num_row!=0){
		echo "<script language='javascript'>";
		echo "alert('删除失败，稍后重试！');";
		echo "window.location.href='admin.php';";
  		echo "</script>";
	}
	else{
		echo "<script language='javascript'>";
		echo "alert('删除成功！');";
		echo "window.location.href='admin.php';";
		echo "</script>";
	}
	mysqli_free_result($result);
	mysqli_close($link);	
?>