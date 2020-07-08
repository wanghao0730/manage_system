<?php
//! 此页面为检查登录
session_start();
include "../DB.php";
include "../util.php";
$user_name = $_POST['userName'];
$user_pwd = $_POST['passWord'];

// 启动session
class CheckLogin {
    public function __construct($username,$userpwd)
    {
        $this->username = $username;
        $this->userpwd = $userpwd;
    }
    public function validateName() {
        if (trim($this->username) === '') {
            alert('当前账户不能为空','./login.php');
            exit();
        }else if (strlen($this->userpwd) < 6) {
            alert('密码长度小于6位数','./login.php');
            exit();
        }
        //todo 调用查询
        $this->comparative();
    }
    public function comparative() {
        try{
            $db = new DB();
            $sql = "select * from user_msg where user_name='$this->username' and user_pwd='$this->userpwd'";
            $res = $db->get_results($sql);
            //todo 如果数据存在写入session
            if ($res) {
                $_SESSION['id'] = $res['user_id'];
                 $_SESSION['userName'] = $res['user_name'];
                $_SESSION['userPwd'] = $res['user_pwd'];
                //todo 写入cookie
                setcookie('userName', $res['user_name'], time() + (60 * 60 * 24));
                setcookie('userPwd', $res['user_pwd'], time() + (60 * 60 * 24));
                //todo 跳转页面
                header('Location:./index.php');
            }else {
                alert('登录失败','./login.php');
            }
        }catch (Exception $e) {
            throw $e;
        }
    }
}
$check = new CheckLogin($user_name,$user_pwd);
$check->validateName();
