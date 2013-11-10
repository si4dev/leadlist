<?php
class page_leads extends Page {
    function init(){
        parent::init();

        $c = $this->add('CRUD', array('allow_del' => false));
        $c->setModel('Lead');

        if($c->grid)
        {
            $g = $c->grid;
            $b = $g->addButton('Import');

            $b->js('click', $this->js()->univ()->redirect('import'));
            $g->addPaginator(100);
        }
    }
}
