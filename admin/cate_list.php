
<?php
	include ('./header.php');
?>
    <div class="main">
      <!-- 新闻 -->
      <div class="note">
        <h3>分类列表</h3>
        <table class="news-list">
          <thead>
            <tr>
              <th>ID</th>
              <th>分类名</th>
              <th>所属板块</th>
              <th>排序号</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          <?php
          //构造读取数据列表的sql语句
          $sql = "select * from category order by orderno asc,id desc";
          $db = new DB();
          $res = $db ->get_results($sql,false);
          for($i =0;$i<count($res);$i++) {
              echo '<tr>';
              echo ' <td>'.$res[$i]['id'].'</td>';
              echo ' <td>'.$res[$i]['catename'].'</td>';
              echo ' <td>'.$res[$i]['module'].'</td>';
              echo ' <td>'.$res[$i]['orderno'].'</td>';
              echo ' <td><a href="./cate_edit.php?id='.$res[$i]['id'].'">修改</a><a href="./cate_delete.php?id='.$res[$i]['id'].'">删除</a></td>';
              echo '</tr>';
          }
          ?>
          </tbody>
        </table>

      </div>
		</div>
<?php
	include('./footer.php');

?>