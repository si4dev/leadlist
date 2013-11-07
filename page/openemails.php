<?php
class page_openemails extends Page {
    function init(){
        parent::init();
        $m = $this->add('Model_Lead');
        $m->addCondition('status', 'open email');

        $g = $this->add('Grid');
        $g->addColumn('button','action' ,'Action');
        $g->setModel($m);

        //$g->addOrder()->move('status','first')->now();
        $qs = $g->addQuickSearch(array('status'));

        $g->addPaginator(100);

        if($id = $_GET['action'])
        {
            $this->js()->univ()->frameURL('Action', $this->api->url('action/add', array('id'=> $id)))->execute();
        }
    }
}
