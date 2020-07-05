
<?php
	include ('./header.php');
	$id = $_GET['id'];
	$sql = "select * from category where id=$id";
	$db = new DB();
	$res = $db->get_results($sql);
?>
    <div class="main">  
      <!-- 发表新闻 -->
      <div class="note">
        <h3>修改分类</h3>
        <form action="./cate_edit_save.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $res['id'] ?>">
          <table class="new-form">
            <tr>
              <td>分类名:</td>
              <td>
                <input type="text" name="catename" class="inbox" value="<?php echo $res['catename'] ?>">
              </td>
            </tr>
              <tr>
                  <td>所属模块:</td>
                  <td>
                      <select name="module" class="inbox">
                          <option value="新闻中心" <?php if ($res['module'] =='新闻中心'){ echo 'selected="selected"'; }; ?>>新闻中心</option>
                          <option value="产品中心" <?php if ($res['module'] =='产品中心'){ echo 'selected="selected"'; }; ?>>产品中心</option>
                      </select>
                  </td>
              </tr>
              <tr>
                  <td>排序号:</td>
                  <td>
                      <input type="text" name="orderno" class="inbox" value="<?php  echo $res['orderno'] ?>">
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