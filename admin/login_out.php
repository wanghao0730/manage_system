<?php
//todo   退出登录界面
//todo  当管理员在后台页面点击退出登录后
//todo  跳转此php清除session 以及cookie数据
include '../util.php';
session_start();
class LoginOut {
    public function destroySession() {
        $_SESSION = array(); //todo ! 清空数据
        session_destroy(); //!todo  清除session缓存文件
        //!todo  清除cookie数据
        setcookie('userName', '', time() - 3600);
        setcookie('userPwd', '', time() - 3600);
        //todo 成功清除后调用提示框
        $this->waring();
    }
    public function waring() {
        //! 调用封装在连接数据库表中的函数
        alert("退出成功", "./login.php");
    }
}
$out = new LoginOut();
$out->destroySession();

