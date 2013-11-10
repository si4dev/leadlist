<?php
class page_import extends Page {
    function init(){
        parent::init();

        $m = $this->add('Model_Lead');

        $mapping = array(
            'DossierNo'=>'dossier_nr',
            'LegalformcodeText'=>'legalform',
            'Address'=>'address',
            'Postcode'=>'postcode',
            'City'=>'city',
            'TradenameFull'=>'company',
            'Activity'=>'branche',
            'Postcode'=>'postcode',
            'PersonnelFulltimeActual'=>'personnel',
            );

        $delimiter=';';
        $enclosure='"';
        $escape='\\';

        ini_set('auto_detect_line_endings', true); // important

        $i=0;
        $header=true;
        if($handle = fopen('CompanyHelmond.csv', 'r')){
            while (($data = fgetcsv($handle, 0, $delimiter, $enclosure, $escape)) !== FALSE) {
                if($header) {
                    $header=false;
                    foreach($data as $key=>$field_external) {
                        if(isset($mapping[$field_external])) {
                            $mapping[$key]=$mapping[$field_external];
                            unset($mapping[$field_external]);
                        }
                    }
                    foreach($mapping as $key=>$value) {
                        if(!is_integer($key)) {
                            throw $this->expection('Field not found '.$key)
                                    ->addMoreInfo('fieldt',$key);
                        }
                    }
                    $dossier_nr=array_search('dossier_nr', $mapping);
                    continue;
                }
                if(is_null($data[$dossier_nr])) {continue;}
                $m->unload()
                        ->tryLoadBy('dossier_nr',$data[$dossier_nr]);
                foreach($mapping as $field_external=>$field) {
                    $m->set($field,$data[$field_external]);
                }
                $m->save();
            }
            fclose($handle);
        }
    }
}
