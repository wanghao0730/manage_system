
<?php
	include ('./header.php');
	$id = $_GET['id'];
	$sql = "select * from products where id=$id";
	$db = new DB();
	$res = $db->get_results($sql);
?>
    <div class="main">  
      <!-- 发表新闻 -->
      <div class="note">
        <h3>修改产品</h3>
        <form action="./product_edit_save.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $res['id'] ?>">
          <table class="new-form">
            <tr>
              <td>产品名称:</td>
              <td>
                <input type="text" name="productname" class="inbox" value="<?php echo $res['productname'] ?>">
              </td>
            </tr>
              <tr>
                  <td>产品编号:</td>
                  <td>
                      <input type="text" name="pro_no" class="inbox" value="<?php echo $res['pro_no'] ?>">
                  </td>
              </tr>
              <tr>
                  <td>新闻分类:</td>
                  <td>
                      <select name="cate_id" class="inbox">
                          <?php
                          $sql = 'select * from category where module="产品中心" order by orderno asc,id desc';
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
              <td>产品描述:</td>
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