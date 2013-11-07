<?php
class page_index extends Page {
    function init(){
        parent::init();
        $m = $this->add('Model_Lead');

        $tt = $this->add('Tabs');
        $all = $tt->addTab('All');

        $tcall = $tt->addTabURL('opencalls', 'Open Calls');
        $temail= $tt->addTabURL('openemails', 'Open Emails');

        $g = $all->add('Grid');
        $g->addColumn('button','action' ,'Add action');
        $g->addColumn('expander', 'leads_actions' , 'Actions');
        $g->setModel($m);

        $g->addOrder()->move('status','first')->now();
        $qs = $g->addQuickSearch(array('status'));

        $g->addPaginator(100);

        if($id = $_GET['action'])
        {
            $this->js()->univ()->frameURL('Action', $this->api->url('action/add', array('id'=> $id)))->execute();
        }
    }
}
