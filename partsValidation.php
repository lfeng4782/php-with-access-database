<?php
function ValidateParts(){
	$error_msg = "";

	if (isset($_POST['submit'])) {
		//checking description
		if(empty($_POST['description'])){
			$error_msg .= "You must input the description". "<br/>";			
		}

		//checking onHand
		if(empty($_POST['onHand'])){
			$error_msg .= "You must input the onHand number". "<br/>";			
		}
		else{
			$onHand=$_POST['onHand'];
			$onHand_patern='^[0-9]+^';
				if(!preg_match($onHand_patern,$onHand)){
					$error_msg .= "OnHand number must be whole number". "<br/>";					
				}		
		}

		//checking onOrder
		if(empty($_POST['onOrder'])){
			$error_msg .= "You must input the onOrder number";
		}
		else{
			$onOrder=$_POST['onOrder'];
			$onOrder_patern='^[0-9]+^';
				if(!preg_match($onOrder_patern,$onHand)){
					$error_msg .= "OnOrder number must be whole number". "<br/>";				
				}		
		}

		//checking cost
		if(empty($_POST['cost'])){
			$error_msg .= "You must input the cost". "<br/>";		
		}
		else{
			$cost=$_POST['cost'];
			$cost_patern='^[0-9]*\.?[0-9]+^';
				if(!preg_match($cost_patern,$onHand)){
					$error_msg .= "Cost must be a positive number". "<br/>";				
				}	
		}

		//checking list price
		if(empty($_POST['listPrice'])){
			$error_msg .= "You must select the list prices". "<br/>";			
		}
		else{			
			$listPrice=$_POST['listPrice'];
			$listPrice_patern='^[0-9]*\.?[0-9]+^';
				if(!preg_match($listPrice_patern,$onHand)){
					$error_msg .= "List Price must be a positive number". "<br/>";				
			}
		}		
	}
	
	if ($error_msg == ""){
		return true;
	}
	else{
		echo $error_msg;
		return false;		
	}
}
?>