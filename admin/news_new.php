
<?php
	include ('./header.php');
?>
    <div class="main">  
      <!-- 发表新闻 -->
      <div class="note">
        <h3>发布新闻</h3>
        <form action="./news_new_save.php" method="POST" enctype="multipart/form-data">
          <table class="new-form">
            <tr>
              <td>新闻标题:</td>
              <td>
                <input type="text" name="title" class="inbox">
              </td>
            </tr>
              <tr>
                  <td>新闻分类:</td>
                  <td>
                      <select name="cate_id" class="inbox">
                          <option value="0">请选择新闻分类</option>
                          <?php
                            $sql = 'select * from category where module="新闻中心" order by orderno asc,id desc';
                            $db = new DB();
                            $res = $db->get_results($sql,false);
                            for ($item=0;$item<count($res);$item++) {
                                echo '<option value="'.$res[$item]['id'].'">'.$res[$item]['module'].'</option>';
                            }
                          ?>
                      </select>
                  </td>
              </tr>
              <tr>
                  <td>作&nbsp;&nbsp;者:</td>
                  <td>
                      <input type="text" name="author" class="inbox">
                  </td>
              </tr>
            <tr>
              <td>新闻内容</td>
              <td>
                <textarea type="text" name="content" id="editor" rows="6" cols="60" style="width: 600px;height: 400px;">
                </textarea>
              </td>
            </tr>
              <tr>
                  <td>上传图片:</td>
                  <td>
                      <input type="file" name="img" class="inbox">
                  </td>
              </tr>
            <tr>
              <td></td>
              <td>
                <input type="submit" value="提交">
              </td>
            </tr>
          </table>
        </form>
      </div>
		</div>
<?php
	include('./footer.php');

?>