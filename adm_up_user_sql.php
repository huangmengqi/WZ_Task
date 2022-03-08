<?php
session_start();
require_once 'mysql_connect.php';
if (isset($_SESSION['work_id'])||isset($_SESSION['user_id'])) {

$id = $_POST['name'];
$pwd = $_POST['password'];
$up_pwd = "update users set pwd='$pwd' where user_id='$id'";
mysqli_query( $link,$up_pwd )or die( "修改信息失败" );
echo "<script type='text/javascript'>";
echo "alert('修改信息成功');";
echo "window.location.href='admin.php';";
echo "</script>";
}

else{
	header("Location:maskorder.php");
    exit('非法访问！');
}

mysqli_close( $link );
?>