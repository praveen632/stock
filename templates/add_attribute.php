  <?php
    $user_id = $_SESSION['user_data']['id'];    
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
     <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Attribute</h3>
            <a style="color: #FFF;" href="attribute.php"><div class="btn btn-info " style="margin: 5px 30px 5px;">
                 Attribute List
              </div></a>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" role="form"  method="post" action="" id="add_attribute">
              <div class="box-body">
              <input type="hidden"  id="user_id" name="user_id" value="<?php echo $user_id ?>">
			  	 <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Attribute Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="attribute_name" name="attribute_name" placeholder="Attribute Name" required>
                  </div>
                </div>
			  
			  	 <div class="form-group">
                  <label for="Cat_desc" class="col-sm-2 control-label">Attribute Description</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="attribute_desc" name="attribute_desc" placeholder="Attribute Description" required>
                  </div>
                </div>
			  </div>
			
				 <div class="form-group">
                  <label for="cat_image" class="col-sm-2 control-label">Attribute Image</label>

                  <div class="col-sm-10">
                    <input type="file" name="attribute_image">
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
        $('#add_attribute').submit(function (evt) {
          evt.preventDefault();
          var formData = new FormData($(this)[0]);
          $.ajax({
              type: 'post',
              url: 'attribute_save.php',
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
                 document.getElementById("error").innerHTML = "Attribute is not able to Added";
              }	
              			  
            }
          });
          return false;
        });
      });
</script>
 