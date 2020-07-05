<?php
	// 加载连接数据库
	include("../DB.php");
    $username = $_POST['username'];
	$password = $_POST['password'];
	$flag = $_POST['flag'];

//	//构造sql语句 将数据写入数据表,实现新增单页
	$sql = "insert into user_msg(user_name,user_pwd,flag) values ('$username','$password','$flag')";
	$db = new DB();
	$r = $db->exec($sql);

	if($r === 1){
        $url = $signup_url='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/admin_list.php';
	    include ('../util.php');
	    alert('新增管理员成功',$url);
	}
?>