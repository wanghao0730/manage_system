<?php
include ('../DB.php');
include ('../util.php');
$id = $_GET['id'];
$db = new DB();

$sql = "delete from products where  id=$id";

 $res = $db->exec($sql);
if($res === 1){
    $url ='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/product_list.php';
    alert('数据删除成功',$url);
}