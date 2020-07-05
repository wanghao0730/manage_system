
<?php
	include ('./header.php');
?>
    <div class="main">  
      <!-- 发表新闻 -->
      <div class="note">
        <h3>新增管理员</h3>
        <form action="./admin_new_save.php" method="POST">
          <table class="new-form">
            <tr>
              <td>登录名:</td>
              <td>
                <input type="text" name="username" class="inbox">
              </td>
            </tr>
              <tr>
                  <td>密码:</td>
                  <td>
                      <input type="password" name="password" class="inbox">
                  </td>
              </tr>
            <tr>
              <td>权限:</td>
              <td>
                <select class="inbox" name="flag">
                  <option value="1">超级管理员</option>
                    <option value="2">普通管理员</option>
                </select>
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