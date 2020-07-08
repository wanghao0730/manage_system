<?php

include "./header.php";

$id=$_GET['id'];
//构造SQL语句，去数据库news数据表中查询这个ID的数据
$sql="select *from news where id=$id";
$rs = $db->get_results($sql);
?>
		<div class="inbody">
			<?php
			include "./left.php";
			?>
			
	<div class="inright">
		<h3 class="intitle"><span>您所在的位置：<a href="/">首页</a> &gt; <a href="#">新闻中心</a> &gt; 阅读内容</span>阅读内容</h3>
		<div class="mbody">
			<h1 class="title1"><?php echo $rs['title'];?></h1>
			<div class="title2">来源：本站　　　发布日期：<?php echo $rs['intime'];?>　　　已有 <?php echo $rs['hits'];?> 人浏览过此信息</div>
			<div class="newsbody">
				<p><?php echo $rs['content'];?></p>
			</div>
			<div class="newsauthor">编辑：<?php echo $rs['author'];?></div>
			<div class="newsmore">上一条：
			  <?php
			  $sql="select id,title from news where id<$id order by intime desc limit 5";
              $res = $db->get_results($sql,false);

             for ($item=0;$item<count($res);$item++) {
                 echo '<a href="content.php?id='.$res[$item]['id'].'">'.$res[$item]['title'].'</a></div>';
             }

			  ?>
			</div>
			<div class="newsmore">下一条：
			  <?php
			  $sql="select id,title from news where id > $id order by intime asc limit 1";
              $res = $db->get_results($sql,false);

              for ($item=0;$item<count($res);$item++) {
                  echo '<a href="content.php?id='.$res[$item]['id'].'">'.$res[$item]['title'].'</a></div>';
              }
              ?>
			 </div>
		</div>
	</div>
</div>
<?php
include './footer.php';
?>