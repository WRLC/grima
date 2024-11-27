<?php

//if (isset($_GET['barcode'])) $barcode = $_GET['barcode']; else $barcode = "";
require_once("../grima-lib.php");
//echo $barcode.'<br />';
class NoteCall extends GrimaTask {

	function do_task() {
		$item = new Item();
		$item->loadFromAlmaBarcode($this['barcode']);
        $item['alternative_call_number'] = $this['note'];
        $item['internal_note_1'] = $this['note'];
		$item->updateAlma();
		if ($this['note'] == "") {
			$this->addMessage('success',"Item Call Number and Internal Note 1 cleared on {$this['barcode']} - {$item['title']}");
		} else {
			$this->addMessage('success',"Item Call Number and Internal Note 1 added to {$this['barcode']} - {$item['title']}");
		}
	}

}

NoteCall::RunIt();
