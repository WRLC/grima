<?php

require_once("../grima-lib.php");

class MarkSetPlus extends GrimaTask {

        function do_task() {

                $set = new Set();
                $set->loadFromAlma($this['set_id']);
                $set->getMembers();

                $size = count($set->members);

                foreach ($set->members as $member) {

                $bib = new Bib();
                        $bib->loadFromAlma($member->id);
                        $bib->getHoldings();

                        if (count($bib->holdings) > 1) {
                                addMessage('warn', "More than one holding on bib {$bib['mms_id']}");
                                continue;
                        } else {
                                $holding = $bib->holdings[0];
                                $holding->getItemList();
                                if (count($holding->itemList->items) > 1) {
                                        addMessage('warn', "More than one item on holding {$holding['holding_id']}");
                                        continue;
                                }
                                $item = $holding->itemList->items[0];
                                $item['in_temp_location'] = "true";
                                $item['temp_library'] = $this['temp_library'];
                                $item['temp_location'] = $this['temp_location'];
                                $item['temp_policy'] = $this['temp_policy'];
                                $item->updateAlma();
                        }
                }
                $this->addMessage('success',"Updated all records for {$this['job_id']}");

        }
}

MarkSetPlus::RunIt();
