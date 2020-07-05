<?php
	// 加载连接数据库
	include("../DB.php");
	$title = $_POST['title'];
	$cate_id = $_POST['cate_id'];
	$author = $_POST['author'];
	$content = $_POST['content'];
    $img = $_FILES['img'];

    if ($img['name']) {
        //! 得到文件扩展名
        $ext = strrchr($img['name'],'.');
        $filename =time().rand(100,999).$ext;
        move_uploaded_file($img['tmp_name'],'../files/'.$filename);//自动写入临时文件中,临时移动到指定目录
    }else {
        $filename = '';
    }

	//构造sql语句 将数据写入数据表,实现新增单页
	$sql = "insert into news(title,cate_id,author,content,img) values ('$title','$cate_id','$author','$content','$filename')";
	$db = new DB();
	$r = $db->exec($sql);

	if($r === 1){
        $url = $signup_url='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/news_list.php';
	    include ('../util.php');
	    alert('新增成功',$url);
	}
?>