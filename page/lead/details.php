<?php

class page_lead_details extends Page {
    function init(){
        parent::init();

        if($_GET['action_id']){

            $this->api->stickyGET('action_id');
            

            $m = $this->add('Model_Action');
            $action = $m->load($_GET['action_id']);

            $lead = $action->ref('lead_id');

            $this->add('P')->set('Dossier N°: '.$lead['dossier_nr']);
            $this->add('P')->set('Company: '.$lead['company']);
            $this->add('P')->set('Contact Person: '.$lead['contactperson']);
            $this->add('P')->set('Phone: '.$lead['phone']);
            $this->add('P')->set('Email: '.$lead['email']);
            $this->add('P')->set('Website: '.$lead['website']);
            $this->add('P')->set('Branche: '.$lead['branche']);
            $this->add('P')->set('Adress: '.$lead['address']);
            $this->add('P')->set('PostCode: '.$lead['postcode']);
            $this->add('P')->set('City: '.$lead['city']);
            $this->add('P')->set('Legal form: '.$lead['legalform']);
            $this->add('P')->set('Personnel: '.$lead['personnel']);

            /*

            $f = $this->add('Form');
            $f->setModel($lead);
            $f->addSubmit();

            if($f->isSubmitted()){
                $f->update();
                $this->js()->univ()->successMessage('Saved!')->execute();
            }
            */
        }

    }
}
