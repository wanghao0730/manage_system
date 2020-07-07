<?php
include './header.php';

$cate_id=isset($_GET['cate_id']) ? $_GET['cate_id']:0;

?>
		<div class="inbody">
			<?php
			include './left.php';
			?>
			
			<div class="inright">
				<h3 class="intitle"><span>您当前所在位置： <a href="/">首页</a> &gt; <a href="#">新闻中心</a></span>最新新闻</h3>
				<ul class="newslist">
				<?php
				$db = new DB();
				$sql = "select * from news order by intime desc";
				$rs =$db->get_results($sql,false);
				for ($item=0;$item<count($rs);$item++) {
				    echo '<li><em>'.date('Y-m-d',strtotime($rs[$item]['intime'])).'</em><a href="content.php?id='.$rs[$item]['id'].'">'.$rs[$item]['title'].'</a></li>';
                }
				?>
				</ul>
				<div class="page">
				<?php
				//步骤三，显示出页码表
				//得到总页数 $pagecount=向上取整（总行数/每页显示的行数）
				$pagecount=ceil($records/$pagesize);

				if ($page>1) {
					echo '<a href="news.pph?page=1">首页</a>';
					echo '<a href="news.pph?page='.($page-1).'">上一页</a>';
				}
				for ($i=1; $i <=$pagecount ; $i++) { 
					if ($i==$page) {
						echo '<a href="news.pph?page='.$i.'" class="on">'.$i.'</a>';
					}else{
						echo '<a href="news.pph?page='.$i.'">'.$i.'</a>';
					}
				}

				if ($page< $pagecount) {
					echo '<a href="news.pph?page='.($page+1).'">下一页</a>';
					echo '<a href="news.pph?page='.$pagecount.'">尾页</a>';
				}
				?>
				</div>
			</div>
		</div>

<?php
include './footer.php';
?>