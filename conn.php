<?php
    date_default_timezone_set('PRC');//设置默认时区
    header('Content-Type:text/html;charset=utf-8');

    $conn=mysqli_connect('localhost','root','123456','web1');
    mysqli_query($conn,'set names utf8');


    if (!$conn) {
        die('数据库连接出错！');
    }

    //弹出提示框，然后跳转到指定的URL
    function alert($str,$url){
        echo '<script>window.alert("'.$str.'");location.href="'.$url.'"</script>';
    }
?>