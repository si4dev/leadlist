<?php
class Model_Actions extends Model_Table {
    public $table = 'actions';

    function init(){
        parent::init();

        $this->hasOne('Lead');
        $this->addField('type')->enum(array('Call', 'Email'));
        $this->addField('notes')->type('text');
        $this->addField('schedule');

    }
}
