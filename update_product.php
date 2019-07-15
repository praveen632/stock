<?php
include('include/includes.php');
    $product = new Product();			
	$id = $_POST['product_id'];
	//$saveData['category_id'] = $_POST['category_id'];
	//$attribute_id = implode(",", $_POST['attribute_id']); 
	$target = "public/image/product/";
	$uploadOk = 1;
	$Filename=basename($_FILES['product_image']['name']);
	$ext1 = pathinfo($Filename, PATHINFO_BASENAME);
	$iparr = split("\.", $ext1);
	$file = $iparr[0] . '_' . rand() . '.' . $iparr[1] ;
	if(move_uploaded_file($_FILES['product_image']['tmp_name'], $target. $file)) {
	echo "The file ". basename($_FILES['product_image']['name']). " has been uploaded, and your information has been added to the directory";
	}
	else {
	    echo "Sorry, there was a problem uploading your file.";
	}
	$saveData['product_image'] = $file;
	$saveData['final_price'] = $_POST['final_price'];
	$saveData['comment'] = $_REQUEST['comment'];
	$saveData['approvel_time'] = $_REQUEST['approvel_time'];
	$target = "public/user_doc/";
	$uploadOk = 1;
	$Filename=basename($_FILES['document']['name']);
	$ext1 = pathinfo($Filename, PATHINFO_BASENAME);
	$iparr = split("\.", $ext1);
    $file = $iparr[0] . '_' . rand() . '.' . $iparr[1] ;
	if(move_uploaded_file($_FILES['document']['tmp_name'], $target. $file)) {
    echo "The file ". basename($_FILES['document']['name']). " has been uploaded, and your information has been added to the directory";
	}
	else {
	    echo "Sorry, there was a problem uploading your file.";
	}
	$saveData['document'] = $file;	
	$update_product = $product->update($id,$saveData,$attribute_id);
	Utlityi::setMessage('success', $ln_successMsg);
	if($update_product>0)
	{				
		echo "1";
	}else{
		echo "0";
	}
	

?>