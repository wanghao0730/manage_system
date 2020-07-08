<?php
include './DB.php';
include './util.php';
//步骤一：接收数据
$username=$_POST['username'];
$content=$_POST['content'];
class GuestBook {
    public function __construct($username,$content)
    {
        $this->username = $username;
        $this->content = $content;
        $this->url ='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/guestbook.php';
    }
    public function validateName() {
        if (strlen($this->username) < 3) {
           alert('输入内容过少', $this->url);
            exit();
        }
    }
    public function insertGuest() {
        try{
            $sql = "insert into guestbook (username,content) values ('$this->username','$this->content') ";
            $db = new DB();
            $res = $db->exec($sql);
        }catch (Exception $e){
            alert('写入错误',$this->url);
        }
        alert('留言成功',$this->url);
    }
}

$guest = new GuestBook($username,$content);
$guest->validateName();
$guest->insertGuest();

?>