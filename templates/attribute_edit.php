 <?php
    $user_id = $_SESSION['user_data']['id'];    
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
     <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Attribute</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" role="form"  method="post" action="" id="edit_attribute">
            <input type="hidden"  id="user_id" name="user_id" value="<?php echo $user_id ?>">
			<input type="hidden" class="form-control" name="attribute_id" id="attribute_id" value="<?php echo $result['attribute_id']; ?>">
              <div class="box-body">
			  	 <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Attribute Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="attribute_name" name="attribute_name" value ="<?php echo $result['attribute_name']; ?>" placeholder="Attribute Name" required>
                  </div>
                </div>
			  
			  	 <div class="form-group">
                  <label for="Cat_desc" class="col-sm-2 control-label">Attribute Description</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="attribute_desc" name="attribute_desc" value="<?php echo $result['attribute_desc']; ?>" placeholder="Attribute Description" required>
                  </div>
                </div>
			  </div>
			
				 <div class="form-group">
                  <label for="attribute_image" class="col-sm-2 control-label">Attribute Image</label>
                 
                  <div class="col-sm-10">
                    <input type="file" name="attribute_image">
                     <?php 
                     $result = $attribute->getImage($id);
                      foreach ($result as $row){?> 
                    <img src="public/image/attribute/<?php echo $row['attribute_image'];?>" alt=" " height="150" width="150">
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
        $('#edit_attribute').bind('submit', function (evt) {
          evt.preventDefault();
          var formData = new FormData($(this)[0]);
          $.ajax({
            type: 'post',
            url: 'update_attribute.php',
            data: formData,
              async: false,
              cache: false,
              contentType: false,
              enctype: 'multipart/form-data',
              processData: false,
            success: function (datas) {
              var data = $.trim(datas);
              if(data != 0){                        
                 window.location.href = 'attribute.php';
              }else{
                 document.getElementById("error").innerHTML = "Attribute data unable updated";
              }			  
            }
          });
          return false;
        });
      });
	  </script>

