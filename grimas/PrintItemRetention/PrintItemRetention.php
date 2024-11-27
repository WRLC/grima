<?php

require_once("../grima-lib.php");

class PrintItemRetention extends GrimaTask {

	function do_task() {
		$item = new Item();
		$item->loadFromAlmaBarcode($this['barcode']);
			if ($this['barcode'] != "") {
			$this->addMessage('success',"Retention Information for {$this['barcode']}:  Committed to Retain? = [{$item['committed_to_retain']}] Retention Reason = [{$item['retention_reason']}] Retention Note = [{$item['retention_note']}]");
		} else {
			$this->addMessage('success',"No Barcode Entered");
		}
	}
}

PrintItemRetention::RunIt();