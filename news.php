<?php
incluede('./conn.php');
incluede('./header.php');

$cate_id=isset($_GET['cate_id']) ? $_GET['cate_id']:0;

?>
		<div class="inbody">
			<?php
			incluede('./left.php');
			?>
			
			<div class="inright">
				<h3 class="intitle"><span>您当前所在位置： <a href="/">首页</a> &gt; <a href="#">新闻中心</a></span>最新新闻</h3>
				<ul class="newslist">
				<?php
				

                /*
                新闻分页：
                  三大条件：
                    1、每页显示多少条数据  $pagesize=3【自主设置】
                    2、当前在第几页        $page=$_GET['page']【获取得到】
                    3、一共有多少条数据    $records 【计算】

                  三大步骤：
                    1、获取三大条件（准备工作）
                    2、获取到当前页应显示的数据，并且显示出来
                    3、显示出页码表
                */
                //步骤一
                //条件1
                $pagesize=3;
                //条件2
                $paeg=isset($_GET['page']) ?$_GET['page']: 1;//从用户选择的页面进行传值得到当前在第几页上，默认在第一页
                //条件3
                //构造SQL语句，从新闻表中读取所有新闻列表
				$sql="select * from news where 1";
				if ($cate_id>0) {
					$sql.="and cate_id=$cate_id";//如果有选择新闻分类则加条件过滤新闻列表
				}
				$sql.="order by intime desc";
				$rs=@mysqli_query($conn,$sql);
				$records=@mysqli_num_rows($rs);//条件3从结果集中得到数据的总行数

				//步骤二，获取到当前页应显示的数据，并且显示出来
                $start=($page-1)*$pagesize
				$sql.="limit $start,$pagesize";//给全部的数据加一个限制输出的条件，只输出当前页应当显示的数据
				$rs=@mysqli_query($conn,$sql);


				while ($row=@mysqli_fetch_assoc($rs)) {
					echo '<li><em>'.date('Y-m-d',strtotime($row['intime'])).'</em><a href="content.php?id='.$row['id'].'">'.$row['title'].'</a></li>';
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
incluede('./footer.php');
?>