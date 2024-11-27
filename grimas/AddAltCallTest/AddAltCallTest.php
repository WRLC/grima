<?php

require_once("../grima-lib.php");
//form to get the file and submit
if(!isset($rowcount)) $rowcount = 0;
if($_POST['updated'] !=='true') {

echo '
<table width="600">
<form action="'.$_SERVER["PHP_SELF"].'" method="post" enctype="multipart/form-data">
<input type="hidden" value="true" name="updated">
<tr>
<td width="20%">Select file</td>
<td width="80%"><input type="file" name="file" id="file" /></td>
</tr>

<tr>
<td>Submit</td>
<td><input type="submit" name="submit" /></td>
</tr>

</form>
</table>';
}

/// begin loop here to submit each

//get file name and pass to array
$tmpName = $_FILES['file']['tmp_name'];

$csv = array();

$lines = file($tmpName, FILE_IGNORE_NEW_LINES);
$rowcount = count($lines);

if($rowcount > 1) {
	
	echo '<br />
<a href="'.$_SERVER["PHP_SELF"].'">Clear</a>
<br />';
echo '<br />';
echo $rowcount. ' records submitted';
echo '<br /><br />'; }


//loop to get values
foreach ($lines as $key => $value)
{
    $csv[$key] = str_getcsv($value);
}
//loop to display values.  Build your form here.
foreach($csv as $row)
{
	
	//echo $row[0].' - '.$row[1].'<br />';
	
	class AddAltCallTest extends GrimaTask {
	
	function do_task() {
		$item = new Item();
		//Check barcode in Alma with CSV barcode
		$item->loadFromAlmaBarcode($this['barcode']);
		//$item->loadFromAlmaBarcode($row[0]);
		//Add Alternative Call Number from CSV
		$item['alternative_call_number'] = $row[1];
		echo $row[1];
		$item->updateAlma();
		
		if ($row[1] == "") {
			$this->addMessage('success',"Alternative Call Number cleared on {$row[0]} - {$item['title']}");
		} else {
			$this->addMessage('success',"Alternative Call Number added to {$row[0]} - {$item['title']}");
		}
	}
}

AddAltCallTest::RunIt();
	

	
}

fclose($file);












// end the loop and display success message

