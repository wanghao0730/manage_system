<?php
	// 加载连接数据库
	include("../DB.php");
	include ('../util.php');
	$id = $_POST['id'];
	$username = $_POST['username'];
   $userpwd = $_POST['userpwd'];
    $flag = $_POST['flag'];


//	//构造sql语句 将数据写入数据表,实现新增单页
	$sql = "update user_msg set user_name='$username', user_pwd='$userpwd',flag='$flag'  where user_id=$id";
	$db = new DB();
	$r = $db->exec($sql);
//
	if($r === 1){
        $url ='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/admin_list.php';
	    alert('修改管理员成功',$url);
	}else {
        $url ='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/admin_list.php';
        alert('修改管理员失败',$url);
    }
?>