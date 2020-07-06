
<?php
	include ('./header.php');
?>
    <div class="main">
      <!-- 新闻 -->
      <div class="note">
        <h3>产品列表</h3>
        <table class="news-list">
          <thead>
            <tr>
              <th>ID</th>
              <th>产品名称</th>
              <th>产品分类</th>
              <th>产品图片</th>
              <th>发布时间</th>
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
          $pageSize = 15;  //! 每页显示多少条数据
          //! 条件二 处于第几个页面位置
          $page = isset($_GET['page']) ? $_GET['page'] : 1;
          //! 查询
          $db = new DB();
          $sql = "select * from products";
          $res = $db->get_results($sql);
          $records  = count($res);

          //! 当前页显示那些数据
          $start = ($page-1)*$pageSize;
          $db = new DB();
          $sql = "select p.*,c.catename from products p,category c where p.cate_id=c.id order by intime desc limit $start,$pageSize";
          $res = $db->get_results($sql,false);
          for ($item =0;$item<count($res);$item++) {
                       echo  '<tr>';
                        echo '<td>'.$res[$item]['id'].'</td>';
                       echo ' <td>'.$res[$item]['productname'].'</td>';
                       echo '<td>'.$res[$item]['catename'].'</td>';
                       echo ' <td><img src="../files/'.$res[$item]['img'].'"></td>';
                         echo ' <td>'.$res[$item]['intime'].'</td>';
                       echo ' <td>
                          <a href="./product_edit.php?id='.$res[$item]['id'].'">修改</a>
                          <a href="./product_delete.php?id='.$res[$item]['id'].'" onclick="return confirm(`确认删除数据吗？`)">删除</a>
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
                        echo "<a href='product_list.php?page=$i' class='on'>$i</a>";
                    }
                    echo "<a href='product_list.php?page=$i'>$i</a>";
                }
              ?>
          </div>
      </div>
		</div>
<?php
	include('./footer.php');

?>