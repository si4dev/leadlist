<?php
class Model_Lead extends Model_Table {
    public $table = 'lead';
    public $title_field = 'company';
    function init(){
        parent::init();

        $this->addField('company');
        $this->addField('contactperson');
        $this->addField('phone');
        $this->addField('email');
        $this->addField('website');
        $this->addField('branche');
        $this->addField('address');
        $this->addField('postcode');
        $this->addField('city');
    }
}
