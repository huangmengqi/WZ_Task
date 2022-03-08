<?php 
//启动会话
session_start();
if ($_SESSION["pwd"] =="")
{
   echo "<script language='javascript'>alert('您还没有登录！');
   window.document.location.href='wztask.php';</script>";
}
//设置cookie
setcookie("pwd","",time()-60*60*24*1);
session_unset(); //删除会话
//remove the session itself
session_destroy();
//回到登录界面
echo "<script> alert('注销成功');</script>";
echo "<script type='text/javascript'>" . "location.href='" . "wztask.php" ."'" ."</script>";
//header("Location: maskorder.php");
?>