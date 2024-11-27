<?php

require_once("../grima-lib.php");

class AddInternalNote3 extends GrimaTask {

	function do_task() {
		$item = new Item();
		$item->loadFromAlmaBarcode($this['barcode']);
		$item['internal_note_3'] = $this['note'];
		$item->updateAlma();
		if ($this['note'] == "") {
			$this->addMessage('success',"Internal note 3 cleared on {$this['barcode']} - {$item['title']}");
		} else {
			$this->addMessage('success',"Internal note 3 added to {$this['barcode']} - {$item['title']}");
		}
	}

}

AddInternalNote3::RunIt();
