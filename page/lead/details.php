<?php

class page_lead_details extends Page {
    function init(){
        parent::init();

        if($_GET['action_id']){

            $this->api->stickyGET('action_id');
            

            $m = $this->add('Model_Action');
            $action = $m->load($_GET['action_id']);

            $lead = $action->ref('lead_id');


            $details = '<p>';
            $details .= '<strong>Dossier N°: </strong>'.$lead['dossier_nr'].'<br/>';
            $details .= '<strong>Company: </strong>'.$lead['company'].'<br/>';
            $details .= '<strong>Contact Person: </strong>'.$lead['contactperson'].'<br/>';
            $details .= '<strong>Phone: </strong>'.$lead['phone'].'<br/>';
            $details .= '<strong>Email: </strong>'.$lead['email'].'<br/>';
            $details .= '<strong>Website: </strong>'.$lead['website'].'<br/>';
            $details .= '<strong>Branche: </strong>'.$lead['branche'].'<br/>';
            $details .= '<strong>Address: </strong>'.$lead['address'].'<br/>';
            $details .= '<strong>Postcode: </strong>'.$lead['postcode'].'<br/>';
            $details .= '<strong>City: </strong>'.$lead['city'].'<br/>';
            $details .= '<strong>Legal form: </strong>'.$lead['legalform'].'<br/>';
            $details .= '<strong>Personnel: </strong>'.$lead['personnel'].'<br/>';
            $details .= '</p>';
            $this->add('Html')->set($details);

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
