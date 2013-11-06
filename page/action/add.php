<?php
class page_action_add extends Page {
    function init(){
        parent::init();
        if($id = $_GET['id'])
        {
            $this->api->stickyGET('id');

            $lead = $this->add('Model_Lead')->load($id);
            $m = $lead->ref('Action');
            $m->tryLoadAny();
            if(!$m->loaded()){
                $m->set('lead_id' , $id);
            }

            $f = $this->add('Form');
            $f->setModel($m);
            $f->addSubmit();

            if($f->isSubmitted())
            {
                $f->model->set('schedule', $m->dsql()->expr('now()'));
                $f->update();
                $this->js()->univ()->successMessage('Saved')->execute();
            }
        }
    }
}
