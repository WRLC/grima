<?php

require_once("../grima-lib.php");

class AddRetention extends GrimaTask {

	function do_task() {
		$item = new Item();
		$item->loadFromAlmaBarcode($this['barcode']);
      $item['committed_to_retain'] = $this['retyesno'];
      $item['retention_reason'] = $this['whichret'];
      $item['retention_note'] = $this['retnote'];
		$item->updateAlma();
	}
 	function print_success() {
	GrimaTask::call('PrintItemRetention', array('barcode' => $this['barcode']));
	}
}

AddRetention::RunIt();
