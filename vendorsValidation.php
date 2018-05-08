<?php
function ValidateVendors(){	
	$error_msg = "";
	
	if (isset($_POST['submit'])) {
		//checking vendorNo
		if(empty($_POST['vendorNo1'])){
			$error_msg = "You must input the vendorNo". "<br/>";			
		}
		else {
			$vendorNo1=$_POST['vendorNo1'];
			$vendorNo1_patern='^[0-9]*\.?[0-9]+^';
			if(!preg_match($vendorNo1_patern,$vendorNo1)){
				$error_msg .= "VendorNo must be a number". "<br/>";				
			}
			else{
				//check duplication
				require_once "getVendorNo.php";				
				if(!CheckVendorNoDuplication($vendorNo1)){
					$error_msg .= "VendorNo can not be a duplicated". "<br/>";				
				}
			}
		}
		//checking vendorName
		if(empty($_POST['vendorName'])){
			$error_msg .= "You must input the vendorName". "<br/>";
		}
		//checking address1
		if(empty($_POST['address1'])){
			$error_msg .= "You must input the address1". "<br/>";
		}
		//checking city
		if(empty($_POST['city'])){
			$error_msg .= "You must input the city". "<br/>";
		}
		//checking province
		if(empty($_POST['prov'])){
			$error_msg .= "You must input the province code". "<br/>";
		}
		else{
			$prov=$_POST['prov'];
			$prov_patern='^[a-zA-z]{2}^';
				if(!preg_match($prov_patern,$prov)){
					$error_msg .= "Province code must be most 2 letters". "<br/>";
				}		
		}

		//checking postal code
		if(empty($_POST['postCode'])){
			$error_msg .= "You must input the postal code". "<br/>";
		}
		else{ 	    
			$postalCode=$_POST['postCode'];
			$postalCode_patern='^\w{3,6}^';
				if(!preg_match($postalCode_patern,$postalCode)){
					$error_msg .= "Postal code must be most 6 numbers or letters". "<br/>";
				}		
			}
		//checking country code
		if(empty($_POST['country'])){
			$error_msg .= "You must input the country code". "<br/>";
		}
		else{ 	    
			$country=$_POST['country'];
			$country_patern='^[a-zA-z]{2}^';
				if(!preg_match($country_patern,$country)){
					$error_msg .= "Country code must be 2 letters". "<br/>";
				}		
			}
		//checking phone number
		if(empty($_POST['phone'])){
			$error_msg .= "You must input the phone number". "<br/>";
		}
		else{ 	    
			$phone=$_POST['phone'];
			$phone_patern='^\(?([0-9]{3})\)?[-]?([0-9]{3})[-]?([0-9]{4})^';
				if(!preg_match($phone_patern,$phone)){
					$error_msg .= "Phone number must be 10 digits". "<br/>";
				}		
			}
		//checking phone number
		if(!empty($_POST['fax'])){
			$fax=$_POST['fax'];
			$fax_patern='^\(?([0-9]{3})\)?[-]?([0-9]{3})[-]?([0-9]{4})^';
				if(!preg_match($fax_patern,$fax)){
					$error_msg .= "Fax number must be 10 digits". "<br/>";			
		}				
	}
	
	if ($error_msg=="") {
		return true;	}
	else{
		echo $error_msg;
		return false;		
	}
}
}
?>