		<?php
		//Get vendorNo for displaying
		function GetVendorNo(){
		$db = 'E:\\xampp\\htdocs\\A5-6\\a5.mdb';		
		$conn = new COM('ADODB.connection');
		$sql = 'Select VendorNo FROM Vendors';
		if (!$conn)
		{
			echo "Database unreachable";
			exit();
		}
		
		try
		{
			$conn->Open("Provider=Microsoft.Jet.OLEDB.4.0; Data Source=$db");
			$rs = $conn->Execute($sql);
		}
		catch (Exception $e)
		{
			echo 'Caught exception: ', $e->getMessage();
			exit();
		}
		while(!$rs->EOF)
		{
			{
				$tmp = $rs->Fields[0]->Value;
				echo '<option value=', $tmp, '>', $tmp, '</option>';				
			}			
			$rs->MoveNext();
		}
		}
		//Get vendorNo for duplication validation
		function CheckVendorNoDuplication($vendorNo){
		$db = 'E:\\xampp\\htdocs\\A5-6\\a5.mdb';		
		$conn = new COM('ADODB.connection');
		$sql = 'Select VendorNo FROM Vendors';
		$NoDuplication=true;
		if (!$conn)
		{
			echo "Database unreachable";
			exit();
		}
		
		try
		{
			$conn->Open("Provider=Microsoft.Jet.OLEDB.4.0; Data Source=$db");
			$rs = $conn->Execute($sql);
		}
		catch (Exception $e)
		{
			echo 'Caught exception: ', $e->getMessage();
			exit();
		}
		while(!$rs->EOF)
		{
			{
				$tmp = $rs->Fields[0]->Value;
				if($tmp==$vendorNo){
					$NoDuplication=false;
					break;
				}
			}			
			$rs->MoveNext();
		}
		return $NoDuplication;
		}
		?>