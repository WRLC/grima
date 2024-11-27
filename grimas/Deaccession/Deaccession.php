<?php

//if (isset($_GET['barcode'])) $barcode = $_GET['barcode']; else $barcode = "";
require_once("../grima-lib.php");
//echo $barcode.'<br />';
class Deaccession extends GrimaTask {

	function do_task() {
		$item = new Item();
		$item->loadFromAlmaBarcode($this['barcode']);

        if($item['internal_note_2'] =='RETENTION' or $item['internal_note_2']=='PERMANENT') {
        $this->addMessage('error',"WARNING: This item is marked for Retention. DO NOT DEACCESSION! Status: {$item['internal_note_2']} Barcode: {$this['barcode']} / Title: {$item['title']} / Internal Note 1: {$item['internal_note_1']}");
        }
        else {
        $item['alternative_call_number'] = 'WD';
        $item['internal_note_1'] = 'WD';
		$item->updateAlma();
        if($item['alternative_call_number']=='WD' AND $item['internal_note_1'] == 'WD')
			$this->addMessage('success',"Item Call Number and Internal Note 1 Deaccessioned for {$this['barcode']} - {$item['title']} / Internal Note 1: {$item['internal_note_1']} / Alt Call Number: {$item['alternative_call_number']}");
		}
	}
}

Deaccession::RunIt();
