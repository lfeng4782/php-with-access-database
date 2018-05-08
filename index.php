<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment5</title>
    <link rel="stylesheet" href="assignment5.css">    
    <script src="myScripts.js" type="text/javascript"></script>
</head>

<body>
	<main>
	<h1> Manipulation of database </h1>

	<hr>
	<h3> Please input the data for table Part and Vendors, and click on Submit button to store the data in the database. </h2>
	<div id="inputs">
	<div id="partsForm">
	<h2>PARTS</h2>
    <form method="post" action="parts.php" name="parts" onsubmit="Clear();return ValidateMandatoryParts()">
        
        <label for="partId">PartId:</label>
        <input type="text" value="Auto Number - Read Only" name="partId" id="partId" readonly><br><br>
		<label for="vendorNo">Vendor No:</label>
		<select type="text" name="vendorNo" id="vendorNo">
			<?php
				require_once "getVendorNo.php";
				GetVendorNo();
			?>
		</select>			
		<br><br>
		<label for="description">Description:</label>
		<input type="text" name="description" id="description"><br><br>
		<label for="onHand">OnHand:</label>
		<input type="text" name="onHand" id="onHand"><br><br>
		<label for="onOrder">OnOrder:</label>
		<input type="text" name="onOrder" id="onOrder"><br><br>
		<label for="cost">Cost:</label>
		<input type="text" name="cost" id="cost"><br><br>
		<label for="listPrice">List Price:</label>
		<input type="text" name="listPrice" id="listPrice"><br><br>		
		<input type="submit" name = "submit" id="submit" value="Submit">
     </form>
	 </div>
	 
	 <div id="vendorForm">
	 	<h2>VENDORS</h2>        
     <form method="post" action="vendors.php" name="vendors" onsubmit="Clear();return ValidateMandatoryVendors()">
        
	
		<label for="vendorNo1">Vendor No:</label>
		<input type="text" name="vendorNo1" id="vendorNo1"><br><br>
		<label for="vendorName">Vendor Name:</label>
		<input type="text" name="vendorName" id="vendorName"><br><br>
		<label for="address1">Address1:</label>
		<input type="text" name="address1" id="address1"><br><br>
		<label for="address2">Address2:</label>
		<input type="text" name="address2" id="address2"><br><br>
		<label for="city">City:</label>
		<input type="text" name="city" id="city"><br><br>
		<label for="prov">Province:</label>
		<input type="text" name="prov" id="prov"><br><br>
		<label for="postCode">Post Code:</label>
		<input type="text" name="postCode" id="postCode"><br><br>
		<label for="country">Country:</label>
		<input type="text" name="country" id="country"><br><br>
		<label for="phone">Phone:</label>
		<input type="text" name="phone" id="phone"><br><br>
		<label for="fax">Fax:</label>
		<input type="text" name="fax" id="fax"><br><br>
		<input type="submit" name = "submit" id="submit" value="Submit">
     </form>
	 </div>	 
 </div>
 
 	 <div id="error">
            <h3>Message for You</h3>
            <textarea id="errorMsg" rows="18" cols="80"></textarea>
        </div>
	<hr>
	<h3>Select a vendor number, and click on the Submit Query button to display the partId, vendor name and the products.</h2>
	<div id="queryForm">
	<form method="post" action="parameter.php" name="parameter" onsubmit="Clear()">		
        <select type="text" name="vendorNo2" id="vendorNo2">
			<?php
				require_once "getVendorNo.php";
				GetVendorNo();
			?>
		</select>	
		
		<br><br>
		<input type="submit" name = "submit" id="submit" value="Submit Query">
     </form>
	 </div>
	

	 </main>
	 	
</body>
</html>
