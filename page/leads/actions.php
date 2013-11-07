<?php
class page_leads_actions extends Page {
    function init(){
        parent::init();

        if($id = $_GET['index_id'])
        {
            $this->api->stickyGET('index_id');
            $m = $this->add('Model_Action');
            $m->addCondition('lead_id', $id);

            $g = $this->add('CRUD', array('allow_del'=> false));
            $g->setModel($m);


            if($_GET['close'])
            {
                $o = $m->load($_GET['close']);
                $o->set('closed', true);
                $o->update();

                $this->js(true, array(
                    $this->js()->univ()->successMessage('Closed!'),
                    $g->js()->reload()
                ))->execute();
            }
        }
    }
}
