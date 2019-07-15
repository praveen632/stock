<?php
include('include/includes.php');
include('mail/class.phpmailer.php');
	        $user = new User();
            $saveData['name'] = $_REQUEST['name'];
			$saveData['username'] = $_REQUEST['user_name'];
            $saveData['email'] = $_REQUEST['user_email'];
			// $password = $_REQUEST['user_password'];
			// $saveData['password'] = md5($password);
			$saveData['phone'] = $_REQUEST['user_phone'];
			$saveData['address'] = $_REQUEST['user_address1'];
			$saveData['street'] = $_REQUEST['street'];
			$saveData['city'] = $_REQUEST['city'];
			$saveData['state'] = $_REQUEST['state'];
			$saveData['pin_code'] = $_REQUEST['pincode'];
			$usertype = $_REQUEST['usertype'];
		    $file_name = '';
            if($usertype == '1'){
               $saveData['gstname'] = $_REQUEST['gstnum'];
               if(!$_FILES["gstcertificate"]['error'] > 0){
	                $file_gst = $_FILES["gstcertificate"]['name'];
	                //$file_name .=$_FILES["gstcertificate"]['name'];
	                $files = $_FILES["gstcertificate"]["tmp_name"];
	                $target_dir = "public/assets/user_files/";
					$target_file = $target_dir . basename($file_gst);
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					// Check if image file is a actual image or fake image
					move_uploaded_file($files, $target_file);
			}else{
				return false;
			}			 
				$files_add = $_FILES["gstAddress"]['name'];
				$files = $_FILES["gstAddress"]["tmp_name"];
				//$file_name .=','.$_FILES["gstAddress"]['name'];
				$target_dir = "public/assets/user_files/";
				$target_file = $target_dir . basename($files_add);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image
				move_uploaded_file($files, $target_file);
			
				$files_add1 = $_FILES["gstaddress1"]['name'];
				$files = $_FILES["gstaddress1"]["tmp_name"];
				//$file_name .=','.$_FILES["gstaddress1"]['name'];
				$target_dir = "public/assets/user_files/";
				$target_file = $target_dir . basename($files_add1);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image
				move_uploaded_file($files, $target_file);
			
				$files_add2 = $_FILES["gstaddress2"]['name'];
				$files = $_FILES["gstaddress2"]["tmp_name"];
				//$file_name .=','.$_FILES["gstaddress2"]['name'];
				$target_dir = "public/assets/user_files/";
				$target_file = $target_dir . basename($files_add2);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image
				move_uploaded_file($files, $target_file);

              $saveData['gstcertificate'] = $file_gst;
              $saveData['att_address'] = $files_add;
              $saveData['att_address1'] = $files_add1;
              $saveData['att_address2'] = $files_add2;

			 $saveData['user_type'] = $_REQUEST['usertype'];
		     //$saveData['user_file'] = $file_name;
            }else{
            	$saveData['user_type'] = $_REQUEST['usertype'];
            }
			$saveData['status'] = $_REQUEST['user_status'];			
			$data = $user->addUser($saveData);
			// Utlityi::setMessage('success', $ln_successMsg);
			//print_r($email);
			if($data)
			{				
				echo "1";
			}else{
				echo "0";
			}
	?>