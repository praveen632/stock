 <?php  
   $result_status= $user->getstatus();

  ?>
<div class="content-wrapper">
     <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update User</h3>
            <a id="sell_add" style="color: #FFF;" href="get_user.php"><div class="btn btn-info" style="margin: 5px 30px 5px;">
                     User List
                  </div></a>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" role="form"  method="post" action="" id="add_user">
            <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $result['id']; ?>">
              <div class="box-body">
             <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>                  
                <div class="col-sm-10">
                 <?php echo $result['name']; ?>
                </div>
              </div>        

              <div class="form-group">
                  <label for="user_name" class="col-sm-2 control-label">User Name</label>
                  <div class="col-sm-10">
                     <?php echo $result['username']; ?>
                  </div>
              </div>

             <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                     <?php echo $result['email']; ?>
                  </div>
              </div>
        
              <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="user_password" placeholder="Password" value="<?php echo $result['password']; ?>">
                  </div>
                </div>
        
              <div class="form-group">
                  <label for="user_phone" class="col-sm-2 control-label">Phone</label>
                  <div class="col-sm-10">
                     <?php echo $result['phone']; ?>
                  </div>
                </div>

                <?php $ids = $result['user_type'];
                $results = $user->getuser_type($ids);?>
                <div class="form-group">
                  <label for="user_type" class="col-sm-2 control-label">User Type</label>
                  <div class="col-sm-10">
                  <?php echo $results[0]['display_name']; ?>
                  </div>
                </div>
      
            <?php        
            if($result['user_type'] == '1'){
              
            }else{?>             
                <div class="form-group">
                  <label for="Status" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="user_status" id="user_type_id" value="<?php echo $result['status']; ?>">
                  <!-- <option selected="selected" value="0">Pending</option>
                  <option value="-1">Un Approved</option>
                  <option value="1">Approved</option> -->
               <?php foreach ($result_status as $row) { ?>
                  <option value="<?php echo $row['id']; ?>" <?php if($row['id']==$result['status']){ echo"selected"; } ?>><?php echo $row['display_name']; ?></option>
                  <?php }; ?>
                </select>
                  </div>
                </div>
             <?php }?>

            <?php if($result['user_type'] == '2'){?>
           <div id="approved_form"> 
                <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Third Party DOC</label>
                   <div class="col-sm-10">
                  <input type="file" id="doc_image" value="" name="doc_image">
                  <a href="http://localhost/stock/user_edit.jpg" download><img src="public/user_doc/<?php echo $result['doc_image'];?>" alt=" " height="0" width="0"/><?php echo $result['doc_image']; ?></a>
                  
                </div>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Comment</label>
                   <div class="col-sm-10">
                  <input type="text" class="form-control" id="comment" name="comment" placeholder="Comment" value="<?php echo $result['comment']; ?>" required>
                </div>
                </div>
                </div>
                <div class="form-group">
                  <label for="user_phone" class="col-sm-2 control-label">GST Name</label>
                  <div class="col-sm-10">
                     <?php echo $result['gstname']; ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="user_phone" class="col-sm-2 control-label">GST Certificate</label>
                  <div class="col-sm-10">
                     <?php echo $result['gstcertificate']; ?>
                  </div>
                </div>
                 <?php }else{}?>

               <?php if($result['user_type'] == '3'){?>
                <div id=""> 
                <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">Subcription</label>
                   <div class="col-sm-10">
                  <input type="radio" id="premium" name="subcription_type" value="premium">Premium &nbsp;&nbsp;
                  <input type="radio" id="nonpremium" name="subcription_type" value="nonpremium" checked>Nonpremium
                </div>
                </div>
                </div>
                <div class="form-group">
                  <label for="user_phone" class="col-sm-2 control-label">GST Name</label>
                  <div class="col-sm-10">
                     <?php echo $result['gstname']; ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="user_phone" class="col-sm-2 control-label">GST Certificate</label>
                  <div class="col-sm-10">
                     <?php echo $result['gstcertificate']; ?>
                  </div>
                </div>
                <?php }else{}?>

              <!-- /.box-body -->
              <div class="box-footer">
                
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
  </div>
  
 
<script type="text/javascript">
    
        $(function () {
        $('#add_user').bind('submit', function (evt) {
          evt.preventDefault();
          var formData = new FormData($(this)[0]);
          $.ajax({
            type: 'post',
            url: 'update_user.php',
            data: formData,
              async: false,
              cache: false,
              contentType: false,
              enctype: 'multipart/form-data',
              processData: false,
            success: function (datas) {
              var data = $.trim(datas);
              console.log(data);
              if(data != 0){                        
                // window.location.href = 'get_user.php';
              }else{
                 document.getElementById("error").innerHTML = "User data unable updated";
              }       
            }
          });
          return false;
        });
      });


        $(function () {
                                   
                   $('#approved_form').hide();            
                   $('#user_type_id').on('change',function(e){                   
                      if($('#user_type_id').val() == '1'){
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
 