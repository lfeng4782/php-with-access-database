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
			$db = 'E:\\xampp\\htdocs\\A5-5\\a5.mdb';
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
			
			$vendorNoSelected=$_POST['vendorNo2'];			
			$sql="SELECT Parts.PartID, Vendors.VendorNo, Vendors.VendorName, Parts.Description ".
			"FROM Vendors INNER JOIN Parts ON Vendors.VendorNo = Parts.VendorNo ".
			"WHERE (((Vendors.VendorNo)=$vendorNoSelected))";					
			
				try
				{
					$rs= $conn->Execute($sql);
					if (!$rs->EOF){	
						echo "<h2>Your query is as following.</h2>";
						echo "<table style='border: 1px solid black;margin: 2em auto; width:80%;font-size:120%'>";
						echo "<thead>	
						<tr>
						<th>PartID</th>
						<th>VendorNo</th>
						<th>VendorName</th>
						<th>Description</th>					
						</tr>	
						</thead>";
						echo "<tbody>";					
						while(!$rs->EOF)
						{
							$col1=$rs->Fields[0]->value;
							$col2=$rs->Fields[1]->value;					
							$col3=$rs->Fields[2]->value;
							$col4=$rs->Fields[3]->value;						
									
							echo "<tr>
							<td>$col1</td>
							<td>$col2</td>		
							<td>$col3</td>
							<td>$col4</td>
							</tr>";					
							
							$rs->MoveNext();
						}	
						echo "</tbody>";
						echo "</table>";										
					}
					else{
						echo "<h2>Sorry, no query found</h2>";
					}
				}
				catch (Exception $e)
				{
					echo 'Caught exception: ', $e->getMessage();
					exit();
				}		
	?>
		</main>
	</body>
</html>

	