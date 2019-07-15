<?php
include('include/includes.php');
    $category = new Category();
   // $date = date('Y-m-d H:i:s');
	
	$id = $_POST['category_id'];
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
	$update_category = $category->update($id,$saveData);
	Utlityi::setMessage('success', $ln_successMsg);
	if($update_category>0)
	{				
		echo "1";
	}else{
		echo "0";
	}
?>