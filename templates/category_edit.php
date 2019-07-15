   <?php
    $user_id = $_SESSION['user_data']['id'];    
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
     <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" role="form"  method="post" action="" id="edit_category">
            <input type="hidden"  id="user_id" name="user_id" value="<?php echo $user_id ?>">
			<input type="hidden" class="form-control" name="category_id" id="category_id" value="<?php echo $result['cat_id']; ?>">
              <div class="box-body">
			  	 <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Category Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="cat_name" name="cat_name" value ="<?php echo $result['category_name']; ?>" placeholder="Category Name" required>
                  </div>
                </div>
			  
			  	 <div class="form-group">
                  <label for="Cat_desc" class="col-sm-2 control-label">Category Description</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="cat_desc" name="cat_desc" value="<?php echo $result['category_desc']; ?>" placeholder="Category Description" required>
                  </div>
                </div>
			  </div>
			
				 <div class="form-group">
                  <label for="cat_image" class="col-sm-2 control-label">Category Image</label>

                 <div class="col-sm-10">
                    <div class="col-sm-10">
                    <input type="file" name="category_image">
                     <?php 
                     $result = $category->getImage($id);
                      foreach ($result as $row){;?> 
                    <img src="public/image/category/<?php echo $row['category_image'];?>" alt=" " height="150" width="150">
                    <?php }?>
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
  </div>
 
 
 
<script type="text/javascript" src="public/assets/js/libs/jquery-1.10.2.min.js"></script> 
    
<script type="text/javascript">
    
        $(function () {
        $('#edit_category').bind('submit', function (evt) {
          evt.preventDefault();
          var formData = new FormData($(this)[0]);
          $.ajax({
            type: 'post',
            url: 'update_category.php',
            data: formData,
              async: false,
              cache: false,
              contentType: false,
              enctype: 'multipart/form-data',
              processData: false,
            success: function (datas) {
              var data = $.trim(datas);
              if(data != 0){                        
                 window.location.href = 'category.php';
              }else{
                 document.getElementById("error").innerHTML = "category data unable updated";
              }			  
            }
          });
          return false;
        });
      });
	  </script>