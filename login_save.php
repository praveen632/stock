<?php
include('include/includes.php');
	if (!empty($_POST['username']) && !empty($_POST['password'])) {
		$user = new User();
        $username = $_POST['username'];
        $pass = $_POST['password'];
	    $login = $user->login($pass,$username);
		if($login) 
		{			
		    $_SESSION['user_data']=$login[0];
		    echo '1';			
		}
	    else 
		{
			echo '0';			
		}
		
	}
	else
	{
		 $type="";
		 $message = "";
	}
	if(isset($_POST['remember']))
	{
		$hour = time() + 3600;
		setcookie('login_data', serialize($login), $hour);
	}
	?>