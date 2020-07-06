<?php
include ('../DB.php');
include ('../util.php');
$id = $_GET['id'];
$db = new DB();

//读取产品图片的文件名
$sql = "select * from products where id=$id";
$res=$db->get_results($sql);
$img = $res['img'];


$sql = "delete from products where  id=$id";

 $res = $db->exec($sql);
if($res === 1){
   if (strlen($img)>0) {
       unlink('../files/'.$img);
   }
    $url ='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/product_list.php';
    alert('数据删除成功',$url);
}