<?php
	// 加载连接数据库
	include("../DB.php");
	$productname = $_POST['productname'];
	$pro_no = $_POST['pro_no'];
	$cate_id = $_POST['cate_id'];
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
	$sql = "insert into products(productname,pro_no,cate_id,content,img) values ('$productname','$pro_no','$cate_id','$content','$img')";
	$db = new DB();
	$r = $db->exec($sql);

	if($r === 1){
        $url ='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/product_list.php';
	    include ('../util.php');
	    alert('新增成功',$url);
	}
?>