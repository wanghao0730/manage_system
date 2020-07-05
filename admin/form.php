
<?php
	include ('./header.php');
?>
    <div class="main">  
      <!-- 发表新闻 -->
      <div class="note">
        <h3>发表新闻</h3>
        <form action="" method="POST">
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
                <select class="inbox">
                  <option value="">请选择分类</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>作 者:</td>
              <td>
                <input type="text" name="title" class="inbox">
              </td>
            </tr>
            <tr>
              <td>新闻内容</td>
              <td>
                <textarea type="text" name="title" id="" class="inbox" rows="20" cols="60">
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