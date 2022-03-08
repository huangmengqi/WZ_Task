<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/main.css">
<title>用户注册</title>
<script language="javascript">
function isEmpty(text)//判断字符串是否为空
{
	if(text=="")
		return true;
	else
		return false;
}
function isEqual(text1,text2)//判断两字符串是否相同
{	
	if(text1==text2)
		return true;
	else
		return false;
}
function check()
{
	var f=document.getElementById("form1");//获取表单对象
	if(isEmpty(f.name.value))//验证用户名是否为空
	{
		alert("用户名必须填写！！");
		f.name.focus();
		return false;
	}
	if(isEmpty(f.password1.value))//验证密码是否为空
	{
		alert("密码不能为空！！");
		f.password1.focus();
		return false;
	}
	if(isEmpty(f.password2.value))//验证重复密码是否为空
	{
		alert("重复密码不能为空！！");
		f.password2.focus();
		return false;
	}
	if(!isEqual(f.password1.value,f.password2.value))//验证两次密码是否相同
	{
		alert("密码与重复密码必须相同！！");
		f.password1.focus();
		return false;
	}
	return true;
}
</script>
</head>

<body>
<div class="main">
    <h2 align="center">用户注册</h2>
     <div id="page">
       <div class="login1">
		<form action="reg_action.php" id="form1" method="post" onSubmit="return check()">
			<input type="text" name="name" class="name" placeholder="账号" required>
			<input type="text" name="username" class="username" placeholder="姓名" required>
			<input type="text" name="ID" class="ID" placeholder="身份证号" required>
			<input type="password" name="password1" class="password" placeholder="密码" required>
            <input type="password" name="password2" class="password" placeholder="确认密码" required>
			<div class="clear"></div>
			<input type="submit" value="注册" >
		</form>
       </div>
     </div><!--reg_page--> 
</div>
</body>
</html>
