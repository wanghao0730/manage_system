<?php
incluede('./conn.php');
//步骤一：接收数据
$username=$_POST['username'];
$content=$_POST['content'];

//验证数据有效性
if (strlen($username)<1) {
    echo '请输入昵称';
    exit;
}
if (strlen($content)<2) {
    echo '请输入留言的内容';
    exit;
}
//步骤三：实现数据处理功能
//构造SQL语句，使用 insert into 语句将接收到的用户留言数据插入到数据表中
$sql="insert into guestbook(username,content) values('$username','$content')";
$r=@mysqli_query($conn,$sql);


//步骤四：将结果显示出来
if ($r) {
   alert('留言成功！','guestbook.php');
}else{
    echo '留言失败！';
}

?>