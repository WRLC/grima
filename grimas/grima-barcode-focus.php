<?php
//javascript added to autofocus barcode form field - JS 9/26/19
echo '<script type="text/javascript">
	function formfocus() {
		document.getElementById("barcode").focus();
	}
	window.onload = formfocus;
</script>';

?>