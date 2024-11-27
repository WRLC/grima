<?php

require_once("../grima-lib.php");

class AddXBarcode extends GrimaTask {

	function do_task() {
		$item = new Item();
		$item->loadFromAlmaBarcode($this['barcode']);
		$item['barcode'] = $this['barcode'] . "X";
    $item['provenance'] = $this['whichprov'];
		$item->updateAlma();
    $this->addMessage('success',"X suffix and provenance code added to {$this['barcode']} - {$item['title']}");
	}

}

AddXBarcode::RunIt();
