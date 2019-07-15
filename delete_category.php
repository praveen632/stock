<?php
include('include/includes.php');
   $category = new Category();             		       
	$id=$_POST['cat_id'];		 		   
	 $result=$category->delete($id);
		 if ($result) {
		     	echo 1;		                            
		    } else {
		    	echo 0;		    	    
		    }   
		
?>