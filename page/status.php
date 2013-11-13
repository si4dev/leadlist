<?php
class page_status extends Page {
    function init(){
        parent::init();

        $m = $this->add('Model_Status');
        $c = $this->add('CRUD');
        $c->setModel($m);

    }
}
