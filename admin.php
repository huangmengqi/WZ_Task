<?php
//检查是否存在登录session，否则跳转登录界面
session_start();
require_once 'mysql_connect.php';
if ( !isset( $_SESSION[ 'work_id' ] ) ) {
	header( "Location:maskorder.php" );
	exit( '非法访问！' );
}
error_reporting( E_ERROR );
mysqli_query( $link, "set names 'utf8'" );
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!--link type="text/css" href="css/main.css" rel="stylesheet"-->
	<title>管理员</title>
	<link type="text/css" href="css/person.css" rel="stylesheet">
	<style type="text/css">
		#store {
			float: left;
			position: absolute;
			left: 700px;
			top: -200px;
		}
		
		.login1 {
			position: relative;
			top: 100px;
		}
	</style>
</head>

<body>
	<div id="page">
		<div id="out">

			<ul id="item">
				<li><a href="login_out.php">退出登录</a></li>
			</ul>
		</div>
		<h1 align="center">管理员登录界面</h1>
		<div class="login1">
			<form action="admin.php" method="post">
				<select name="item">
					<option selected>请选择查询条件</option>
					<option value="user_id">账号</option>
					<option value="user_name">姓名</option>
					<option value="ID">身份证号</option>
				</select>
				<input type="text" name="val">
				<button type="submit" class="btn btn-info">查询</button>
				<a href="reg_page.php">创建账号</a>
				<a href="import_user.php">批量导入用户</a>
				<a href="export_user.php">批量导出用户</a>
				<table class="table" border="1">
					<thead>
						<tr>
							<th>账号</th>
							<th>密码</th>
							<th>姓名</th>
							<th>身份证号</th>
							<th>注册时间</th>
							<th>修改</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$item = $_POST[ 'item' ];
						$val = $_POST[ 'val' ];

						if ( !$val ) {
							$sql = "select * from users order by date desc";
						} else {
							$sql = "select * from users where $item like '%$val%' order by date desc";
						}
						mysqli_query( $link, "set names 'utf8'" );
						$res = mysqli_query( $link, $sql );
						while ( $arr = mysqli_fetch_array( $res ) ) {
							echo "<tr>";
							echo "<td>" . $arr[ 'user_id' ] . "</td>";
							echo "<td>" . $arr[ 'pwd' ] . "</td>";
							echo "<td>" . $arr[ 'user_name' ] . "</td>";
							echo "<td>" . $arr[ 'ID' ] . "</td>";
							echo "<td>" . $arr[ 'date' ] . "</td>";
							echo "<td><a href='adm_up_user.php?user_id=" . $arr[ 'user_id' ] . "'>修改</a>/<a href='del_action.php?user_id=" . $arr[ 'user_id' ] . "'>删除</a></td>";
							echo "</tr>";
						}

						?>
					</tbody>
				</table>
			</form>
			

		</div>
	</div>
</body>
</html>