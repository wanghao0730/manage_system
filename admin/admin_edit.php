
<?php
	include ('./header.php');
	$id = $_GET['id'];
	$sql = "select * from user_msg where user_id=$id";
	$db = new DB();
	$res = $db->get_results($sql);
?>
    <div class="main">  
      <!-- 发表新闻 -->
      <div class="note">
        <h3>修改链接</h3>
        <form action="./admin_edit_save.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $res['user_id'] ?>">
          <table class="new-form">
            <tr>
              <td>管理员名称:</td>
              <td>
                <input type="text" name="username" class="inbox" value="<?php echo $res['user_name'] ?>">
              </td>
            </tr>
            <tr>
              <td>管理员密码</td>
              <td>
                <input type="text" name="userpwd" value="<?php echo $res['user_pwd'] ?>">
              </td>
            </tr>
              <tr>
                  <td>权限</td>
                  <td>
                      <input type="text" name="flag" value="<?php echo $res['flag']?>">
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