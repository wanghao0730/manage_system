
<?php
	include ('./header.php');
	$id = $_GET['id'];
	$sql = "select * from guestbook where id=$id";
	$db = new DB();
	$res = $db->get_results($sql);
?>
    <div class="main">  
      <!-- 发表新闻 -->
      <div class="note">
        <h3>修改留言</h3>
        <form action="./guestbook_edit_save.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $res['id'] ?>">
          <table class="new-form">
            <tr>
              <td>用户名:</td>
              <td>
                <input type="text" name="name" class="inbox" value="<?php echo $res['username'] ?>">
              </td>
            </tr>
            <tr>
              <td>留言内容</td>
              <td>
                <textarea type="text" name="content" id="editor" rows="6" cols="60" style="width: 600px;height: 400px;">
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