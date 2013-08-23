<?php 
class NewslettersController  extends AppController {
		public $name = 'Newsletters';

  function insertemail() {
  
   
   $this->data['Newsletter']['email'] = $_POST['email'];
     $exist_email = $this->Newsletter->find('count', array('conditions' => array('Newsletter.email' => $this->data['Newsletter']['email'])));
    
	   if(($exist_email == 0)){
	   	 
	    if ($this->data) {
          //  $this->Newsletters->set($this->data);
            if ($this->Newsletter->validates()) {
                	
                
                if ($this->Newsletter->save($this->data, false)) {
                  $this->Newsletter->autoRedirect = false;
                }
            }
            
        }}
        $this->Newsletter->autoRedirect = false; 
    }

}
?>