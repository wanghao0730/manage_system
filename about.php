<?php
include './header.php';
//获取传入的单页模块ID
$id=isset($_GET['id'])?$_GET['id'] : 1;
//构造SQL语句，从单页表中读取公司简介（ID=1）的数据
$sql="select * from board where id=$id";
if (@mysqli_num_rows($rs)>0) {
	$about=@mysqli_fetch_assoc($rs);
}else{
	echo '没有数据';exit;
}
?>
		<div class="inbody">
		    <?php
		     incluede('./left.php');
		    ?>
			<div class="inright">
				<h3 class="intitle"><span>您所在的位置：<a href="/">首页</a> &gt; <?php echo $about['boardname'];?></span><?php echo $about['boardname'];?></h3>
				<div class="mbody">
					<?php
					echo $about['content'];
					?>
				</div>
			</div>
		</div>
<?php
incluede('./footer.php');
?>