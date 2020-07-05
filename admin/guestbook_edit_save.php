<?php
	// 加载连接数据库
	include("../DB.php");
	include ('../util.php');
	$id = $_POST['id'];
   $name = $_POST['name'];
    $content = $_POST['content'];


//	//构造sql语句 将数据写入数据表,实现新增单页
	$sql = "update guestbook set username='$name', content='$content'  where id=$id";
	$db = new DB();
	$r = $db->exec($sql);
//
	if($r === 1){
        $url ='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/guestbook_list.php';
	    alert('修改成功',$url);
	}else {
        $url ='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/guestbook_list.php';
        alert('修改失败',$url);
    }
?>