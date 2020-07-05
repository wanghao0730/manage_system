
<?php
	include ('./header.php');
	$id = $_GET['id'];
	$sql = "select * from news where id=$id";
	$db = new DB();
	$res = $db->get_results($sql);
?>
    <div class="main">  
      <!-- 发表新闻 -->
      <div class="note">
        <h3>发布新闻</h3>
        <form action="./news_edit_save.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $res['id'] ?>">
          <table class="new-form">
            <tr>
              <td>新闻标题:</td>
              <td>
                <input type="text" name="title" class="inbox" value="<?php echo $res['title'] ?>">
              </td>
            </tr>
              <tr>
                  <td>新闻分类:</td>
                  <td>
                      <select name="cate_id" class="inbox">
                          <?php
                          $sql = 'select * from category where module="新闻中心" order by orderno asc,id desc';
                          $db = new DB();
                          $r = $db->get_results($sql,false);
                          for ($item=0;$item<count($r);$item++) {
                              if ($res['cate_id'] == $r[$item]['id']) {
                                  echo '<option value="'.$r[$item]['id'].'" selected="selected">'.$r[$item]['module'].'</option>';
                              }else {
                                  echo '<option value="'.$r[$item]['id'].'">'.$r[$item]['module'].'</option>';
                              }

                          }
                          ?>
                      </select>
                  </td>
              </tr>
              <tr>
                  <td>作&nbsp;&nbsp;者:</td>
                  <td>
                      <input type="text" name="author" class="inbox" value="<?php  echo $res['author'] ?>">
                  </td>
              </tr>
            <tr>
              <td>新闻内容</td>
              <td>
                <textarea type="text" name="content" id="editor" rows="6" cols="60" style="width: 600px;height: 400px;">
                    <?php echo $res['content'] ?>
                </textarea>
              </td>
            </tr>
              <tr>
                  <td>上传图片:</td>
                  <td>
                      <img src="../files/<?php echo $res['img'];?>" style="width: 200px">
                      <input type="file" name="img" class="inbox">
                      <input type="hidden" name="old_img" value="<?php echo $res['img'];?>">
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