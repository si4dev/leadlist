<?php
class Model_Action extends Model_Table {
    public $table = 'action';

    function init(){
        parent::init();

        $this->hasOne('Lead')->Sortable(true);
        $this->addField('type')->enum(array('Call', 'Email'))->DefaultValue('Call')->Sortable(true);
        $this->addField('notes')->type('text');
        $this->addField('schedule');

    }
}
