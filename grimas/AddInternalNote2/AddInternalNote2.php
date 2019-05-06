<?php

require_once("../grima-lib.php");

class AddInternalNote2 extends GrimaTask {

	function do_task() {
		$item = new Item();
		$item->loadFromAlmaBarcode($this['barcode']);
		$item['internal_note_2'] = $this['note'];
		$item->updateAlma();
		if ($this['note'] == "") {
			$this->addMessage('success',"Internal note 2 cleared on {$this['barcode']} - {$item['title']}");
		} else {
			$this->addMessage('success',"Internal note 2 added to {$this['barcode']} - {$item['title']}");
		}
	}

}

AddInternalNote2::RunIt();
