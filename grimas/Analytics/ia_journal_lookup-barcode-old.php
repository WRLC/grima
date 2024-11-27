<?php 
if(!empty($_GET['Barcode'])){
	/**
	* if the form isn't empty then do this
	*/
	$analytics_url = 'https://api-na.hosted.exlibrisgroup.com/almaws/v1/analytics/reports?path=%2Fshared%2FWashington%20Research%20Library%20Consortium%20(WRLC)%20Network%2FReports%2FCannedReports%2FVOLUMES%20HELD%20AT%20SCF%20-%20Barcode%20Lookup&limit=25&col_names=true&apikey=l7xxca4a1f8c94254144b052be63d398bf98&filter=%3Csawx%3Aexpr+xsi%3Atype%3D%22sawx%3Acomparison%22+op%3D%22equal%22+xmlns%3Asaw%3D%22com.siebel.analytics.web%2Freport%2Fv1.1%22+xmlns%3Asawx%3D%22com.siebel.analytics.web%2Fexpression%2Fv1.1%22+xmlns%3Axsi%3D%22http%3A%2F%2Fwww.w3.org%2F2001%2FXMLSchema-instance%22+xmlns%3Axsd%3D%22http%3A%2F%2Fwww.w3.org%2F2001%2FXMLSchema%22+%3E%3Csawx%3Aexpr+xsi%3Atype%3D%22sawx%3AsqlExpression%22%3E%22Physical%20Item%20Details%22.%22Barcode%22%3C%2Fsawx%3Aexpr%3E%3Csawx%3Aexpr+xsi%3Atype%3D%22xsd%3Astring%22%3E' . urlencode($_GET['Barcode']) . '%3C%2Fsawx%3Aexpr%3E%3C%2Fsawx%3Aexpr%3E';

	$analytics_xml = file_get_contents($analytics_url);
	$ISSN = substr($analytics_xml, 1402, 9);

	$ISSN_url = 'https://api-na.hosted.exlibrisgroup.com/almaws/v1/analytics/reports?path=%2Fshared%2FShared%20storage%20institution%2FReports%2FSCF%20Reports%2FVOLUMES%20HELD%20AT%20SCF%20-%20ISSN&limit=250&col_names=true&apikey=l7xx8e0562f43e9949c0882d8e3d5f685cea&filter=%3Csawx%3Aexpr%20xsi%3Atype%3D%22sawx%3Acomparison%22%20op%3D%22equal%22%20xmlns%3Asaw%3D%22com.siebel.analytics.web%2Freport%2Fv1.1%22%20xmlns%3Asawx%3D%22com.siebel.analytics.web%2Fexpression%2Fv1.1%22%20%20xmlns%3Axsi%3D%22http%3A%2F%2Fwww.w3.org%2F2001%2FXMLSchema-instance%22%20xmlns%3Axsd%3D%22http%3A%2F%2Fwww.w3.org%2F2001%2FXMLSchema%22%3E%20%3Csawx%3Aexpr%20xsi%3Atype%3D%22sawx%3AsqlExpression%22%3E%22Bibliographic%20Details%22.%22ISSN%22%3C%2Fsawx%3Aexpr%3E%20%3Csawx%3Aexpr%20xsi%3Atype%3D%22xsd%3Astring%22%3E'.$ISSN.'%3C%2Fsawx%3Aexpr%3E%3C%2Fsawx%3Aexpr%3E';

	$ISSN_xml = simplexml_load_file($ISSN_url) or die("ERROR: ISSN not found.");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-0"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <title>Interactive Analytics</title>
  <link rel="stylesheet" href="../Materialize/materialize.min.css"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
  <nav>
        <div class="nav-wrapper blue"> 
		<img src="../Materialize/wrlc-logo-white.png" height="50px" style="margin:5px 0 0 20px; position:absolute;"> 
		<a href="#" class="brand-logo" style="margin-left:90px;">Web Analytics: Network and SCF reports... without Alma!</a>
        </div>
	<div class="position-absolute mx-auto help-button" style="top:2px;">
            <a class="btn btn-info" href="home.html">HOME</a>
        </div>
  </nav>
    <div class="jumbotron">
      <div class="container task-AdminAddInstitution">
        <div class="container mt-4 position-relative">
        </div>
        <div class="card">
		  <div class="card-header">
			<h2 class="card-title">Journal Volume Overlap Tool</h2>
		  </div>
		  <div class="card-body">
		    <p><h3 style="font-size: 1em">Insert Barcode of volume for accession to display all volumes of that title already in the SCF</h3></p>
			<form action="">
				<input type="text" name="Barcode" placeholder="insert barcode here"/>
				<button type="submit">Submit</button>
			<br/>
			</form>

			<p>ISSN -- Title -- Barcode -- Tray Location -- <span style="font-weight:bold">Volume</span></p>
			<?php
			foreach ($ISSN_xml->QueryResult->ResultXml->rowset->Row as $item ) {printf('<li>%s -- %s -- %s -- %s -- <span style="font-weight:bold">%s</span></li>', $item->Column1, $item->Column2, $item->Column4, $item->Column7, $item->Column6);}
			?>
	</div></div></div></div>
</body>
</html>


