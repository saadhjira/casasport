<?php 
class MenusController extends AppController {

    public $name = 'Menus';
    public $layout = "admin";
    
	
	public function admin_index() {
    	$menus = $this->Menu->generatetreelist(null, "{n}.Menu.id", "{n}.Menu.title", '&nbsp;&nbsp;&nbsp;');
     	$this->set(compact("menus"));
    }
   	function admin_add() {
        if (isset($this->data)) {
             /*
             if (!$this->Category->validates())
             {  $this->Session->setFlash("Corrigez les erreurs mentionnées.", 'message_notice');
             return;
             }
             */
            $this->Menu->create();
            if($this->Menu->save($this->data)){
            
             $this->redirect('index');	
            }
			  //$this->Session->setFlash("Données enregistrées.", 'message_ok');
       }
		 $this->set('parents', $this->Menu->generatetreelist());
    }
	
	function admin_edit($id = null) {
        if (isset($this->data)) {
           
            /*
             if (!$this->Category->validates())
             {  $this->Session->setFlash("Corrigez les erreurs mentionnées.", 'message_notice');
             return;
             }
             */
            // print_r($this->data);
           
          if($this->Menu->save($this->data)){
             
               $this->redirect('index');	
            }
		    //$this->Session->setFlash("Données enregistrées.", 'message_ok');
            
        }else{
        	  $this->data = $this->Menu -> read('*', $id);
			  
        }
        
      
        $this->set('parents', $this->Menu->generatetreelist());
		$this->render('admin_add');
    }
    function admin_move_up($id = null) {
        if (!$this->Menu->moveup($id)) {
            //$this->Session->setFlash("La catégorie ne peut pas aller plus haut.", 'message_notice');
        } else {
            //$this->Session->setFlash("Ordre mis à jour.", 'message_ok');
        }
        
        $this->redirect($this->referer());
    }
    
    function admin_move_down($id = null) {
        if (!$this->Menu->movedown($id)) {
            //$this->Session->setFlash("La catégorie ne peut pas aller plus bas.", 'message_notice');
        } else {
            //$this->Session->setFlash("Ordre mis à jour.", 'message_ok');
        }
        
        $this->redirect($this->referer());
    }
    
    function admin_delete($id = null) {
        $this->Menu->id = $id;
        
        if (!$this->Menu->exists()) {
            //$this->Session->setFlash("Enregistrement introuvable.", 'message_error');
        } else {
            $this->Menu->removeFromTree($id, true);
            //$this->Session->setFlash("Données supprimées.", 'message_ok');
        }
        
        $this->redirect($this->referer());
    }
  	function admin_sitmap() {
       // $menus = $this->Menu->generatetreelist(null, "{n}.Menu.id", "{n}.Menu.title", '&nbsp;&nbsp;&nbsp;');
     	 $results = $this->Menu->find(all);
     	$this->set(compact("menus","results"));
		
    }
    
}
?>
