
<?php
	include ('./header.php');
?>
    <div class="main">
      <!-- 新闻 -->
      <div class="note">
        <h3>友情链接列表</h3>
        <table class="news-list">
          <thead>
            <tr>
              <th>ID</th>
              <th>链接名称</th>
              <th>链接网址</th>
              <th>链接说明</th>
              <th>时间</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
          <?php
//          $sql = "select * from news order by intime desc ";
//          $db = new DB();
//           $res = $db ->get_results($sql,false);
//
          //! 分页步骤
          $pageSize = 3;  //! 每页显示多少条数据
          //! 条件二 处于第几个页面位置
          $page = isset($_GET['page']) ? $_GET['page'] : 1;
          //! 查询
          $db = new DB();
          $sql = "select * from flink";
          $res = $db->get_results($sql);
          $records  = count($res);

          //! 当前页显示那些数据
          $start = ($page-1)*$pageSize;
          $db = new DB();
          $sql = "select * from flink order by intime desc limit $start,$pageSize";
          $res = $db->get_results($sql,false);
          for ($item =0;$item<count($res);$item++) {
                       echo  '<tr>';
                        echo '<td>'.$res[$item]['id'].'</td>';
                       echo ' <td>'.$res[$item]['title'].'</td>';
                       echo '<td>'.$res[$item]['link_url'].'</td>';

                       echo ' <td>'.$res[$item]['content'].'</td>';
              echo ' <td>'.$res[$item]['intime'].'</td>';
                       echo ' <td>
                          <a href="./flink_edit.php?id='.$res[$item]['id'].'">修改</a>
                          <a href="./flink_delete.php?id='.$res[$item]['id'].'" onclick="return confirm(`确认删除数据吗？`)">删除</a>
                        </td>';
                     echo ' </tr>';
                     }
          ?>
          </tbody>
        </table>
          <div class="page">
              <?php
                $pageCount = ceil($records/$pageSize);
                for($i=1;$i<=$pageCount;$i++) {
                    if ($page===$i) {
                        echo "<a href='flink_list.php?page=$i' class='on'>$i</a>";
                    }
                    echo "<a href='flink_list.php?page=$i' >$i</a>";
                }
              ?>
          </div>
      </div>
		</div>
<?php
	include('./footer.php');

?>