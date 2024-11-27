<?php

require_once("../grima-lib.php");

class AddProvenance extends GrimaTask {

	function do_task() {
		$item = new Item();
		$item->loadFromAlmaBarcode($this['barcode']);
    $item['provenance'] = $this['whichprov'];
		$item->updateAlma();
    $this->addMessage('success',"{$this['barcode']} - {$item['title']} now has provenance code: {$item['provenance']}");
	}

}

AddProvenance::RunIt();
