
<?php
	include ('./header.php');
	$id = $_GET['id'];
	$sql = "select * from flink where id=$id";
	$db = new DB();
	$res = $db->get_results($sql);
?>
    <div class="main">  
      <!-- 发表新闻 -->
      <div class="note">
        <h3>修改链接</h3>
        <form action="./flink_edit_save.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $res['id'] ?>">
          <table class="new-form">
            <tr>
              <td>链接名称:</td>
              <td>
                <input type="text" name="title" class="inbox" value="<?php echo $res['title'] ?>">
              </td>
            </tr>
            <tr>
              <td>链接网址</td>
              <td>
                <input type="text" name="link_url" value="<?php echo $res['link_url'] ?>">
              </td>
            </tr>
              <tr>
                  <td>链接说明</td>
                  <td>
                <textarea type="text" name="content" rows="6" cols="60" style="width: 600px;height: 200px;">
                    <?php echo $res['content'] ?>
                </textarea>
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