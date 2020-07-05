<?php
	// 加载连接数据库
	include("../DB.php");
	include ('../util.php');
	$id = $_POST['id'];
    $moduleName = trim($_POST['module_name']);
    $content = trim($_POST['content']);

	if(strlen($moduleName) < 1){
		alert("请输入单页模块名','./page_edit.php?id='.$id.'");exit;
	}
//
//	//构造sql语句 将数据写入数据表,实现新增单页
	$sql = "update board set module_name='$moduleName',content='$content' where id=$id";
	$db = new DB();
	$r = $db->exec($sql);
//
	if($r === 1){
        $url ='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/page_list.php';
	    alert('修改成功',$url);
	}else {
        $url ='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/page_list.php';
        alert('修改失败',$url);
    }
?>