<?php

class page_lead extends Page {
    function init(){
        parent::init();

        if($_GET['action_id']){

            $this->api->stickyGET('action_id');
            
            $this->add('H1')->set('Lead');

            $m = $this->add('Model_Action');
            $action = $m->load($_GET['action_id']);

            $lead = $action->ref('lead_id');

            $f = $this->add('Form');
            $f->setModel($lead);
            $f->addSubmit();

            if($f->isSubmitted()){
                $f->update();
                $this->js()->univ()->successMessage('Saved!')->execute();
            }
        }

    }
}
