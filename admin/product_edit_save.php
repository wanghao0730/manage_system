<?php
	// 加载连接数据库
	include("../DB.php");
	include ('../util.php');
	$id = $_POST['id'];
	$productname = $_POST['productname'];
   $pro_no = $_POST['pro_no'];
   $cate_id = $_POST['cate_id'];
    $content = $_POST['content'];
//    $img = $_FILES['img'];

//if ($img['name']) {
//    //! 得到文件扩展名
//    $ext = strrchr($img['name'],'.');
//    $filename =time().rand(100,999).$ext;
//    move_uploaded_file($img['tmp_name'],'../files/'.$filename);//自动写入临时文件中,临时移动到指定目录
//}else {
//    $filename =$_POST['old_img'];
//}
//	//构造sql语句 将数据写入数据表,实现新增单页
    $sql = "update products set productname='$productname',pro_no='$pro_no',cate_id='$cate_id',content='$content' where id=$id";
	$db = new DB();
	$r = $db->exec($sql);
//
	if($r === 1){
        $url ='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/product_list.php';
	    alert('修改成功',$url);
	}else {
        $url ='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/product_list.php';
        alert('修改失败',$url);
    }
?>