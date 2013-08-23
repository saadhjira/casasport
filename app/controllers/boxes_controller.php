<?php 
class BoxesController extends AppController {
  
  
  public $name = 'Boxes';
  public $layout = "admin";
  public $uses =array("Box","Menu");
public $helpers = array('Cache');
    
    public function admin_index() {
    	/*$box=$this->Box->findById("2");
		$box=Set::map($box,'Box');
		//print_r($box=Set::map($box,'Box'));
		//echo $box->id."dddd";
		print_r($box->getItems());*/
        //$this->Box->cloneBox();
        //$this->Box->reorder();
        //$results =$this->Box->generatetreelist();
        //$this->Box->recover();
        //$this->Box->moveup(164,15);
        $results = $this->Box->find('threaded',array('order' => array('lft' =>"ASC")));
        $this->set(compact("results"));
    }
	
   public function admin_cache() {
		print_r($this->params);
    	if (isset($this->params["pass"][0])) {
		
    	$result = $this->Box->find('first', array('conditions' => array('Box.id' => $this->params["pass"][0])));
    	$name = explode("/", $result["Box"]["partial_name"]);
    	$file = "element_".$result["Box"]["cache_key"]."_".$name[1]."_".$name[2];
    	
    	clearCache($file, 'views', ''); 
    	$this -> flash(__('Cache deleted.', true), array('action' => 'index'));
    	}
    	else {
    		clearCache(NULL, 'views');
			$this -> flash(__(' All Cache deleted.', true), array('action' => 'index'));
			
    	}
    }
	function admin_add() {
        if (isset($this->data)) {
            $this->Box->create();
			if($this->Box->save($this->data)){
               $this->redirect('index');	
            }
            
            //$this->Session->setFlash("Données enregistrées.", 'message_ok');
            
        }
        
        $this->set('parents', $this->Box->generatetreelist());
		$this->set('fgKeys', $this->Menu->generatetreelist());
    }
	
	function admin_edit($id = null) {
        if (isset($this->data)) {
          
          if($this->Box->save($this->data)){
               $this->redirect('index');	
            }
            
            //$this->Session->setFlash("Données enregistrées.", 'message_ok');
            
        }else{
        	  $this->data = $this->Box->read(null, $id);
        }
        
      
        $this->set('parents', $this->Box->generatetreelist());
		$this->set('fgKeys', $this->Menu->generatetreelist());
    }
    function admin_move_up($id = null) {
        if (!$this->Box->moveup($id)) {
            //$this->Session->setFlash("La catégorie ne peut pas aller plus haut.", 'message_notice');
        } else {
            //$this->Session->setFlash("Ordre mis à jour.", 'message_ok');
        }
        
        $this->redirect($this->referer());
    }
    
    function admin_move_down($id = null) {
        if (!$this->Box->movedown($id)) {
            //$this->Session->setFlash("La catégorie ne peut pas aller plus bas.", 'message_notice');
        } else {
            //$this->Session->setFlash("Ordre mis à jour.", 'message_ok');
        }
        
        $this->redirect($this->referer());
    }
    
    function admin_delete($id = null) {
        $this->Box->id = $id;
        
        if (!$this->Box->exists()) {
            //$this->Session->setFlash("Enregistrement introuvable.", 'message_error');
        } else {
            $this->Box->removeFromTree($id, true);
            //$this->Session->setFlash("Données supprimées.", 'message_ok');
        }
        
        $this->redirect($this->referer());
    }
   
      




}
?>