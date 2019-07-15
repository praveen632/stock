<?php
include('include/includes.php');
   $product = new Product();     
	$id=$_POST['product_id'];	 		   
	 $result=$product->delete($id);
		 if ($result) {
		     	echo 1;		                            
		    } else {
		    	echo 0;		    	    
		    }   
		
?>