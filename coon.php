<?php
header('Content-Type:text/html;charset=utf-8');

$localhost = "127.0.0.1";
$root = "root";
$pwd = "wanghao31";
$coon = mysqli_connect($localhost, $root, $pwd,"web1");
mysqli_query($coon, "set names utf8");
if (!$coon) {
    die("数据库连接失败" . mysqli_error($coon));
}

