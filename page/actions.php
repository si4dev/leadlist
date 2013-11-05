<?php
class page_actions extends Page {
    function init(){
        parent::init();
        $g = $this->add('Grid');
        $g->setModel('Action');
        $g->addQuickSearch(array('lead', 'type', 'notes'));
    }
}
