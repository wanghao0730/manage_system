<?php
include ('../DB.php');
$id = $_GET['id'];
$sql = "delete from user_msg where  user_id=$id";
$db = new DB();
 $res = $db->exec($sql);
if($res === 1){
    $url ='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/admin_list.php';
    include ('../util.php');
    alert('数据删除成功',$url);
}else {
    alert('删除失败','cate_list.php');
}