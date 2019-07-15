  <?php
    $user_id = $_SESSION['user_data']['id'];       
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
     <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">ADD Product</h3>
              <a class="col_pro-1" href="product.php"><div class="btn btn-info">
                 Product List
              </div></a>
            </div>
            <form class="form-horizontal" role="form"  method="post" action="" id="add_product">
              <div class="box-body">
              <input type="hidden"  id="user_id" name="user_id" value="<?php echo $user_id ?>">
           <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Product Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" required>
                  </div>
                </div>
       
           <div class="form-group">
                  <label for="Cat_desc" class="col-sm-2 control-label">Product Description</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="product_desc" name="product_desc" placeholder="Product Description" required>
                  </div>
                </div>
        </div>
        
        <div class="form-group">
                  <label for="Cat_desc" class="col-sm-2 control-label">Product Category</label>

                  <div class="col-sm-10">
                   
           <?php
           $category = new Category();
           $categoryList = $category->getCategory();
        echo "<select class='form-control select2'  style='width: 100%;' name='category_id'>";
       for ($i = 0; $i < count($categoryList); $i++){

          echo "<option value='" . $categoryList[$i]['cat_id'] ."'>" . $categoryList[$i]['category_name'] ."</option>";
                 
       }
       echo "</select>";
            ?>
             
                  
                </div>
        </div>
    
      
       <div class="form-group">
                  <label for="Cat_desc" class="col-sm-2 control-label">Product Attribute</label>

                  <div class="col-sm-10">
                   
                  <?php
                  $attribute = new Attribute();
                  $attributeList = $attribute->getAttribute();?>
                  <?php  foreach ($attributeList as $rows) {?>
                  <input type="checkbox" name="attribute_id[]" value="<?php echo $rows['attribute_id']; ?>">&nbsp;<?php echo $rows['attribute_name']; ?>&nbsp;&nbsp;
                  <?php  }; ?>
                </div>
        </div>
      
    
         <div class="form-group">
                  <label for="cat_image" class="col-sm-2 control-label">Product Image</label>

                  <div class="col-sm-10">
                    <input type="file" name="product_image">
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
  </div>
   
    
<script type="text/javascript">    
        $(function () {
        $('#add_product').bind('submit', function (evt) {
          evt.preventDefault();
          var formData = new FormData($(this)[0]);
          $.ajax({
            type: 'post',
            url: 'product_save.php',
            data: formData,
              async: false,
              cache: false,
              contentType: false,
              enctype: 'multipart/form-data',
              processData: false,
            success: function (datas) {
              var data = $.trim(datas);
          if(data != 0){                        
                 window.location.href = 'product.php';
              }else{
                 document.getElementById("error").innerHTML = "Product is not able to Added";
              } 
                      
            }
          });
          return false;
        });
      });
</script> 