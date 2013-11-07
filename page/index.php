<?php
class page_index extends Page {
    function init(){
        parent::init();

        $m = $this->add('Model_Action');
        $m->join('lead');

        $tt = $this->add('Tabs');

        $all = $tt->addTab('All');


        $g = $all->add('Grid');        
        $g->addColumn('button', 'edit');
        $g->setModel($m);

        $add = $g->addButton('add');

        $g->addColumn('expander', 'lead');

        $call = $tt->addTab('Call');
        $email = $tt->addTab('Email');




        $mcall = clone($m);
        $mcall->addCondition('type', 'Call');
        $gc = $call->add('Grid');
        $gc->addColumn('button', 'edit');
        $gc->setModel($mcall);

        $gc->addColumn('expander', 'lead');



        $memail= clone($m);
        $memail->addCondition('type', 'Email');
        $ge = $email->add('Grid');
        $ge->addColumn('button', 'edit');
        $ge->setModel($memail);

        $ge->addColumn('expander', 'lead');

        $leads = $tt->addTab('New Leads');

        $model = $this->add('Model_Lead');
        $model->addCondition('actions' ,'0');

        $g = $leads->add('Grid');
        $g->addColumn('button','action' ,'Add action');
        $g->setModel($model);

        $g->addPaginator(100);

        if($id = $_GET['action'])
        {
            $this->js()->univ()->frameURL('Action', $this->api->url('action/add', array('id'=> $id)))->execute();
        }

        if($id = $_GET['edit'])
        {
            $this->js()->univ()->frameURL('Action', $this->api->url('action/edit', array('id'=> $id)))->execute();
        }

   /*     $m = $this->add('Model_Lead');

       // $tt = $this->add('Tabs');
       // $all = $tt->addTab('All');

      //  $tcall = $tt->addTabURL('opencalls', 'Open Calls');
       // $temail= $tt->addTabURL('openemails', 'Open Emails');

        $g = $all->add('Grid');
        $g->addColumn('button','action' ,'Add action');
        $g->addColumn('expander', 'leads_actions' , 'Actions');
        $g->setModel($m);

        $g->addOrder()->move('status','first')->now();
        $qs = $g->addQuickSearch(array('status'));

        $g->addPaginator(100);


        */
    }
}
