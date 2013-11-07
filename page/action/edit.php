<?php
class page_action_edit extends Page {
    function init(){
        parent::init();

        $this->js()->_load('jquery.simple-dtpicker');
        $this->js()->_css('jquery.simple-dtpicker');

        if($id = $_GET['id'])
        {
            $this->api->stickyGET('id');

            $m = $this->add('Model_Action')->load($_GET['id']);
            
            $f = $this->add('Form');
            $f->setModel($m);

            $f->getElement('schedule')->js(true)->appendDtpicker(array('inline'=>'true', 'futureOnly',true));
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
