<?php
class page_actions extends Page {
    function init(){
        parent::init();
        $c = $this->add('CRUD');
        $c->setModel('Action');
        if($g = $c->grid){
            $g->addQuickSearch(array('lead', 'type', 'notes'));
        }
    }
}
