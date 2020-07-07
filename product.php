<?php
include './header.php';
$cate_id=isset($_GET['cate_id']) ? $_GET['cate_id']:0;
?>
		<div class="inbody">
			<?php
			include './left.php';
			?>
			
	<div class="inright">
		<h3 class="intitle"><span>您当前所在位置： <a href="/">首页</a> &gt; 产品中心</span>产品中心</h3>
		<ul class='product'>
		<?php
		//分页步骤一
		//条件1  每页显示多少条数据
		$pagesize=2;//设置每一页显示几条数据
		//条件2  当前在第几页
		$page=isset($_GET['page']) ? $_GET['page'] : 1;//接收用户传页码值，如果没传值则使用默认值1
        //条件3  一共有多少条数据
        

		$sql="select *in,productname,img from product";
		if ($cate_id>0) {
			$sql.=" and cate_id=$cate_id";
		}
		$sql.=" order by intime desc";
		$rs=@mysqli_query($conn,$sql);
        
        $records=@mysqli_num_rows($rs);//获取到一共有多少行数据 

        //分页步骤二  当前页应当显示哪些数据
        $start=($page-1)*$pagesize;
        $sql.=" limit $start,$pagesize";
        $rs=@mysqli_query($conn,$sql);

		while ($row=@mysqli_fetch_assoc($rs)) {
			echo '<li>';
			echo '<div class="pic"><a href="product_show.php?id='.$row['id'].'"><img src="./files/'.$row['img'].'" alt=""/></a></div>';
			echo '<h4><a href="product_show.php?id='.$row['id'].'">'.$row['productname'].'</a></h4>';
			echo '</li>';
		}
		?>
		</ul>
		<div class="c"></div>
		<div class="page">
		    <?php
		    //分页步骤三：打印页码表
		    $pagecount=ceil($records/$pagesize);  //要打印页码表必须知道一共有多少页

		    for ($i=1; $i <=$pagecount ; $i++) { 
		    	if ($i==$page) {
		    		echo '<a href="?page='.$i.'" class="on">'.$i.'</a>';
		    	}else{
		    	    echo '<a href="?page='.$i.'">'.$i.'</a>';
		    	}
		    }
		    ?>
			<a href="?page=1">首页</a>
			<a href='?page=1'>上一页</a>
			<a href='?page=1'>1</a>
			<a href='?page=1' class="on">2</a>
			<a href='?page=1'>3</a>
			<a href='?page=1'>下一页</a>
			<a href='?page=1'>尾页</a>
		</div>
	</div>
</div>
<?php
incluede('./footer.php');
?>