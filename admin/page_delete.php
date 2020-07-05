<?php
$id = $_GET['id'];
include ('../DB.php');
include ('../util.php');
//引用db类
$db = new DB();

if (!is_numeric($id)) {
    alert('id值不是一个数字','page_list.php'); exit;
}
//sql语句
$sql = "delete from board where id=$id";
$r = $db ->exec($sql);

//等于1表示成功了
if ($r ===1) {
    $url = $signup_url='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/page_list.php';
    alert('数据删除成功',$url);
}