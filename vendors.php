<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Assignment5</title>
		<link rel="stylesheet" href="assignment5.css">    
	</head>

	<body>
		<main>
		<?php
			require_once "vendorsValidation.php";
			if(ValidateVendors()){
				$db = 'E:\\xampp\\htdocs\\A5-6\\a5.mdb';
				$conn = new COM('ADODB.connection');		
				if (!$conn)
				{
					echo "Database unreachable";
					exit();
				}				
				
				try
				{
					$conn->Open("Provider=Microsoft.Jet.OLEDB.4.0; Data Source=$db");					
				}
				catch (Exception $e)
				{
					echo 'Caught exception: ', $e->getMessage();
					exit();
				}			

				$vendorNo=$_POST['vendorNo1'];
				$vendorName=$_POST['vendorName'];
				$address1=$_POST['address1'];
				$address2=$_POST['address2'];
				$city=$_POST['city'];
				$prov=$_POST['prov'];
				$postCode=$_POST['postCode'];
				$country=$_POST['country'];
				$phone=$_POST['phone'];
				$fax=$_POST['fax'];			
				
				function CreateVendorsTableHeader()
				{
					$text = "<tr id='tableHeader'>";
					$text .= "<th>VendorNo</th>";
					$text .= "<th>VendorName</th>";
					$text .= "<th>Address1</th>";
					$text .= "<th>Address2</th>";
					$text .= "<th>City</th>";
					$text .= "<th>Prov</th>";
					$text .= "<th>PostCode</th>";
					$text .= "<th>Country</th>";
					$text .= "<th>Phone</th>";
					$text .= "<th>Fax</th>";					

					$text .= "</tr>";

					echo $text;
				}	
				
				function FillVendorsTable()
				{
					global $vendorNo,$vendorName,$address1,$address2,$city,$prov,$postCode,$country,$phone,$fax;
					
					$tableBodyText = "";			
					$tableBodyText  .= "<tr>";
					$tableBodyText .= "<td>$vendorNo</td>";
					$tableBodyText .= "<td>$vendorName</td>";		
					$tableBodyText .= "<td>$address1</td>";
					$tableBodyText .= "<td>$address2</td>";
					$tableBodyText .= "<td>$city</td>";
					$tableBodyText .= "<td>$prov</td>";
					$tableBodyText .= "<td>$postCode</td>";
					$tableBodyText .= "<td>$country</td>";
					$tableBodyText .= "<td>$phone</td>";
					$tableBodyText .= "<td>$fax</td>";
					$tableBodyText .= "</tr>";

					echo $tableBodyText;			
				}

				$address2_new = !empty($address2) ? "'$address2'" : "NULL";
				$fax_new = !empty($fax) ? "'$fax'" : "NULL";
				$sql = "INSERT INTO Vendors (VendorNo, VendorName, Address1, Address2, City, Prov, PostCode, Country, Phone, Fax)
					VALUES ('$vendorNo', '$vendorName', '$address1', $address2_new, '$city', '$prov', '$postCode', '$country', '$phone', $fax_new)";
				
				try
				{				
					$rs = $conn->Execute($sql);				
					echo "<h2>You entered the following data, and these data have been successfully added to the Vendors table.</h2>";	
					echo "<table style='border: 1px solid black;margin: 2em auto; width:80%;font-size:120%'>";
					echo "<thead>";	
					CreateVendorsTableHeader();	
					echo "</thead>";
					echo "<tbody>";			
					FillVendorsTable();
					echo "</tbody>";
					echo "</table>";
				}
				catch (Exception $e)
				{
					echo 'Caught exception: ', $e->getMessage();
					exit();
				}
			}
			else
			{
				echo 'validation error!';
			}
			
	?>
		</main>
	</body>
</html>

	