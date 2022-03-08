<?php
require_once 'mysql_connect.php';
session_start();
error_reporting( E_ERROR );
$name = $_POST[ 'name' ];
$password = $_POST[ 'password' ];
$user = $_POST[ 'user' ];
if ( !isset( $user ) ) {
	echo "<script> alert('请选择用户类型');</script>";
	echo "<script> history.go(-1);</script>";
}

$sql1 = "select * from admin where work_id ='$name' and pwd='$password' ";
$sql2 = "select * from users where user_id ='$name' and pwd='$password' ";
switch ( $user ) {
	case 1:
		$result = mysqli_query( $link, $sql1 )or die( '查询不到' );
		$row = mysqli_fetch_array( $result );
		$count = $row[ 0 ];
		if ( $count != "" ) {
			$url = "admin.php";
			//保存登录时的session信息
			$_SESSION[ 'ad_name' ] = $row[ 'ad_name' ];
			$_SESSION[ 'work_id' ] = $row[ 'work_id' ];
			$_SESSION[ 'pwd' ] = $row[ 'pwd' ];
			//将用户名存储在Cookie的username变量中
			setcookie( "pwd", $row[ "pwd" ], time() + 60 * 60 * 24 * 1 );
			echo "<script type='text/javascript'>" . "location.href='" . $url . "'" . "</script>";
		} else {
			echo "<script> alert('账户或密码错误');</script>";
			echo "<script> history.go(-1);</script>";
		}
		break;
	case 2:
		$result = mysqli_query( $link, $sql2 );
		$result = mysqli_query( $link, $sql2 )or die( '查询不到' );
		$row = mysqli_fetch_array( $result );
		$count = $row[ 0 ];
		if ( $count != "" ) {
			$url = "user.php";
			$_SESSION[ 'user_name' ] = $row[ 'user_name' ];
			$_SESSION[ 'user_id' ] = $row[ 'user_id' ];
			$_SESSION[ 'pwd' ] = $row[ 'pwd' ];
			setcookie( "pwd", $row["pwd"], time() + 60 * 60 * 24 * 1 );
			echo "<script type='text/javascript'>" . "location.href='" . $url . "'" . "</script>";
		} else {
			echo "<script> alert('账户或密码错误');</script>";
			echo "<script> history.go(-1);</script>";
		}
		break;
	default:
		break;

		mysqli_free_result( $result );
		mysqli_close( $link );
}
?>