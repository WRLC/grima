<?php

require_once("../grima-lib.php");

class AddAnyNote extends GrimaTask {

	function do_task() {
		$item = new Item();
		$item->loadFromAlmaBarcode($this['barcode']);
    $item[$this['whichnote']] = $this['note'];
		$item->updateAlma();
		if ($this['note'] == "") {
			$this->addMessage('success',"{$this['whichnote']} cleared on {$this['barcode']} - {$item['title']}");
		} else {
			$this->addMessage('success',"{$this['whichnote']} added to {$this['barcode']} - {$item['title']}");
		}
	}

}

AddAnyNote::RunIt();