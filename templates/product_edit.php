 
 <div class="content-wrapper">
     <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Product</h3>
              <a class="col_pro-1" href="product.php"><div class="btn btn-info">
                 Product List
              </div></a>
            </div>

          
            <form class="form-horizontal" role="form"  method="post" action="" id="edit_product">
            <input type="hidden" class="form-control" name="product_id" id="product_id" value="<?php echo $results['product_id']; ?>">
            <div class="box-body">
              <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Saller Name</label>
                  <div class="col-sm-10">
                     <?php echo $results['user_name']; ?>
                  </div>
              </div>

            <div class="form-group">
              <label for="name" class="col-sm-2 control-label">Product Name</label>
                  <div class="col-sm-10">
                    <?php echo $results['product_name']; ?>
                  </div>
                </div>
        
            <div class="form-group">
                <label for="Cat_desc" class="col-sm-2 control-label">Product Description</label>
                  <div class="col-sm-10">
                    <?php echo $results['product_desc']; ?>
                  </div>
                </div>
            </div>
      
           <div class="form-group">
              <label for="attribute_image" class="col-sm-2 control-label">Product Image</label>
              <div class="col-sm-10">
                    <input type="file" name="product_image">
                     <?php 
                     $result = $product->getProductimage($id);
                      foreach ($result as $row){ ?> 
                    <img src="public/image/product/<?php echo $row['product_image'];?>" alt=" " height="150" width="150">
                    <?php }?>
                  </div>
           </div>

           <?php $result= $product->getcategory();?> 
           <div class="form-group">
           <label for="Cat_desc" class="col-sm-2 control-label">Category</label>
           <?php foreach ($result as $row) { 
                $id = $row['cat_id'];
                $result_uni = $product->getattribute($id);
                $checkbox = explode(",", $results['attribute_name']);                 
            ?>                  
            <div class="col-sm-10">
              <?php echo $row['category_name']; ?><br>
              <?php foreach ($result_uni as $row) { ?>               
              <input type="checkbox" disabled readonly name="attribute_id[]" value="<?php echo $row['attribute_id']; ?>"
              <?php if(in_array($row['attribute_name'], $checkbox)) {?> checked="checked"; <?php } ?>>&nbsp;<?php echo $row['attribute_name']; ?> &nbsp;&nbsp;<?php }?> 
            </div>
              <?php } ?>
          </div>
            

         
          
            
           <!--  <div class="form-group">
                  <label for="Cat_desc" class="col-sm-2 control-label">Third Party Status</label>

                  <div class="col-sm-10">
                     <?php //echo $results['third_party_statu']; ?>
                  </div>
            </div> -->


            <?php $result = $product->getstatus();

            if($results['user_type'] == '1'){

            }else{?>
            <div class="form-group">
                  <label for="Cat_desc" class="col-sm-2 control-label">Admin Status</label>

                 <div class="col-sm-10">
                    <select  style='width: 100%;' name="display_name" class="form-control" id="user_type">;
                  <option selected="selected" value="0">Pending</option>
                  <option value="-1">Un Approved</option>
                  <option value="1">Approved</option>  
                    </select>
                  </div>
            </div>
            <?php }?>

          <?php 
           if($results['user_type'] != '1'){?>
           <div id="approved_form"> 
                <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Third Party DOC</label>
                   <div class="col-sm-10">
                  <input type="file" id="document" value="" name="document" >
                  <a href="http://localhost/stock/product_edit.jpg" download><img src="public/user_doc/<?php echo $results['document'];?>" alt=" " height="0" width="0"/><?php echo $results['document']; ?></a>
                  
                </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Comment</label>
                   <div class="col-sm-10">
                  <input type="text" class="form-control" id="comment" name="comment" placeholder="Comment" value="<?php echo $results['comment']; ?>">
                </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Final Price</label>
                   <div class="col-sm-10">
                  <input type="text" class="form-control" id="final_price" name="final_price" placeholder="Comment" value="<?php echo $results['final_price']; ?>" required>
                </div>
                </div>
                </div>
                <?php }?>

              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Save</button>
              </div>
            </form>
           
          </div>
          </div>
  </div>
 
   
<script type="text/javascript">
    
        $(function () {
        $('#edit_product').bind('submit', function (evt) {
           evt.preventDefault();
          var formData = new FormData($(this)[0]);
          $.ajax({
            type: 'post',
            url: 'update_product.php',
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
                 document.getElementById("error").innerHTML = "Product data unable updated";
              }       
            }
          });
          return false;
        });
      });

        $(function () {
                                   
                   $('#approved_form').hide();            
                   $('#user_type').on('change',function(e){                   
                      if($('#user_type').val() != '0'){
                           $('#buyer_form').hide();
                           $('#approved_form').show();
                      }else{
                         $('#approved_form').hide();
                      }
            });
      });

        $('a > img').each(function(){
        var $this = $(this);
        $this.parent('a').attr('href', $this.attr('src'));
      });
</script>