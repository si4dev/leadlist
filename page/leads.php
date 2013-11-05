<?php
class page_leads extends Page {
    function init(){
        parent::init();

        $c = $this->add('CRUD');
        $c->setModel('Lead');

        if($c->grid){
            $b = $c->grid->addButton('Import');
        }
    }
}
