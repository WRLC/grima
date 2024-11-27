<?php

require_once("../grima-lib.php");

class PrintItem extends GrimaTask {

	function do_task() {
		$item = new Item();
		$item->loadFromAlmaBarcode($this['barcode']);
			if ($this['barcode'] != "") {
			$this->addMessage('success',"SCF Information for {$this['barcode']}:  Item Call # = [{$item['alternative_call_number']}] Internal Note 1 = [{$item['internal_note_1']}] Internal Note 2 = [{$item['internal_note_2']}] Description = [{$item['description']}]");
		} else {
			$this->addMessage('success',"No Barcode Entered");
		}
	}
}

PrintItem::RunIt();