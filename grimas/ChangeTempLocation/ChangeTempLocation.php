<?php

require_once("../grima-lib.php");

class ChangeTempLocation extends GrimaTask {

	function do_task() {
		$item = new Item();
		$item->loadFromAlmaBarcode($this['barcode']);
        $item['temp_location'] = $this['temp_location'];
		if ($this['temp_location'] == "") {
		  $item['in_temp_location'] = 'false';
        } else {
        $item['in_temp_location'] = 'true';
        }
        $item->updateAlma();
		if ($this['temp_location'] == "") {
			$this->addMessage('success',"temporary location cleared on {$this['barcode']}");
		} else {
			$this->addMessage('success',"temporary location of {$this['temp_location']} added to {$this['barcode']}");
		}
    }
}

ChangeTempLocation::RunIt();