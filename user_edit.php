<?php
include('include/includes.php');
include(DIR_COMMON_PATH.'header.php');
include(DIR_COMMON_PATH.'nav.php');

$user = new User();

$id = $_GET['user_id'];

$userList = $user->getUsers($id);

 $result = array(); 
 foreach ($userList[0] as $key => $value) { 
    
      $result[$key] = $value; 
   
  } 



include(DIR_TEMPLATE_PATH.'user_edit.php');
include(DIR_COMMON_PATH.'footer.php');
?>