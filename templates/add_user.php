
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
     <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add User</h3>
            <a id="sell_add" style="color: #FFF;" href="get_user.php"><div class="btn btn-info" style="margin: 5px 30px 5px;">
                     User
                  </div></a>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" role="form"  method="post" id="add_user">
              <div class="box-body">
			  	 <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Full Name">
                  </div>
                </div>
			  
			  
			  
			   <div class="form-group">
                  <label for="user_name" class="col-sm-2 control-label">User Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="user_name" id="user_name" placeholder="User Name">
                  </div>
                </div>
				 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="user_email" id="user_email" placeholder="Email">
                  </div>
                </div>
				
			<!-- 	 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="user_password" id="user_password" placeholder="Password">
                  </div>
                </div> -->
				
				 <div class="form-group">
                  <label for="user_phone" class="col-sm-2 control-label">Phone</label>

                  <div class="col-sm-10">
                    <input type="" class="form-control" name="user_phone" id="user_phone" placeholder="Phone">
                  </div>
                </div>
			   <?php $result= $user->getusername(); ?> 
				  <div class="form-group">
              <label for="user_type" class="col-sm-2 control-label">User Type</label>
            <div class="col-sm-10">
               <select class="form-control select2" style="width: 100%;" name="usertype"  id="user_type">
               <option value="">Select</option>
               <?php  foreach ($result as $row) { if ($row['id'] > '1') {
                ?>
                <option value="<?php echo $row['id'];?>"><?php echo $row['display_name']; ?></option>                     
                <?php } } ?>
                </select>
              </div>
            </div>
             
               <div id="saller_form">
                <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">GST Number</label>
                   <div class="col-sm-10">
                  <input type="text" class="form-control" id="gstnum" name="gstnum" placeholder="GST Number">
                </div>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile" class="col-sm-2 ">Attac.(GST Crtificate)</label>
                  <div class="col-sm-10">
                 <input type="file" name="gstcertificate" id="gstcertificate">
                 </div>
                 </div>
                  <div class="form-group">
                  <label for="exampleInputFile" class="col-sm-2 ">Attac.(GST Address)</label>
                  <div class="col-sm-10">
                 <input type="file" name="gstAddress" id="gstAddress">
                 </div>
                 </div>
                  <div class="form-group">
                  <label for="exampleInputFile" class="col-sm-2 control-label">Attac.(GST)</label>
                  <div class="col-sm-10">
                 <input type="file" name="gstaddress1" id="gstaddress1">
                 </div>
                 </div>
                  <div class="form-group">
                  <label for="exampleInputFile" class="col-sm-2 control-label">Attac.(GST)</label>
                  <div class="col-sm-10">
                 <input type="file" name="gstaddress2" id="gstaddress2">
                 </div>
                 </div>
                 <!--  <input type="file" id="exampleInputFile">
                   <input type="file" id="exampleInputFile">
                  <input type="file" id="exampleInputFile"> 
                   -->
                </div>      

<!-- 
                <div id="buyer_form">
                <div class="form-group">
                  <label for="exampleInputEmail1" class="col-sm-2 control-label">GST Number</label>
                   <div class="col-sm-10">
                  <input type="text" class="form-control" id="gstnum" placeholder="GST Number">
                </div>
                </div>               
                </div>  -->                         
              
                 


				 <div class="form-group">
                  <label for="address_1" class="col-sm-2 control-label">Address</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="user_address1" id="user_address1" placeholder="Address">
                  </div>
                </div>
                <div class="form-group">
                  <label for="address_1" class="col-sm-2 control-label">Street</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="street" id="street" placeholder="Street">
                  </div>
                </div>
                <div class="form-group">
                  <label for="address_1" class="col-sm-2 control-label">City</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="city" id="city" placeholder="City">
                  </div>
                </div>              

                <div class="form-group">
                  <label for="address_1" class="col-sm-2 control-label">State</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="state" id="state" placeholder="State">
                  </div>
                </div>
                <div class="form-group">
                  <label for="address_1" class="col-sm-2 control-label">Pin Code</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pin Code">
                  </div>
                </div>

				
               <!--  <div class="form-group">
                  <label for="Status" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="user_status" id="user_status">
                    <option selected="selected">Select</option>
                  <option selected="selected" value="1">Active</option>
                  <option value="-1">Inactive</option>
                  <option value="0">Un Approved</option>
               
                </select>
                  </div> -->


                   <?php $result= $user->getstatus(); ?> 
               <div class="form-group">
                  <label for="Status" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-10">
                   <select class="form-control select2" style="width: 100%;" name="user_status"  id="user_status">
                   <?php  foreach ($result as $row){?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['display_name']; ?></option>                     
                   <!--   <option value="1">Seller</option>
                     <option value="2">Buyer</option>
                     <option value="3">Third Party</option> -->
                <?php } ?>
                </select>
                  </div>
                </div>



                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
                <button type="submit" name="submit" class="btn btn-info pull-right">Submit</button>
              </div>

             



              <!-- /.box-footer -->
            </form>
          </div>
  </div>


                
             
  
 <script type="text/javascript">    
         $(function () {
        $('#add_user').submit(function (evt) {
           evt.preventDefault();
           var formData = new FormData($(this)[0]);
          $.ajax({
             type: 'post',
             url: 'user_save.php',
             data: formData,
             async: false,
             cache: false,
             contentType: false,
             enctype: 'multipart/form-data',
             processData: false,
            success: function (datas) {
              var data = $.trim(datas);
              if(data == 1){                        
                 window.location.href = 'get_user.php';
              }else{
                 document.getElementById("error").innerHTML = "User data unable updated";
              }			  
            }
          });
          return false;
        });
      });


        $(function () {
                                   
                   $('#saller_form').hide();            
                   $('#user_type').on('change',function(e){                   
                      if($('#user_type').val() == '2'){
                           $('#buyer_form').hide();
                           $('#saller_form').show();
                      }else{
                         $('#saller_form').hide();
                      }
            });
      });
      </script>