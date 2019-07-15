<?php
include('include/includes.php');
include(DIR_COMMON_PATH.'header.php');
include(DIR_COMMON_PATH.'nav.php');
$category = new Category();
$id = $_GET['cat_id'];
$categoryList = $category->getcategories($id);
 $result = array(); 
 foreach ($categoryList[0] as $key => $value) {     
      $result[$key] = $value;    
  } 
include(DIR_TEMPLATE_PATH.'category_edit.php');
include(DIR_COMMON_PATH.'footer.php');
?>