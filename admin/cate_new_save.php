<?php
	// 加载连接数据库
	include("../DB.php");
    $catename = $_POST['catename'];
	$module = $_POST['module'];
	$orderno = $_POST['orderno'];

//	//构造sql语句 将数据写入数据表,实现新增单页
	$sql = "insert into category(catename,module,orderno) values ('$catename','$module',$orderno)";
	$db = new DB();
	$r = $db->exec($sql);

	if($r === 1){
        $url = $signup_url='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/cate_list.php';
	    include ('../util.php');
	    alert('新增成功',$url);
	}
?>