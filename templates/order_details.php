 <div class="content-wrapper">
     <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Order Details</h3>
              <a class="col_pro-1" href="order.php"><div class="btn btn-info">
                 Order List
              </div></a>
            </div>

          
            <form class="form-horizontal" role="form"  method="post" action="" id="edit_product">
             <div class="box-body">
             <div class="col-sm-12">
              <div class="col-sm-4">
                  <label for="name" control-label">Id:</label>
                  <div>
                     <?php echo $results['id']; ?>
                  </div>
              </div>            
        
            <div class="col-sm-4">
                <label for="Cat_desc" control-label">Payment Id:</label>
                  <div>
                  <?php echo $results['payment_id']; ?>
                  </div>
                </div>       

             <div class="col-sm-4">
                <label for="Cat_desc" control-label">Delivery Address:</label>
                  <div>
                  <?php echo $results['delivery_address']; ?>
                  </div>
                </div>
            </div>
           <div class="col-sm-12"></div>
           <div class="col-sm-12"></div>
           <div class="col-sm-12"></div>

            <div class="col-sm-12">
              <div class="col-sm-4">
                <label for="Cat_desc" control-label">Order Date:</label>
                  <div>
                  <?php echo $results['datetime']; ?>
                  </div>
                </div>
         

            <div class="col-sm-4">
                <label for="Cat_desc" control-label">Payment Type:</label>
                  <div >
                  <?php echo $results['payment_type']; ?>
                  </div>
                </div>          

            <div class="col-sm-4">
                <label for="Cat_desc" control-label">Total Price:</label>
                  <div>
                  <?php echo $results['total_price']; ?>
                  </div>
                </div>
            </div>

            <div class="col-sm-12">
                <label for="Cat_desc"  control-label">Status:</label>
                  <div>
                  <?php echo $results['status']; ?>
                  </div>
                </div>
                </div>
            
            </div>  

             <!--  <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Save</button>
              </div> -->
            </form>
  <section class="content">     
      <!-- /.row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Order Details</h3>

              <div class="box-tools">                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Order Id:</th>
                  <th>Product Name:</th>
                  <th>Number Of Quantity:</th>
                  <th>Product Unit Price:</th>
                  <th>Product Unit Quantity:</th>
                  <th>Total Price:</th>
               
                </tr>
                 <?php 
                    $seller_id = $results['id']; 
                    $orderlist = $order->orderDetailslist($seller_id);
                    foreach ($orderlist as $rows) { 
                      $count = count($rows);
                      ?>
                <tr>
                <th><?php echo $rows['order_id']; ?></th>
                <th><?php echo $rows['product_name']; ?></th>
                <th><?php echo $count; ?></th>
                <th><?php echo $rows['price']; ?></th>
                <th><?php echo $rows['quantity']; ?></th>
                <th><?php echo $rows['total_price']; ?></th>
                </tr>
                <?php } ?> 
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
          
          </div>
          </div>
 
 
   
