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
			require_once "partsValidation.php";
			if(ValidateParts()){
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
				
				$partId=$_POST['partId'];
				$vendorNo=$_POST['vendorNo'];			
				$description=$_POST['description'];
				$onHand=$_POST['onHand'];
				$onOrder=$_POST['onOrder'];
				$cost=$_POST['cost'];
				$listPrice=$_POST['listPrice'];
				
				function CreatePartsTableHeader()
				{
					$text = "<tr id='tableHeader'>";
					$text .= "<th>PartID</th>";
					$text .= "<th>VendorNo</th>";
					$text .= "<th>Description</th>";
					$text .= "<th>OnHand</th>";
					$text .= "<th>OnOrder</th>";
					$text .= "<th>Cost</th>";
					$text .= "<th>ListPrice</th>";	

					$text .= "</tr>";

					echo $text;
				}	
				
				function FillPartsTable()
				{
					global $partId,$vendorNo,$description,$onHand,$onOrder,$cost,$listPrice;
					
					$tableBodyText = "";			
					$tableBodyText  .= "<tr>";
					$tableBodyText .= "<td>$partId</td>";
					$tableBodyText .= "<td>$vendorNo</td>";		
					$tableBodyText .= "<td>$description</td>";
					$tableBodyText .= "<td>$onHand</td>";
					$tableBodyText .= "<td>$onOrder</td>";
					$tableBodyText .= "<td>$cost</td>";
					$tableBodyText .= "<td>$listPrice</td>";
					$tableBodyText .= "</tr>";

					echo $tableBodyText;			
				}			
				
				$sql = "INSERT INTO Parts (VendorNo, Description, OnHand, OnOrder, Cost, ListPrice)
					VALUES ('{$vendorNo}', '{$description}', '{$onHand}', '{$onOrder}', '{$cost}', '{$listPrice}')";
				
				$sql1 = "SELECT MAX(PartID) FROM Parts";
				
				try
				{			
					$rs = $conn->Execute($sql);			
					$rs = $conn->Execute($sql1);
					$partId = $rs->Fields[0]->value;
					echo "<h2>You entered the following data, and these data have been successfully added to the Parts table.</h2>";	
					echo "<table style='border: 1px solid black;margin: 2em auto; width:80%;font-size:120%'>";
					echo "<thead>";	
					CreatePartsTableHeader();	
					echo "</thead>";
					echo "<tbody>";			
					FillPartsTable();
					echo "</tbody>";
					echo "</table>";
				}
				catch (Exception $e)
				{
					echo 'Caught exception: ', $e->getMessage();
					exit();
				}
			}
			
	?>
		</main>
	</body>
</html>
