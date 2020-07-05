<?php
//todo   退出登录界面
//todo  当管理员在后台页面点击退出登录后
//todo  跳转此php清除session 以及cookie数据

//! 加载数据库连接文件 
include("../coon.php");

//* 还是要启用session
session_start();

$_SESSION = array(); //! 清空数据
session_destroy(); //! 清除session缓存文件

//! 清除cookie数据 
setcookie('userName', '', time() - 3600);
setcookie('userPwd', '', time() - 3600);
// unset($_COOKIE['userName']);

//! 调用封装在连接数据库表中的函数 
alert("退出成功", "./login.php");
