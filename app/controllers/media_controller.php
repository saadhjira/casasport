<?php
    class MediaController extends AppController {
    	
		 public $name = 'Media';
		 public $layout="admin";
		  public  $paginate = array('limit' => 15,
	   'order' => array('Media.id' => 'desc')
	   );
	   public $helpers = array('Form', 'Html', 'Javascript', 'Time','Media');
		 public  $components = array('Attachment' => array( 'rm_tmp_file'=>false,'images_size' => array(
			/* You may define as many options as you like */
			'big'   => array(640, 480, 'resize'),
			'med'   => array(263, 263, 'resizeCrop'),
			'small' => array( 90,  90, 'resizeCrop'),
		)));
		  
		public function beforeFilter() {
    	  parent::beforeFilter();
          $this->Media->setAttachment($this->Attachment);
		   }  
		  
		  public function admin_index() {
    		$results = $this->paginate('Media');
        $this->set('results',$results);
		   }
		  
			public function admin_edit($id = null) {
				if (!$id && empty($this->data)) {
					$this->flash(__('Invalid Post', true), array('action' => 'admin_index'));
				}
				if (!empty($this->data)) {
					
		  $this->Attachment->upload($this->data['Media']);
					if ($this->Media->save($this->data)) {
						$this->redirect(array('action'=>'admin_index'));
						//$this->flash(__('The Post has been saved.', true), array('action' => 'admin_index'));
					} else {
					}
				}
				if (empty($this->data)) {
					$this->data = $this->Media->read(null, $id);
					//$this->data = $this->Post->find('first', array('conditions' => array('_id' => $id)));
				}
				
		}
			
		public function admin_add() {
		
             if ($this->data){
			$this->Media->create();
			$this->Attachment->upload($this->data['Media']);
			print_r($this->data);
			if(!empty($this->data['Media']['video_path'])){
					$this->data['Media']['media_content_type']='video';
				}
			if($this->Media->save($this->data)){
            $this->redirect(array('action'=>'admin_index'));
            }
				//$this->flash(__('Post saved.', true), array('controller'=>'media','action' => 'admin_index'));
				//$this->redirect(array('action'=>'admin_index'));
			}
		
	}
	
		public function admin_delete($id = null) {
		if (!$id) {
			$this->flash(__('Invalid Post', true), array('action' => 'admin_index'));
		}
		
		if ($this->Media->delete($id)) {
			$this->redirect(array('action'=>'admin_index'));
			//$this->flash(__('Media deleted', true), array('action' => 'admin_index'));
		} else {
			$this->flash(__('Media deleted Fail', true), array('action' => 'admin_index'));
		}
	}	
		
		
    }
	
?>