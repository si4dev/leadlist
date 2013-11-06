<?php
class Model_Lead extends Model_Table {
    public $table = 'lead';
    public $title_field = 'company';
    function init(){
        parent::init();

        $this->addField('dossier_nr');
        $this->addField('company');
        $this->addField('contactperson')->Caption('Contact');
        $this->addField('phone');
        $this->addField('email');
        $this->addField('website');
        $this->addField('branche');
        $this->addField('address');
        $this->addField('postcode');
        $this->addField('city');
        $this->addField('legalform');
        $this->addField('personnel');

        $this->hasMany('Action');

        $this->addExpression('status', function($m, $q){
          return $m->refSQL('Action')->fieldQuery('status');
        });
    }
}
