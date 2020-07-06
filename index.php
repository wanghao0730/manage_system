<?php
include './header.php';
$db = new DB();
?>

<div class="main1">
	<div class="m1_left">
		<h3 class="ltitle">
			<span><a href="product.php"><img src="images/more.jpg" alt="更多"/></a></span>
			<strong class="on"><a href="product.php">最新产品</a></strong>
		</h3>
		<div  class="m1_body c">

<div id='demo'>
	<table cellpadding='0' cellspacing='0'>
		<tr>
			<td id='demo1'>
		<table cellpadding="0" cellspacing="0">
			<tr>
			<?php
			//从产品数据表中最新发布的6个产品
			$sql="select *from products order by intime desc limit 6";

            $res = $db->get_results($sql,false);
			for ($item =0;$item<count($res);$item++) {
				echo '<td>';
				echo '<a href="product_show.php?id='.$res[$item]['id'].'" title="'.$res[$item]['productname'].'"><img src="./files/'.$res[$item]['img'].'" alt="'.$res[$item]['productname'].'"/><br/>'.$res[$item]['productname'].'</a>';
				echo '</td>';
			}
			?>
			</tr>
		</table>
			</td>
			<td id="demo2" valign="top"></td>
		</tr>
	</table>
</div>
<script type="text/javascript">
<!--
  var speed=15;
  demo2.innerHTML=demo1.innerHTML;
  function Marquee(){
  if(demo2.offsetWidth-demo.scrollLeft<=0)
  demo.scrollLeft-=demo1.offsetWidth;
  else{
  demo.scrollLeft++;
  }
  }
  var MyMar=setInterval(Marquee,speed);
  demo.onmouseover=function() {clearInterval(MyMar);}
  demo.onmouseout=function() {MyMar=setInterval(Marquee,speed);}
//-->
</script>
		</div>
	</div>
	<div class="m2_right">
		<h3 class="rtitle">合作媒体</h3>
		<div class="m2_body m2_body2">
			<p><img src="images/m2_pic.png" alt=""/></p>
			<p align="center"><a href="about.php?id=3">查看更多合作媒体 &gt;&gt;</a></p>
		</div>		
	</div>
	<div class="c"></div>
</div>

<div class="main1">
	<div class="m3_left">
		<div class="m3_ll">
			<h3 class="ltitle"><span><a href="about.php?id=1"><img src="images/more.jpg" alt="更多"/></a></span><strong class="on">公司简介</strong></h3>
			<div class="m1_body c">
			<?php
			//从单页模块表中读取针对首页写的公司简介
			$sql="select *from board where id=18";
            $res2 = $db->get_results($sql);
			echo $res2['content'];
			?>
				<!-- 放到后台数据库 <p>　　公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介。</p>
				<p>　　公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介，公司简介公司简介。</p> -->
			</div>
		</div>
		<div class="m3_lr">
			<h3 class="ltitle"><span><a href="news.php"><img src="images/more.jpg" alt="更多"/></a></span><strong class="on">新闻资讯</strong></h3>
			<ul class="m1_body c">
			<?php
			//从新闻表中读取最新发表的新闻10条
			$sql="select * from news order by intime desc limit 5";
            $db = new DB();
            $res = $db->get_results($sql,false);
            for ($item =0;$item<count($res);$item++) {
				echo '<li><span>'.$res[$item]['intime'].'</span><a href="content.php?id='.$res[$item]['id'].'">'.$res[$item]['title'].'</a></li>';
			}
			?>
				
			</ul>
		</div>
		<div class="c"></div>
	</div>
	<div class="m2_right">
		<h3 class="rtitle">友情连接</h3>
		<ul class="m2_body">
		<?php
		//友情链接表中读取所有的友情链接数据显示到这里来
		$sql="select * from flink order by id desc";
        $db = new DB();
        $res = $db->get_results($sql,false);
        for ($item =0;$item<count($res);$item++) {
			echo '<li><a href="'.$res[$item]['link_url'].'" target="_blank">'.$res[$item]['title'].'</a></li>';
		}
		?>
			<li><a href="http://www.itsource.cn" target="_blank">源码时代官方网站</a></li>
		</ul>		
	</div>
	<div class="c"></div>
</div>
<?php
include 'footer.php'
?>