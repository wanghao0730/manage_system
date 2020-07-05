<?php
class DB{
    public $pdo;
    public $statement;
    public function __construct(){              //连接数据库方法
        // $dbconnection = @mysqli_connect('localhost','root','root','web_two_db');
        // 设置PDO错误处理机制的选项，作为构造函数的第四个参数
        $driver_options = array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        try{
            $this->pdo  = new PDO('mysql:host=localhost;port=3306;dbname=web1','root','wanghao31', $driver_options);
        }catch(PDOException $p){
            echo '数据库连接出错，错误原因是：' , $p->getMessage();
            exit;
        }
//        echo '数据库连接成功','<br/>';
    }

    //发送查询语句给数据库,让数据库执行
    private function query($sql){              
        //这种处理错误的办法在PDO的错误处理方式是PDO::ERRMODE_EXCEPTION情况下可行
        try{
            $this->statement = $this->pdo->query($sql);  
        }catch(PDOException $e){
            echo '查询出错，错误原因是：',$this->pdo->errorInfo()[2],'<br/>';
            echo '查询出错，错误代号是：',$this->pdo->errorCode(),'<br/>';
            exit;
        }
    }

    //办法二：创建一个方法获取数据
    /*
        $only参数是一个标记，决定着返回的数据是一条还是多条
    */
    public function get_results($sql,$only = true,$fetch_style = PDO::FETCH_ASSOC){       
        $this->query($sql);        
        if($only){
            //从数据库执行结果获取一条数据
            return $this->statement->fetch($fetch_style);
        }else{
            //从数据库执行结果获取所有数据
            return $this->statement->fetchAll($fetch_style);
        }
    }


    //对数据库进行增、删、改操作的函数
    public function exec($sql){
        //这种处理错误的办法在PDO的错误处理方式是PDO::ERRMODE_EXCEPTION情况下可行
        try{
            //将结果返回
           return $r = $this->pdo->exec($sql);
        }catch(PDOException $p){
            echo '错误编码是：' . $this->pdo->errorCode(),'<br/>';
            echo '错误原因是：' . $this->pdo->errorInfo()[2], '<br/>';
            exit;
        }
//        echo '操作成功！','<br/>';
//        echo '受影响的行数是：' . $r . '行','<br/>';
    }
    //获取最后插入到数据库的记录的id
    public function lastInsertId(){
        return $this->pdo->lastInsertId();
    }
    //自定义方法弹出提示登录警告框
    public function alert($str, $url)
    {
        // 用.的方式拼接
        echo '<script>window.alert("' . $str . '");location.href="' . $url . '"</script>';
    }
}


