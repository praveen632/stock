<?php 
include('include/includes.php');
$product = new Product();
$savedata['product_id'] = $_POST['product_id'];
$result = $product->saveproductattribute($savedata);
print_r($result);
?>