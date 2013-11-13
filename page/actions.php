<?php
class page_actions extends Page {
    function init(){
        parent::init();
        $c = $this->add('CRUD');
        $c->setModel('Action');
        if($g = $c->grid){
            $g->addQuickSearch(array('lead', 'type', 'notes'));
        }

        if($c->isEditing()){


            $this->js()->_load('jquery.simple-dtpicker');
            $this->js()->_css('jquery.simple-dtpicker');

            $f = $c->form;
            $f->getElement('schedule')->js(true)->appendDtpicker(array('inline'=>'true', 'futureOnly',true));
        }
    }
}
