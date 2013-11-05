<?php 
class page_leads_actions extends Page {
    function init(){
        parent::init();

        if($id = $_GET['index_id']){
            $m = $this->add('Model_Action');
            $m->addCondition('lead_id', $id);

            $this->add('Grid')->setModel($m);

        }
    }
}
