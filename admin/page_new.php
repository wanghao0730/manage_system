
<?php
	include ('./header.php');
?>
    <div class="main">  
      <!-- 发表新闻 -->
      <div class="note">
        <h3>新增单页</h3>
        <form action="./page_new_save.php" method="POST" enctype="multipart/form-data">
          <table class="new-form">
            <tr>
              <td>单页模块名:</td>
              <td>
                <input type="text" name="module_name" class="inbox">
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