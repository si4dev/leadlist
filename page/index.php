<?php
class page_index extends Page {
    function init(){
        parent::init();
        $m = $this->add('Model_Lead');
        $g = $this->add('Grid');
        $g->addColumn('button','action' ,'Add Action');
        $g->addColumn('Expander', 'leads_actions', 'Actions List');
        $g->setModel($m);

        $g->addPaginator(100);


        if($id = $_GET['action']){
            $this->js()->univ()->frameURL('Action', $this->api->url('action/add', array('id'=> $id)))->execute();
        }
    }
}
