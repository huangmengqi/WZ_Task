<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/main.css">
<title>用户管理系统</title>
</head>

<body>
<div class="main">
    <h2 align="center">用户管理系统登录</h2>
     <div id="page">
       <div class="login1">
		<form action="login_check.php" method="post">
			<input type="text" name="name" class="name" placeholder="账号" required>
			<input type="password" name="password" class="password" placeholder="密码" required>
            <div class="wthree-text"> 
			<ul>
				<li><span><input type="radio" name="user" value="1" />管理员</span></li>
                <li><span><input type="radio" name="user" value="2" />用户</span></li>
			</ul>
            </div>
			<div class="clear"></div>
			<input type="submit" value="Login" ><!--onclick="check()"-->
		</form>
        <p><a href="reg_page.php">创建账号？</a></p>
       </div>
     </div><!--login_page--> 
</div>
</body>
</html>
