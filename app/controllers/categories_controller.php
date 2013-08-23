<?php 
class CategoriesController extends AppController {

    public $name = 'Categories';
    public $layout = "admin";
    public function admin_index() {
    	
        $categories = $this->Category->generatetreelist(null, "{n}.Category.id", "{n}.Category.title", '&nbsp;&nbsp;&nbsp;');
        //debug ($this->data);
        $this->set(compact("categories"));
    }
    
	function admin_add() {
        if (isset($this->data)) {
             /*
             if (!$this->Category->validates())
             {  $this->Session->setFlash("Corrigez les erreurs mentionnées.", 'message_notice');
             return;
             }
             */
              $this->Category->create();
            if($this->Category->save($this->data)){
               $this->redirect('index');	
            }
			    //$this->Session->setFlash("Données enregistrées.", 'message_ok');
           
        }
        
        $this->set('parents', $this->Category->generatetreelist());
    }
	
	function admin_edit($id = null) {
		
        if (isset($this->data)) {
               /*
             if (!$this->Category->validates())
             {  $this->Session->setFlash("Corrigez les erreurs mentionnées.", 'message_notice');
             return;
             }
             */
            
            if($this->Category->save($this->data)){
               $this->redirect('index');	
            }
            
            //$this->Session->setFlash("Données enregistrées.", 'message_ok');
           
        }else{
        	  $this->data = $this->Category->read(null, $id);
        }
        
       
        $this->set('parents', $this->Category->generatetreelist());
    }
    function admin_move_up($id = null) {
        if (!$this->Category->moveup($id)) {
            //$this->Session->setFlash("La catégorie ne peut pas aller plus haut.", 'message_notice');
        } else {
            //$this->Session->setFlash("Ordre mis à jour.", 'message_ok');
        }
        
        $this->redirect($this->referer());
    }
    
    function admin_move_down($id = null) {
        if (!$this->Category->movedown($id)) {
            //$this->Session->setFlash("La catégorie ne peut pas aller plus bas.", 'message_notice');
        } else {
            //$this->Session->setFlash("Ordre mis à jour.", 'message_ok');
        }
        
        $this->redirect($this->referer());
    }
    
    function admin_delete($id = null) {
        $this->Category->id = $id;
        
        if (!$this->Category->exists()) {
            //$this->Session->setFlash("Enregistrement introuvable.", 'message_error');
        } else {
            $this->Category->removeFromTree($id, true);
            //$this->Session->setFlash("Données supprimées.", 'message_ok');
        }
        
        $this->redirect($this->referer());
    }

    
}
?>
