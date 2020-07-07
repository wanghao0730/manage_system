<?php
include './header.php';
$db = new DB();
//获取传入的单页模块ID
$id=$_GET['id'];
//构造SQL语句，从单页表中读取公司简介（ID=1）的数据
$sql="select * from board where id=$id";
$row = $db->get_results($sql);
?>
		<div class="inbody">
		    <?php
            include "./left.php";
		    ?>
			<div class="inright">
				<h3 class="intitle"><span>您所在的位置：<a href="/">首页</a> &gt; <?php echo $row['id'];?></span><?php echo $row['module_name'];?></h3>
				<div class="mbody">
				<?php
                    echo $row['content'];
                ?>
				</div>
			</div>
		</div>
<?php
include './footer.php';
?>