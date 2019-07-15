<?php
include('include/includes.php');
include(DIR_COMMON_PATH.'header.php');
include(DIR_COMMON_PATH.'nav.php');
$order = new Order();
$id = $_GET['id'];
$orderlist = $order->orderDetails($id);

 $results = array(); 
 foreach ($orderlist[0] as $key => $value) {     
      $results[$key] = $value;    
  } 

include(DIR_TEMPLATE_PATH.'order_details.php');
include(DIR_COMMON_PATH.'footer.php');
?>