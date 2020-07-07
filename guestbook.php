<?php
include './header.php';

$cate_id=isset($_GET['cate_id']) ? $_GET['cate_id']:0;

?>
		<div class="inbody">
			<?php
			include 'left.php';
			?>
			
			<div class="inright">
				<h3 class="intitle"><span>您当前所在位置： <a href="/">首页</a> &gt; <a href="guestbook.php">来宾留言</a></span>最新新闻</h3>
				<ul class="newslist">
				<?php
				
                //步骤一
                //条件1
                $pagesize=10;
                //条件2
                $page=isset($_GET['page']) ?$_GET['page']: 1;//从用户选择的页面进行传值得到当前在第几页上，默认在第一页
                //条件3
                //构造SQL语句，从留言表中读取所有留言列表
				$sql="select * from guestbook where order by intime desc";
				$db=new DB();
				$res = $db->get_results($db,false);//条件3从结果集中得到数据的总行数

				
                $start=($page-1)*$pagesize;//步骤二，获取到当前页应显示的数据，并且显示出来
				$sql.="limit $start,$pagesize";//给全部的数据加一个限制输出的条件，只输出当前页应当显示的数据
				$res = $db->get_results($sql,false);


				for ($item=0;$item<count($res);$item++) {
					echo '<li><em>'.date('Y-m-d',strtotime($res[$item]['intime'])).'</em>'.$res[$item]['username'].'说：'.$res[$item]['content'].'</li>';
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
               <!--  留言的FORM表单 -->
               <h3 class="intitle">我要留言</h3>
               <form action="guestbook_save.php" method="post">
                 <p>昵称：<input type="text" name="username"></p>
                 <p>留言：<textarea name="content" cols="50" rows="6"></textarea></p>
                 <p><input type="submit" value="立即留言"></p>
               </form>
			</div>
		</div>

<?php
include './footer.php';
?>