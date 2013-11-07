<?php

class page_lead extends Page {
    function init(){
        parent::init();

        $this->add('H1')->set('Lead');

        $m = $this->add('Model_Action');
        $action = $m->load($_GET['action_id']);

        $lead = $action->ref('lead_id');

    }
}
