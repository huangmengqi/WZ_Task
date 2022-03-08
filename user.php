<?php
//检查是否存在登录session，否则跳转登录界面
session_start();
require_once 'mysql_connect.php';
if ( !isset( $_SESSION[ 'user_id' ] ) ) {
	header( "Location:maskorder.php" );
	exit( '非法访问！' );
}
error_reporting( E_ERROR );
mysqli_query( $link, "set names 'utf8'" );
$id = $_SESSION[ 'user_id' ];
$query = "select * from users where user_id='$id' ";
$result = mysqli_query( $link, $query );
$arr = mysqli_fetch_array( $result );

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>用户管理系统</title>
	<link rel="stylesheet" href="css/person.css" type="text/css">
	<style type="text/css">
		#res_form {
			/*表的宽度以及位置*/
			width: 500px;
			position: relative;
			left: 500px;
			top: 100px;
		}
		
		#a {
			/*调整input输入框与文字位置，显示同一行*/
			height: 50px;
			border: 1px;
			margin: 10px;
			text-align: left;
		}
		
		#a input {
			border: 1px solid #000000;
			/*按钮边缘*/
			border-radius: 5px;
			float: right;
		}
		
		#a select {
			border: 5px;
			width: 200px;
			border-color: #000000;
			border-radius: 5px;
			float: right;
		}
		
		#textarea {
			float: right;
			width: 200px;
		}
		
		#bt input {
			float: left;
			margin: 10px;
			width: 50px;
			background-color: #3CF;
			border-bottom-color: #000000;
			border-radius: 5px;
			position: relative;
			top: 20px;
			left: 100px;
		}
		
		#bt input:hover {
			background-color: #F00;
			color: #FFF;
			cursor: pointer;
		}
		
		#out {
			display: block;
			position: relative;
			left: 10px;
		}
		
		img {
			position: relative;
			float: right;
		}
		
		#we {
			position: relative;
			right: 100px;
		}
		
		h1 {
			position: absolute;
			float: left top;
			left: 660px;
		}
	</style>
</head>

<body>
	<div id="res">
		<ul id="item">
			<img src="images/2.png"></img>
			<div id="out">
				<div id="we">欢迎您&nbsp;&nbsp;
					<?php
					echo $id;
					?>&nbsp;,</div>
			<!--此处未改好样式-->
			<li><a href="login_out.php">退出登录</a>
			</li>
		</ul>
	</div>
	<h1>个人信息系统</h1>
	<div id="res_form">
		<h3>欢迎使用个人用户管理系统！</h3>
	</div>
	</div>
</body>
</html>