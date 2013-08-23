<?php
class AnswersController extends AppController {

	var $name = 'Answers';
	public $layout = "admin";
	
    
    function beforeFilter()
    {
        parent::beforeFilter();
        
        // Allow the add page to be publicly viewed without logging in
        $this->Auth->allow('add');
    }
    
    function add() {
        // If there is submitted data (CakePHP automatically places valid submitted form data into the $this->data variable), check that the record is valid and save it
		if (!empty($this->data)) {            
			$this->Answer->create();            
            
            // Get answered questions from the user's session data
            $answered = array();
            if(is_array($this->Session->read('answered')))
            {
                $answered = $this->Session->read('answered');
            }
            
            // Check if the submitted answer has the required values, and the poll hasn't already been answered by the same user before
            if(isset($this->data['Answer']) && isset($this->data['Answer']['poll_id']) && !in_array($this->data['Answer']['poll_id'], $answered))
            {
                if ($this->Answer->save($this->data)) {
                    
                    // To save the fact that they've already answered this poll.
                    array_push($answered, $this->data['Answer']['poll_id']);
                    $this->Session->write('answered', $answered);
                    
                    $this->Session->setFlash('The answer has been saved');				
                } else {
                    $this->Session->setFlash('The answer could not be saved because: '.implode('; ', $this->Answer->validationErrors));
                }
            }
            else
            {
                $this->Session->setFlash('You have already voted in this poll.');
            }
		}
        
        $this->redirect($this->referer());
	}
    
    
    // Automatically generated code. Should all work fine.
    
}
