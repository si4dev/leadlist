<?php
class page_actions extends Page {
    function init(){
        parent::init();
        $this->add('Grid')->setModel('Actions');
    }
}
