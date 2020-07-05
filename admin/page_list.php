
<?php
	include ('./header.php');
?>
    <div class="main">
      <!-- 单页 -->
      <div class="note">
        <h3>单页列表</h3>
        <table class="news-list">
          <thead>
            <tr>
              <th>ID</th>
              <th>模块名</th>
              <th>内容</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
						<?php
								//构造读取数据列表的sql语句
								$sql = "select * from board order by id asc";
								$db = new DB();
								$res = $db ->get_results($sql,false);
							for($i =0;$i<count($res);$i++) {
								echo '<tr>';
								echo ' <td>'.$res[$i]['id'].'</td>';
								echo ' <td>'.$res[$i]['module_name'].'</td>';
													//strip_tags方法去除html标签 substr对英文进行截取,所以要用多字节的截取方法mb_substr方法截取
								echo '  <td>'.mb_substr(strip_tags($res[$i]['content']),0,80,'utf-8').'</td>';
								echo ' <td><a href="./page_edit.php?id='.$res[$i]['id'].'">修改</a><a href="./page_delete.php?id='.$res[$i]['id'].'">删除</a></td>';
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