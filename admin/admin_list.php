
<?php
	include ('./header.php');
?>
    <div class="main">
      <!-- 新闻 -->
      <div class="note">
        <h3>管理员列表</h3>
        <table class="news-list">
          <thead>
            <tr>
              <th>用户名</th>
              <th>密码</th>
              <th>权限</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $db = new DB();
          $sql = "select * from user_msg order by user_id desc";
          $res = $db->get_results($sql,false);
          for ($item =0;$item<count($res);$item++) {
                       echo  '<tr>';
                        echo '<td>'.$res[$item]['user_name'].'</td>';
                       echo ' <td>******</td>';
                       echo '<td>'.$res[$item]['flag'].'</td>';
                       echo ' <td>
                          <a href="./admin_edit.php?id='.$res[$item]['user_id'].'">修改</a>
                          <a href="./admin_delete.php?id='.$res[$item]['user_id'].'" onclick="return confirm(`确认删除数据吗？`)">删除</a>
                        </td>';
                     echo ' </tr>';
                     }
          ?>
          </tbody>
        </table>
      </div>
		</div>
<?php
	include('./footer.php');

?>