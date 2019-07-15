<?php
include('include/includes.php');
    $attribute = new Attribute();
    $saveData = array();
    $date = date('Y-m-d H:i:s');
	$saveData['attribute_name'] = $_POST['attribute_name'];
	$saveData['attribute_desc'] = $_POST['attribute_desc'];
	$saveData['user_id'] = $_POST['user_id'];
	$target = "public/image/attribute/";
	$uploadOk = 1;
	$Filename=basename($_FILES['attribute_image']['name']);
	$ext1 = pathinfo($Filename, PATHINFO_BASENAME);
	$iparr = split("\.", $ext1);
    $file = $iparr[0] . '_' . rand() . '.' . $iparr[1] ;
	if(move_uploaded_file($_FILES['attribute_image']['tmp_name'], $target. $file)) {
    echo "The file ". basename($_FILES['attribute_image']['name']). " has been uploaded, and your information has been added to the directory";
	}
	else {
	    echo "Sorry, there was a problem uploading your file.";
	}
	$saveData['attribute_image'] = $file;
	$add_attribute = $attribute->addAttribute($saveData);
	print_r($add_attribute);
	Utlityi::setMessage('success', $ln_successMsg);
	if($add_attribute>0)
	{				
		echo "1";
	}else{
		echo "0";
	}
?>