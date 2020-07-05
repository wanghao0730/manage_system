<?php
//! 此页面为检查登录
include ("../coon.php");
// 启动session

$user_name = $_POST['userName'];
$user_pwd = $_POST['passWord'];

// echo $user_name . $user_pwd;
if (trim($user_name) === '') {
    echo "当前账户不能为空";
    exit;
} else if (strlen($user_pwd) < 6) {
    echo "密码长度小于6位数";
    exit;
}

$sql = "select * from user_msg where user_name='$user_name' and user_pwd='$user_pwd'";
//选择查找的数据库mysqli_select_db()传入连接coon和数据库名
mysqli_select_db($coon, "web1");
$res = mysqli_query($coon, $sql);

if (!$res) {
    die("不存在数据" . mysqli_error($coon));
}
//? 从结果集读取数据，返回关联数组，以数据库中的字段名为数组的键名
if ($row = mysqli_fetch_assoc($res)) {

    //! 如果能够在结果集中提取数据，则表示提供的用户名和密码正确，则登录成功
    session_start();

    //! 将用户名和密码存入session中去
    $_SESSION['id'] = $row['id'];
    $_SESSION['userName'] = $row['user_name'];
    $_SESSION['userPwd'] = $row['user_pwd'];

    //!  存入cookie 
    //! 设置cookie名称 从$row数组中把值赋值给userName 设置cookie的有效时间
    //! 密码同理
    setcookie('userName', $row['user_name'], time() + (60 * 60 * 24));
    setcookie('userPwd', $row['user_pwd'], time() + (60 * 60 * 24));

    //* index页面
    header('Location:./index.php');
} else {
    echo "登录失败";
}
