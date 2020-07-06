<?php
incluede('conn.php');
incluede('header.php');
$id=$_GET['id'];
//构造SQL语句，去product产品表中查询这个ID对应的产品详细说明
$sql="select product.*,category.catename from product,category where product.id=$id and product.cate_id=category.id";//连表查询
$rs=@mysqli_query($conn,$sql);
if (@mysqli_num_rows($rs)>0) {
	$pro_row=@mysqli_fetch_assoc($rs);
}else{
	echo 'No result';exit;
}

?>
		<div class="inbody">
			<?php incluede('left.php'); ?>
			
	<div class="inright">
		<h3 class="intitle"><span>您所在的位置：<a href="/">首页</a> &gt; <a href="#">产品展示</a> &gt; <?php echo $pro_row['productname'];?></span><?php echo $pro_row['productname'];?></h3>
		<div class="mbody">
			<table class="proshow" cellpadding="0" cellspacing="0">
			<tr><td colspan="2"><img src="./files/<?php echo $pro_row['img'];?>" alt="" onload="javascript:if(this.clientWidth>300){this.style.width='300px';}"/></td></tr>
			<tr><td class="one">型　　号：</td><td class="two"><?php echo $pro_row['pro_no'];?></td></tr>
			<tr><td class="one">产品名称：</td><td class="two"><strong><?php echo $pro_row['productname'];?></strong></td></tr>
			<tr><td class="one">分　　类：</td><td class="two"><b><?php echo $pro_row['catename'];?></b></td></tr>
			<tr><td class="one">详情描述：</td><td class="two"><?php echo $pro_row['content'];?></td></tr>
			</table>
		</div>
		<h3 class="intitle">其它产品</h3>
		<ul class="product">
		<?php
		//构造SQL语句去product产品表中查询与当前产品同类的产品
		$sql="select id,productname,img from product where cate_id=".$pro_row['cate_id']."order by intime desc limit6";
		$rs=@mysqli_query($conn,$sql);
		while ($row=@mysqli_fetch_assoc($rs)) {
			echo '<li>';
			echo '<div class="pic"><a href="product_show.php?id='.$row['id,title'].'"><img src="./files/'.$row['img'].'" alt=""/></a></div>';
			echo '<h4><a href="product_show.php?id='.$row['id,title'].'">'.$row['productname'].'</a></h4>';
			echo '</li>';
		}
		?>
		</ul>
		<div class="c"></div>

	</div>
</div>
<?php
incluede('footer.php');
?>