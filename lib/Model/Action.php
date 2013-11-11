<?php
class Model_Action extends Model_Table {
    public $table = 'action';

    function init(){
        parent::init();

        $this->hasOne('Lead');
        $this->hasOne('Status');
        $this->addField('type')->enum(array('Call', 'Email'))->DefaultValue('Call')->Sortable(true);
        $this->addField('notes')->type('text');
        $this->addField('schedule')->Sortable(true);
        $this->addField('closed')->type('boolean');
        $this->addField('feedback')->enum(array('++', '+',' ', '-', '--'));
    }
}
