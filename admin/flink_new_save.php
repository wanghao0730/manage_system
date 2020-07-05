<?php
	// 加载连接数据库
	include("../DB.php");
    $title = $_POST['title'];
	$link_url = $_POST['link_url'];
	$content = $_POST['content'];

//	//构造sql语句 将数据写入数据表,实现新增单页
	$sql = "insert into flink(title,link_url,content) values ('$title','$link_url','$content')";
	$db = new DB();
	$r = $db->exec($sql);

	if($r === 1){
        $url = $signup_url='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/flink_list.php';
	    include ('../util.php');
	    alert('新增成功',$url);
	}
?>