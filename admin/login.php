<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Document</title>
  <style>
    body {
      width: 100vw;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background-color: seagreen;
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
      background-color: gainsboro;
      border-radius: 30px;
    }

    #login form p input {
      outline: none;
      text-decoration: none;
    }

    #login form #submit {
      width: 80px;
      height: 26px;
      outline: none;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div id="login">
    <form action="./check_login.php" method="post">
      <p>
        <label for="">
          用户名：
        </label>
        <input type="text" name="userName" />
      </p>
      <p>
        <label for="">
          密&nbsp;&nbsp;&nbsp;&nbsp;码:
        </label>
        <input type="password" name="passWord" />
        <br />
      </p>
      <input type="submit" value="登录" id="submit" />
    </form>
  </div>
</body>

</html>