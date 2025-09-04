<?php 
if(!empty($_GET['ItemCall'])){
	/**
	* if the form isn't empty then do this
	*/

	$ItemCall = $_GET['ItemCall'];
	$analytics_url = 'https://api-na.hosted.exlibrisgroup.com/almaws/v1/analytics/reports?path=%2Fshared%2FShared+storage+institution%2FReports%2FCanned+Reports%2FTray+Check+-+Barcode+Count&limit=250&col_names=true&apikey=l7xx8e0562f43e9949c0882d8e3d5f685cea&filter=%3Csawx%3Aexpr%20xsi%3Atype%3D%22sawx%3Alogical%22%20op%3D%22or%22%20xmlns%3Asaw%3D%22com.siebel.analytics.web%2Freport%2Fv1.1%22%20%0A%20%20xmlns%3Asawx%3D%22com.siebel.analytics.web%2Fexpression%2Fv1.1%22%20%0A%20%20xmlns%3Axsi%3D%22http%3A%2F%2Fwww.w3.org%2F2001%2FXMLSchema-instance%22%20%0A%20%20xmlns%3Axsd%3D%22http%3A%2F%2Fwww.w3.org%2F2001%2FXMLSchema%22%0A%20%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%3Csawx%3Aexpr%20xsi%3Atype%3D%22sawx%3Alist%22%20op%3D%22beginsWith%22%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3Csawx%3Aexpr%20xsi%3Atype%3D%22sawx%3AsqlExpression%22%3E%22Physical%20Item%20Details%22.%22Internal%20Note%201%22%3C%2Fsawx%3Aexpr%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3Csawx%3Aexpr%20xsi%3Atype%3D%22xsd%3Astring%22%3E'.$ItemCall.'%3C%2Fsawx%3Aexpr%3E%3C%2Fsawx%3Aexpr%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%3Csawx%3Aexpr%20xsi%3Atype%3D%22sawx%3Alist%22%20op%3D%22beginsWith%22%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3Csawx%3Aexpr%20xsi%3Atype%3D%22sawx%3AsqlExpression%22%3E%22Physical%20Item%20Details%22.%22Item%20Call%20Number%22%3C%2Fsawx%3Aexpr%3E%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3Csawx%3Aexpr%20xsi%3Atype%3D%22xsd%3Astring%22%3E'.$ItemCall.'%3C%2Fsawx%3Aexpr%3E%3C%2Fsawx%3Aexpr%3E%3C%2Fsawx%3Aexpr%3E';

	$analytics_xml = simplexml_load_file($analytics_url) or die("ERROR: Item Call Number not found.");

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
			<h2 class="card-title">Shelf/Tray Count</h2>
		  </div>
		  <div class="card-body">
		    <p><h3 style="font-size: 1em">Enter full or partial shelf/tray location (Item Call Number) to see how many items are already there</h3></p>
			<form action="">
				<input type="text" name="ItemCall" autofocus="autofocus" placeholder="R02M03S04T05"/>
				<button type="submit">Submit</button>
			<br/>
			</form>
		<p>All volumes located in tray <span style="font-weight:bold"><?php echo $_GET['ItemCall']; ?></span></p>
			<table border= '2'>
        		<tr>
          			<th>Title</th>
          			<th><span style="font-weight:bold">Barcode (includes SCF records)</span></th>
          			<th>Item Call Number</th>
		  			<th>Internal Note 1</th>
					<th>Item Status</th>
        		</tr>
    			<?php
					foreach ($analytics_xml->QueryResult->ResultXml->rowset->Row as $item ) {printf('<tr><td>%s</td><td><span style="font-weight:bold">%s</span></td><td>%s</td><td>%s</td><td>%s</td>', $item->Column1, $item->Column2, $item->Column4, $item->Column5, $item->Column3);}
				?>
</table>
	</div></div></div></div>
</body>
</html>

