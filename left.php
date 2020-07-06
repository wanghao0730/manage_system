<div class="leftbar">
    <h3>新闻分类</h3>
     <ul>
     <?php
     //从分类表中读取新闻分类的数据
     $sql="select * from category where module='新闻中心' order by orderno asc,id asc";
     $rs=@mysqli_query($conn,$sql);
     while ($row=@mysqli_fetch_assoc($rs)) {
         echo '<li><a href="news.php?cate_id=">'.$row['catename'].'</a></li>';
     }
     ?>
         
     </ul>
     <p><img src="images/leftbar1.jpg" alt="" width="260"/></p>
</div>