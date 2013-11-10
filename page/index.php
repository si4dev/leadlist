<?php
class page_index extends Page {
    function init(){
        parent::init();

        $m = $this->add('Model_Action');
        $m->join('lead');

        $tt = $this->add('Tabs');
        //tab definitions
        $leads = $tt->addTab('New Leads');
        $all = $tt->addTab('Actions');
        $call = $tt->addTab('Call');
        $email = $tt->addTab('Email');
        $schedule= $tt->addTab('Scheduled');

        $model = $this->add('Model_Lead');
        $model->addCondition('actions' ,'0');
        $g = $leads->add('Grid');
        $g->addColumn('button','action' ,'Add action');
        $g->setModel($model);

        $g->addFormatter('company', 'wrap');
        $g->addFormatter('branche', 'wrap');
        $g->addFormatter('legalform', 'wrap');
        $g->addFormatter('address', 'wrap');

        $g->addPaginator(100);

        $ga = $all->add('Grid');
        $ga->addColumn('button', 'edit');
        $ga->setModel($m);

        $add = $ga->addButton('add');

        $ga->addColumn('expander', 'lead_details');

        $mcall = clone($m);
        $mcall->addCondition('type', 'Call');
        $gc = $call->add('Grid');
        $gc->addColumn('button', 'edit');
        $gc->setModel($mcall);

        $gc->addColumn('expander', 'lead_details');



        $memail= clone($m);
        $memail->addCondition('type', 'Email');
        $ge = $email->add('Grid');
        $ge->addColumn('button', 'edit');
        $ge->setModel($memail);

        $ge->addColumn('expander', 'lead_details');

        if($id = $_GET['action'])
        {
            $this->js()->univ()->frameURL('Action', $this->api->url('action/add', array('id'=> $id)))->execute();
        }

        if($id = $_GET['edit'])
        {
            $this->js()->univ()->frameURL('Action', $this->api->url('action/edit', array('id'=> $id)))->execute();
        }

        $mscheduled = clone($m);
        $mscheduled->addCondition('schedule' , '>= ' , $mscheduled->dsql()->expr('now()') );
        $gs = $schedule->add('Grid');
        $gs->addColumn('button', 'edit');

        $gs->setModel($mscheduled);
        $gs->addColumn('expander', 'lead_details');
    }
}
