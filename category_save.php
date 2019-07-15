<?php
include('include/includes.php');
    $category = new Category();
    $saveData = array();
    $date = date('Y-m-d H:i:s');
	$saveData['category_name'] = $_POST['cat_name'];
	$saveData['category_desc'] = $_POST['cat_desc'];
	$saveData['user_id'] = $_POST['user_id'];
	$target = "public/image/category/";
	$uploadOk = 1;
	$Filename=basename($_FILES['category_image']['name']);
	$ext1 = pathinfo($Filename, PATHINFO_BASENAME);
	$iparr = split("\.", $ext1);
    $file = $iparr[0] . '_' . rand() . '.' . $iparr[1] ;
	if(move_uploaded_file($_FILES['category_image']['tmp_name'], $target. $file)) {
    echo "The file ". basename($_FILES['category_image']['name']). " has been uploaded, and your information has been added to the directory";
	}
	else {
	    echo "Sorry, there was a problem uploading your file.";
	}
	$saveData['category_image'] = $file;
	$add_category = $category->addCategory($saveData);
	Utlityi::setMessage('success', $ln_successMsg);
	if($add_category>0)
	{				
		echo "1";
	}else{
		echo "0";
	}
?>