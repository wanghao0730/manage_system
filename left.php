<div class="leftbar">
    <h3>新闻分类</h3>
     <ul>
     <?php
     //从分类表中读取新闻分类的数据
     $sql="select * from category where module='新闻中心' order by orderno asc,id asc";
     $db = new DB();
     $res = $db->get_results($sql,false);
    for ($item=0;$item<count($res);$item++) {
         echo '<li><a href="news.php?cate_id='.$res[$item]['id'].'">'.$res[$item]['catename'].'</a></li>';
     }
     ?>
         
     </ul>
     <p><img src="images/leftbar1.jpg" alt="" width="260"/></p>
</div>