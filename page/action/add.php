<?php
class page_action_add extends Page {
    function init(){
        parent::init();

        $this->js()->_load('jquery.simple-dtpicker');
        $this->js()->_css('jquery.simple-dtpicker');

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

            $f->getElement('schedule')->js(true)->appendDtpicker(array('inline'=>'true'))->debug();
            $f->addSubmit();

            if($f->isSubmitted())
            {
                $f->update();

                $this->js(true , array(
                    $this->js()->univ()->successMessage('Saved'),
                    $this->js()->univ()->redirect('index')
                ))->execute();
            }
        }
    }
}
