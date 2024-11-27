<?php

require_once("../grima-lib.php");

class AddAltCallBulk extends GrimaTask {
$tmpName = $_FILES['csv']['tmp_name'];
$csvAsArray = array_map('str_getcsv', file($tmpName));
	function do_task() {
		$item = new Item();
		$item->loadFromAlmaBarcode($this['barcode']);
		$item['alternative_call_number'] = $this['note'];
		$item->updateAlma();
		if ($this['note'] == "") {
			$this->addMessage('success',"Alternative Call Number cleared on {$this['barcode']} - {$item['title']}");
		} else {
			$this->addMessage('success',"Alternative Call Number added to {$this['barcode']} - {$item['title']}");
		}
	}

}

AddAltCallBulk::RunIt();
