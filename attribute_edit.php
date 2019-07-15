<?php
include('include/includes.php');
include(DIR_COMMON_PATH.'header.php');
include(DIR_COMMON_PATH.'nav.php');

$attribute = new Attribute();

$id = $_GET['attribute_id'];
// $target = "public/image/attribute/";
// 	$target = $target . basename($_FILES['attribute_image']['name']);
// 	$uploadOk = 1;
// 	//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// 	$Filename=basename($_FILES['attribute_image']['name']) . microtime();
// 	if(move_uploaded_file($_FILES['attribute_image']['tmp_name'], $target)) {
//     echo "The file ". basename($_FILES['attribute_image']['name']). " has been uploaded, and your information has been added to the directory";
// 	}
// 	else {
// 	    echo "Sorry, there was a problem uploading your file.";
// 	}
// 	//$Filename = 'attribute_image'.'cat_id'.'.jpg';
// 	$saveData['attribute_image'] = $Filename;

$attributeList = $attribute->edit($id);

 $result = array(); 
 foreach ($attributeList[0] as $key => $value) { 
    
      $result[$key] = $value; 
   
  } 
include(DIR_TEMPLATE_PATH.'attribute_edit.php');
include(DIR_COMMON_PATH.'footer.php');
?>