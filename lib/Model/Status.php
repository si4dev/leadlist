<?php
class Model_Status extends Model_Table {
    public $table='status';
    function init(){
        parent::init();
        $this->addField('name');
    }
}
