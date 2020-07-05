
<?php
	include ('./header.php');
?>
    <div class="main">  
      <!-- 发表新闻 -->
      <div class="note">
        <h3>新增分类</h3>
        <form action="./cate_new_save.php" method="POST">
          <table class="new-form">
            <tr>
              <td>分类名:</td>
              <td>
                <input type="text" name="catename" class="inbox">
              </td>
            </tr>
              <tr>
                  <td>所属版块:</td>
                  <td>
                      <select name="module" class="inbox">
                          <option value="新闻中心">新闻中心</option>
                          <option value="产品中心">产品中心</option>
                      </select>
                  </td>
              </tr>
              <tr>
                  <td>排序号:</td>
                  <td>
                      <input type="text" name="orderno" value="1" class="inbox">
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