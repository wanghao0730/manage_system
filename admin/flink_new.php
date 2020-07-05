
<?php
	include ('./header.php');
?>
    <div class="main">  
      <!-- 发表新闻 -->
      <div class="note">
        <h3>新增友情链接</h3>
        <form action="./flink_new_save.php" method="POST" enctype="multipart/form-data">
          <table class="new-form">
            <tr>
              <td>链接名称:</td>
              <td>
                <input type="text" name="title" class="inbox">
              </td>
            </tr>
              <tr>
                  <td>链接地址:</td>
                  <td>
                      <input type="text" name="link_url" class="inbox">
                  </td>
              </tr>
              <tr>
                  <td>说明内容:</td>
                  <td>
                    <textarea type="text" name="content"  rows="6" cols="60" style="width: 600px;height: 200px;">
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