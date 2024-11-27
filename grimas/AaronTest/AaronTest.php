<?php

require_once("../grima-lib.php");

class AaronTest extends GrimaTask {

	function do_task() {
		$holding = new Holding();
		$holding->loadFromAlma($this['mms_id'],$this['holding_id']);
		$holding->deleteField("866");
		$new_summary = $this['note'];
		$holding->appendField('866','3','1',array('8' => 0,'a' => $new_summary));
		$holding->updateAlma();
	}

	function print_success() {
		GrimaTask::call('PrintHolding', array('holding_id' => $this['holding_id']));
	}
}

AaronTest::RunIt();
