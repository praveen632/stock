<?php
include('include/includes.php');
$user = new User();
$id_pass = $_GET['key'];
$users = base64_decode($id_pass);
$user->veryfieduser($users);
include(DIR_TEMPLATE_PATH.'thankyou.php');
//include(DIR_COMMON_PATH.'footer.php');
?>