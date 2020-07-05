<?php
	// 加载连接数据库
	include("../DB.php");
	
	$moduleName = trim($_POST['module_name']);
	$content = trim($_POST['content']);
	
	if(strlen($moduleName) < 1){
		alert('请输入单页模块名','./page_new.php');exit;
	}
	
	//构造sql语句 将数据写入数据表,实现新增单页
	$sql = "insert into board(content,module_name) values ('$content','$moduleName')";
	$db = new DB();
	$r = $db->exec($sql);

	if($r === 1){
        $url = $signup_url='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/page_new.php';
	    include ('../util.php');
	    alert('新增成功',$url);
	}
?>