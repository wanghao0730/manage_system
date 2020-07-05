
<?php
	include ('./header.php');
?>
    <div class="main">  
      <!-- 发表新闻 -->
      <div class="note">
        <h3>新增产品</h3>
        <form action="product_new_save.php" method="post" enctype="multipart/form-data">
          <table class="new-form">
            <tr>
              <td>产品名称:</td>
              <td>
                <input type="text" name="productname" class="inbox">
              </td>
            </tr>
              <tr>
                  <td>产品编号:</td>
                  <td>
                      <input type="text" name="pro_no" class="inbox">
                  </td>
              </tr>
            <tr>
              <td>产品分类:</td>
              <td>
                <select class="inbox" name="cate_id">
                  <option value="0">请选择产品分类</option>
                    <?php

                     $sql = "select * from category where module='产品中心'  order by orderno asc ,id desc";
                     $db = new DB();
                     $res = $db->get_results($sql,false);
                     for ($item = 0;$item < count($res); $item++) {
                         echo '<option value="'.$res[$item]['id'].'">'.$res[$item]['catename'].'</option>';
                     }
                    ?>
                </select>
              </td>
            </tr>
              <tr>
                  <td>产品描述</td>
                  <td>
                      <textarea type="text" name="content" id="editor" rows="6" cols="60" style="width: 600px;height: 400px;">
                </textarea>
                  </td>
              </tr>
              <tr>
                  <td>产品图片</td>
                  <td>
                      <input type="file" name="img" class="inbox">
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