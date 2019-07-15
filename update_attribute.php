<?php
include('include/includes.php');
    $attribute = new Attribute();
	
	$id = $_POST['attribute_id'];
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
	$update_attribute = $attribute->update($id,$saveData);
	Utlityi::setMessage('success', $ln_successMsg);
	if($update_attribute>0)
	{				
		echo "1";
	}else{
		echo "0";
	}
?>