<?php

require_once("../grima-lib.php");

class AddAltCall extends GrimaTask {

	function do_task() {
		$item = new Item();
		$item->loadFromAlmaBarcode($this['barcode']);
		$item['alternative_call_number'] = $this['note'];
		$item->updateAlma();
		if ($this['note'] == "") {
			$this->addMessage('success',"Item Call Number cleared on {$this['barcode']} - {$item['title']}");
		} else {
			$this->addMessage('success',"Item Call Number added to {$this['barcode']} - {$item['title']}");
		}
	}

}

AddAltCall::RunIt();
