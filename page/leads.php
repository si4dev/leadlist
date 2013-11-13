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

            $g->addFormatter('company', 'wrap');
            $g->addFormatter('branche', 'wrap');
            $g->addFormatter('address', 'wrap');
            $g->addFormatter('legalform', 'wrap');

            $b->js('click', $this->js()->univ()->redirect('import'));
            $g->addPaginator(100);
        }
    }
}
