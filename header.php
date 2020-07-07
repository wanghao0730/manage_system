<?php
    include './DB.php'
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="./skin/index.css"/>
    <script type="text/javascript" src="./skin/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="./skin/jquery.jslides.js"></script>
    <script type="text/javascript" src="./skin/user_index.js"></script>
</head>
<body>
<div id="header_bg">
    <div id="header">
        <h1><a href="/">成都XXXXX科技有限公司</a></h1>
        <div class="dianhua">24小时咨询热线<span>028-88888888</span></div>
    </div>
</div>
<div id="menu">
    <ul>
        <li><a href="./index.php" class="on">首　页</a></li>
        <li><a href="about.php?id=20">公司简介</a></li>
        <li><a href="news.php">新闻中心</a></li>
        <li>
            <div id="menu3" class="menuchild" onmouseover="showmenu(3);" onmouseout="hidemenu(3);">
                <?php
                //构造读取产品分类的SQL语句
                $sql="select id,catename from category where module='产品中心' order by orderno asc,id asc ";
                $db = new DB();
                $res = $db->get_results($sql,false);
                for($item=0;$item<count($res);$item++){
                    echo '<a href="product.php?cate_id=1='.$res[$item]['id'].'">'.$res[$item]['catename'].'</a>';
                }
                ?>
            </div>
            <a href="product.php" onmouseover="showmenu(3);" onmouseout="hidemenu(3);">产品展示</a>
        </li>
        <li><a href="guestbook.php">来宾留言</a></li>
        <li><a href="about.php?id=21">企业文化</a></li>
        <li class="menu_end"><a href="about.php?id=22">联系我们</a></li>
    </ul>
</div>
<div id="banner">
    <div id="full-screen-slider">
        <ul id="slides">
            <li style="background:url('images/b1.jpg') no-repeat center top;background-size:100%;"></li>
            <li style="background:url('images/b2.jpg') no-repeat center top;background-size:100%;"></li>
            <li style="background:url('images/b3.jpg') no-repeat center top;background-size:100%;"></li>
        </ul>
    </div>
</div>

<div class="notice_bg">
    <div class="notice">
        <div class="share_btns">
            <!-- Baidu Button BEGIN -->
            <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
                <span class="bds_more">分享到：</span>
                <a class="bds_qzone"></a>
                <a class="bds_tsina"></a>
                <a class="bds_tqq"></a>
                <a class="bds_renren"></a>
                <a class="shareCount"></a>
            </div>
            <script type="text/javascript" id="bdshare_js" data="type=tools" ></script>
            <script type="text/javascript" id="bdshell_js"></script>
            <script type="text/javascript">
                document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?t=" + new Date().getHours();
            </script>
            <!-- Baidu Button END -->
        </div>
        <b>最新公告:</b>
        <ul>
            <?php
            //从新闻表中读取分类ID是9的所有数据，取最后发表的那一条，作为最新公告显示在这里
            $sql="select *from news where cate_id=9 order by id desc limit 1";
            $db = new DB();
            $res = $db->get_results($sql,false);

            for($item=0;$item<count($res);$item++){
                echo '<li>';
                echo '<span>'.$res[$item]['intime'].'</span>';
                echo '<a target="_blank" href="content.php?id='.$res[$item]['id'].'" title="'.$res[$item]['title'].'">'.$res[$item]['title'].'</a>';
                echo '</li>';
            }
            ?>
        </ul>
        <div class="c"></div>
    </div>
</div>

