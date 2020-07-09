<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" href="./public/img/c.png">
  <title>登录</title>
  <style>
    body {
      width: 100vw;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
        background: url('./public/img/nmwx9k.jpg') no-repeat;
        background-size: 100% 100%;
    }

    #login {
      width: 300px;
      height: 300px;
    }

    #login form {
      height: 230px;
      display: flex;
      flex-direction: column;
      justify-content: space-evenly;
      align-items: center;
      /*background-color: #000000;*/
      /*  background: transparent;*/
        background: rgba(0,0,0,.8);
         box-sizing:border-box;
       box-shadow: 0px 15px 25px rgba(0,0,0,.5);
      border-radius: 30px;
    }
    #login form p label {
        color: white;
        font-size: 18px;
        margin-right: 10px;
    }
    #login form p input {
      outline: none;
      text-decoration: none;
        border-radius: 5px;
        background: #3b4249;
        color: whitesmoke;
        padding: 3px;
    }

    #login form #submit {
      width: 80px;
      height: 26px;
      outline: none;
      cursor: pointer;
        background: #3b4249;
        color: whitesmoke;
        border: none;
    }
  </style>
</head>

<body>
  <div id="login">
    <form action="./check_login.php" method="post">
      <p>
        <label for="name">
          用户名：
        </label>
        <input type="text" name="userName" id="name" />
      </p>
      <p>
        <label for="pwd">
          密&nbsp;&nbsp;&nbsp;&nbsp;码:
        </label>
        <input type="password" name="passWord" id="pwd"/>
        <br />
      </p>
      <input type="submit" value="登录" id="submit" />
    </form>
  </div>
</body>

</html>