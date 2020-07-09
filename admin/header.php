<?php
//! 此页面为头部文件
// 加载判断用户是否登录
//! 如果if语句中的判断为false表示不存在登录
//! 会进入里面的if做判断是否存在设置了cookie
session_start();
include "../DB.php";
include "../util.php";
if (!isset($_SESSION['userName'])) {
    //! 判断是否设置了cookie
    if (isset($_COOKIE['userName']) && isset($_COOKIE['userPwd'])) {
        //todo 存在的话将cookie的值赋值给session
        $_SESSION['userName'] = $_COOKIE['userName'];
        $_SESSION['userPwd'] = $_COOKIE['userPwd'];
    }
}
//!  二次判断 这个用于判断是否存在session
// ! 如果上面判断不存在cookie 那么session就没有值 就结束后面代码运行
if (!isset($_SESSION['userName'])) {
    alert("请登录后再来吧.... ", "./login.php");
//!  结束后面代码运行
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>管理系统</title>
    <link rel="icon" href="./public/img/c.png">
  <link rel="stylesheet" href="./public/css/icon.css">
  <link rel="stylesheet" href="./public/css/main.css">

</head>

<body>
  <div class="warper">
    <div class="header">
			<span class="icon-menus"></span>
      <p class="title">
        网站后台管理系统
      </p>
      <div class="jump_index">
        <a href="">
          <i class="icon-home">
          </i>
          <span>系统首页</span>
        </a>
      </div>
      <div class="jump_loginOut">
        <a href="./login_out.php">
          <i class="icon-exit"></i>
          <span>退出登录</span>
        </a>
      </div>
    </div>
    <div class="nav">
      <div class="admin-msg">
        <h4>欢迎您来到管理后台</h4>
        <p>
          登录名：<strong>admin</strong>
          <br>
          <br>
          &nbsp;身&nbsp;份&nbsp;：<strong>超级管理员</strong>
        </p>
      </div>
      <!-- 下面导航信息 -->
      <div class="nav-list">
        <dl>
          <dt>
            <span class="icon-board">
              单页管理
            </span>
          </dt>
          <dd>
            <a href="./page_new.php">新增单页</a>
            <a href="./page_list.php">单页列表</a>
          </dd>
            <dt>
            <span class="icon-board">
             分类管理
            </span>
            </dt>
            <dd>
                <a href="./cate_new.php">新增分类</a>
                <a href="./cate_list.php">分类列表</a>
            </dd>
          <dt>
            <span class="icon-news">
              新闻管理
            </span>
          </dt>
          <dd>
            <a href="./news_new.php">发布新闻</a>
            <a href="./news_list.php">新闻列表</a>
            <a href="./cate_new.php">新闻类型</a>
          </dd>
          <dt>
            <span class="icon-pros">
              产品管理
            </span>
          </dt>
          <dd>
            <a href="product_new.php">新增产品</a>
            <a href="product_list.php">产品列表</a>
          </dd>
          <dt>
            <span class="icon-book">
              留言管理
            </span>
          </dt>
          <dd>
            <a href="guestbook_list.php">留言列表</a>
          </dd>
          <dt>
            <span class="icon-flink">
              友情连接管理
            </span>
          </dt>
          <dd>
            <a href="flink_new.php">新增链接</a>
            <a href="flink_list.php">链接列表</a>
          </dd>
          <dt>
            <span class="icon-admin">
              管理员登录
            </span>
          </dt>
          <dd>
            <a href="admin_new.php">新增管理员</a>
            <a href="admin_list.php">管理员列表</a>
          </dd>
        </dl>
      </div>
    </div>