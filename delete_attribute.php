<?php
include('include/includes.php');

   $attribute = new Attribute();             		       
	$id=$_POST['attribute_id'];		 		   
	 $result=$attribute->delete($id);
		 if ($result) {
		     	echo 1;		                            
		    } else {
		    	echo 0;		    	    
		    }   
		
?>