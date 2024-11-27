<?php 
if(!empty($_GET['Barcode'])){
	/**
	* if the form isn't empty then do this
	*/
	$analytics_url = 'https://api-na.hosted.exlibrisgroup.com/almaws/v1/analytics/reports?path=%2Fshared%2FShared%20storage%20institution%2FReports%2FSCF%20Reports%2FVOLUMES%20HELD%20AT%20SCF%20-%20Barcode%20Lookup&limit=25&col_names=true&apikey=l7xx8e0562f43e9949c0882d8e3d5f685cea&filter=%3Csawx%3Aexpr+xsi%3Atype%3D%22sawx%3Acomparison%22+op%3D%22equal%22+xmlns%3Asaw%3D%22com.siebel.analytics.web%2Freport%2Fv1.1%22+xmlns%3Asawx%3D%22com.siebel.analytics.web%2Fexpression%2Fv1.1%22+xmlns%3Axsi%3D%22http%3A%2F%2Fwww.w3.org%2F2001%2FXMLSchema-instance%22+xmlns%3Axsd%3D%22http%3A%2F%2Fwww.w3.org%2F2001%2FXMLSchema%22+%3E%3Csawx%3Aexpr+xsi%3Atype%3D%22sawx%3AsqlExpression%22%3E%22Physical%20Item%20Details%22.%22Barcode%22%3C%2Fsawx%3Aexpr%3E%3Csawx%3Aexpr+xsi%3Atype%3D%22xsd%3Astring%22%3E' . urlencode($_GET['Barcode']) . '%3C%2Fsawx%3Aexpr%3E%3C%2Fsawx%3Aexpr%3E';

	$analytics_xml = file_get_contents($analytics_url);
	/**
	$networkid = $analytics_xml->xpath('//Column1');
	
	$networkid_url = 'https://api-na.hosted.exlibrisgroup.com/almaws/v1/analytics/reports?path=%2Fshared%2FWashington%20Research%20Library%20Consortium%20(WRLC)%20Network%2FReports%2FCannedReports%2FRetention%20Reassignment%20Form&limit=25&col_names=true&apikey=l7xxca4a1f8c94254144b052be63d398bf98&filter=%3Csawx%3Aexpr+xsi%3Atype%3D%22sawx%3Acomparison%22+op%3D%22equal%22+xmlns%3Asaw%3D%22com.siebel.analytics.web%2Freport%2Fv1.1%22+xmlns%3Asawx%3D%22com.siebel.analytics.web%2Fexpression%2Fv1.1%22+xmlns%3Axsi%3D%22http%3A%2F%2Fwww.w3.org%2F2001%2FXMLSchema-instance%22+xmlns%3Axsd%3D%22http%3A%2F%2Fwww.w3.org%2F2001%2FXMLSchema%22+%3E%3Csawx%3Aexpr+xsi%3Atype%3D%22sawx%3AsqlExpression%22%3E%22Bibliographic+Details%22.%22Network+Id%22%3C%2Fsawx%3Aexpr%3E%3Csawx%3Aexpr+xsi%3Atype%3D%22xsd%3Astring%22%3E' . $networkid . '%3C%2Fsawx%3Aexpr%3E%3C%2Fsawx%3Aexpr%3E';
	
	$networkid_xml = file_get_contents($networkid_url);
		echo $networkid_xml;
*/
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-0"/>
  <title>Interactive Analytics</title>
</head>
<body>
<form action="">
	<input type="text" name="Barcode"/>
	<button type="submit">Submit</button>
<br/>
<?php
		echo substr($analytics_xml, 1402, 9);
?>
</form>
</body>
</html>
