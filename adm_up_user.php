<?php
session_start();
require_once 'mysql_connect.php';
if (isset($_SESSION['work_id'])) {
    $id = $_GET['user_id'];
	$useinfo=mysqli_query($link,"select * from users where user_id='$id'");
	$userarr = mysqli_fetch_array($useinfo);
	error_reporting(E_ERROR);
}
elseif(isset($_SESSION['user_id'])){
	$id = $_SESSION['user_id'];
	$useinfo=mysqli_query($link,"select * from users where user_id='$id'");
	$userarr = mysqli_fetch_array($useinfo);
	error_reporting(E_ERROR);
}
else{
	header("Location:maskorder.php");
    exit('非法访问！');
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/main.css">
<title>修改用户信息</title>
<body>
<div class="main">
    <h2 align="center">修改用户信息</h2>
     <div id="page">
       <div class="login1">
		<form action="adm_up_user_sql.php" id="form1" method="post">
			<input type="text" name="name" class="name" placeholder="用户ID" value="<?php echo $userarr['user_id'];?>" required>
			<input type="text" name="username" class="username" placeholder="用户名" value="<?php echo $userarr['user_name'];?>" required>
			<input type="text" name="ID" class="ID" placeholder="身份证号" value="<?php echo $userarr['ID'];?>" required>
			<input type="password" name="password" class="password" placeholder="密码" required>
			<div class="clear"></div>
			<input type="submit" value="修改" >
		</form>
       </div>
     </div>
</div>
</body>
</html>
