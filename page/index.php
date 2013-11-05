<?php
class page_index extends Page {
    function init(){
        parent::init();
        $m = $this->add('Model_Lead');
        $g = $this->add('Grid');
        $g->setModel($m);

        $g->addColumn('button','action' ,'Add Action');

        if($id = $_GET['action']){
            $this->js()->univ()->frameURL('Action', $this->api->url('action/add', array('id'=> $id)))->execute();
        }
    }
}
