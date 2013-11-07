<?php

class page_lead extends Page {
    function init(){
        parent::init();

        $action = $this->add('Model_Action')->load($_GET['action_id']);

        $m = $action->ref('lead_id');

        $g = $this->add('Grid');
        $g->setModel($m);
    }
}
