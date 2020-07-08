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
				$sql = "select * from news where 1";
				if ($cate_id > 0) {
				    $sql.=" and cate_id=$cate_id";
                }
				$sql.=" order by intime desc";
				$rs =$db->get_results($sql,false);


				//分页
                $pagesize = 3;
                $page=isset($_GET['page']) ? $_GET['page'] : 1;
                $sql = "select * from news where 1";
                if ($cate_id > 0) {
                    $sql.=" and cate_id=$cate_id";
                }
                $sql.=" order by intime desc";
                $rs = $db->get_results($sql,false);
                $records = count($rs);
                //获取当前页应当现实的数据，并且显示处理
                /*
                 * 从哪里开始读取数据
                 * 每页显示3条数据
                 * 第一页显示 0 1 2
                 * 第二页显示 3 4 5
                 * 第三页显示 6 7 8
                 * */
                $start = ($page-1)*$pagesize;
                $sql.="  limit $start,$pagesize";
                $rs = $db->get_results($sql,false);

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
					echo '<a href="news.php?page=1">首页</a>';
					echo '<a href="news.php?page='.($page-1).'">上一页</a>';
				}
				for ($i=1; $i <=$pagecount ; $i++) { 
					if ($i==$page) {
						echo '<a href="news.php?page='.$i.'" class="on">'.$i.'</a>';
					}else{
						echo '<a href="news.php?page='.$i.'">'.$i.'</a>';
					}
				}

				if ($page< $pagecount) {
					echo '<a href="news.php?page='.($page+1).'">下一页</a>';
					echo '<a href="news.php?page='.$pagecount.'">尾页</a>';
				}
				?>
				</div>
			</div>
		</div>

<?php
include './footer.php';
?>