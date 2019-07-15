<?php
include('include/includes.php');
include(DIR_COMMON_PATH.'header.php');
include(DIR_COMMON_PATH.'nav.php');
$user = new User();
include(DIR_TEMPLATE_PATH.'add_user.php');
include(DIR_COMMON_PATH.'footer.php');
?>