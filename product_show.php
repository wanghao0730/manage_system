<?php
include './header.php';
$id=$_GET['id'];
//构造SQL语句，去product产品表中查询这个ID对应的产品详细说明
$sql="select products.*,category.catename from products,category where products.id=$id and products.cate_id=category.id";//连表查询
$db = new DB();
$rs = $db->get_results($sql);
//if (count($res)>0) {
//    $rs = count($res);
//}else{
//    echo 'No result';exit;
//}

?>
		<div class="inbody">
			<?php include "./left.php"; ?>
			
	<div class="inright">
		<h3 class="intitle"><span>您所在的位置：<a href="/">首页</a> &gt; <a href="#">产品展示</a> &gt; <?php echo $rs['productname'];?></span><?php echo $res['productname'];?></h3>
		<div class="mbody">
			<table class="proshow" cellpadding="0" cellspacing="0">
			<tr><td colspan="2"><img src="./files/<?php echo $rs['img'];?>" alt="" onload="javascript:if(this.clientWidth>300){this.style.width='300px';}"/></td></tr>
			<tr><td class="one">型　　号：</td><td class="two"><?php echo $rs['pro_no'];?></td></tr>
			<tr><td class="one">产品名称：</td><td class="two"><strong><?php echo $rs['productname'];?></strong></td></tr>
			<tr><td class="one">分　　类：</td><td class="two"><b><?php echo $rs['catename'];?></b></td></tr>
			<tr><td class="one">详情描述：</td><td class="two"><?php echo $rs['content'];?></td></tr>
			</table>
		</div>
		<h3 class="intitle">其它产品</h3>
		<ul class="product">
		<?php
		//构造SQL语句去product产品表中查询与当前产品同类的产品
		$sql="select id,productname,img from products where cate_id=".$rs['cate_id']." order by intime desc";
        $db = new DB();
		$res = $db->get_results($sql);
        for ($item=0;$item<count($res);$item++) {
			echo '<li>';
			echo '<div class="pic"><a href="product_show.php?id='.$res['id'].'"><img src="./files/'.$res['img'].'" alt=""/></a></div>';
			echo '<h4><a href="product_show.php?id='.$res['id'].'">'.$res['productname'].'</a></h4>';
			echo '</li>';
		}
		?>
		</ul>
		<div class="c"></div>

	</div>
</div>
<?php
include  './footer.php';
?>