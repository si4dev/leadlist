<?php
class page_import extends Page {
    function init(){
        parent::init();

        $m = $this->add('Model_Lead');

        $keys = array();

        if($handle = fopen('CompanyHelmond.csv', 'r')){
            while (($data = fgetcsv($handle, 10000, ";")) !== FALSE) {
                //
            }
            fclose($handle);
        }
    }
}
