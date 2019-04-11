<?php

require_once("../grima-lib.php");

class SCFLookup extends GrimaTask {

	function do_task() {
		$this->item = new Item();
		$this->item->loadFromAlmaBarcode($this['barcode']);
	}

	function print_success() {
		XMLtoWeb($this->item->xml);


	}
}

SCFLookup::RunIt();
