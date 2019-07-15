<?php
include('include/includes.php');
    $product = new Product();
    $saveData = array();
    $date = date('Y-m-d H:i:s');
    $id = $_POST['attribute_id'];
    $ids = implode(',', $id); 
	$saveData['product_name'] = $_POST['product_name'];
	$saveData['product_desc'] = $_POST['product_desc'];
	$saveData['category_id'] = $_POST['category_id'];
	$saveData['seller_id'] = $_POST['user_id'];

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
	$add_product = $product->addProduct($saveData, $ids);
	Utlityi::setMessage('success', $ln_successMsg);
	if($add_product>0)
	{				
		echo "1";
	}else{
		echo "0";
	}
?>