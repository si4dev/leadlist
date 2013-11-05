<?php
class page_action_add extends Page {
    function init(){
        parent::init();
        if($id = $_GET['id']){
            $this->api->stickyGET('id');

            $m = $this->add('Model_Action');

            $f = $this->add('Form');
            $f->setModel($m , array('lead_id','status_id', 'type', 'notes'));
            $f->set('lead_id', $id);
            $f->addSubmit();

            if($f->isSubmitted()){
                $f->model->set('schedule', $m->dsql()->expr('now()'));
                $f->update();
                $this->js()->univ()->successMessage('Saved')->execute();
            }
        }
    }
}
