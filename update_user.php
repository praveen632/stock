<?php
include('include/includes.php');
include('mail/class.phpmailer.php');
    $user = new User();
	$id = $_POST['user_id'];
	if($_POST['subcription_type']){
	$saveData['subcription_type'] = $_POST['subcription_type'];
	$saveData['status'] = $_POST['user_status'];
	$saveData['password'] = md5($_POST['password']);
	}else{
	$saveData['password'] = md5($_POST['password']);
	$saveData['status'] = $_POST['user_status'];			
	$saveData['comment'] = $_REQUEST['comment'];
	$target = "public/user_doc/";
	$uploadOk = 1;
	$Filename=basename($_FILES['doc_image']['name']);
	$ext1 = pathinfo($Filename, PATHINFO_BASENAME);
	$iparr = split("\.", $ext1);
    $file = $iparr[0] . '_' . rand() . '.' . $iparr[1] ;
	if(move_uploaded_file($_FILES['doc_image']['tmp_name'], $target. $file)) {
    echo "The file ". basename($_FILES['doc_image']['name']). " has been uploaded, and your information has been added to the directory";
	}
	else {
	    echo "Sorry, there was a problem uploading your file.";
	}
	$saveData['doc_image'] = $file;
	}
	$update_users = $user->update($id,$saveData);
	Utlityi::setMessage('success', $ln_successMsg);
	if($update_users > 0)
	{				
		echo 1;
	}else{
		echo 0;
	}


?>