<?php
$link = @mysqli_connect("localhost","root","password");
$link or die('数据库服务器连接失败！系统错误信息为：'.mysqli_connect_error());
mysqli_select_db($link, "wztask") 
or die('打开数据库失败！系统错误信息为：'.mysqli_error($link));
mysqli_query($link, "set names utf8");
?>