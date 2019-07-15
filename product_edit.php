<?php
include('include/includes.php');
include(DIR_COMMON_PATH.'header.php');
include(DIR_COMMON_PATH.'nav.php');
$product = new Product();
$id = $_GET['product_id'];
$productList = $product->edit($id);
 $results = array();
 //print_r($results); 
 foreach ($productList[0] as $key => $value) {  
      $results[$key] = $value;

  } 
include(DIR_TEMPLATE_PATH.'product_edit.php');
include(DIR_COMMON_PATH.'footer.php');
?>