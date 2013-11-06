<?php
class page_leads extends Page {
    function init(){
        parent::init();

        $c = $this->add('CRUD', array('allow_del' => false) );
        $c->setModel('Lead');

        if($c->grid)
        {
            $b = $c->grid->addButton('Import');
            $c->grid->addPaginator(1000);
        }
    }
}
