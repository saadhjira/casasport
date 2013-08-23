<?php
    class CommentsController extends AppController {
    	
		public $name = 'Comments';
		public $components = array('RequestHandler','Security');
		public $layout = "admin";
		public $helpers = array('Article');
		public $paginate = array('limit' => 15, 'order' => array('Comment.id' => 'desc'));
		
		
		
		public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add');
}
		
	public function index() {

		
	}
	public function admin_edit($id = null) {
				if (!$id && empty($this->data)) {
					$this->flash(__('Invalid Post', true), array('action' => 'admin_index'));
				}
				if (!empty($this->data)) {
					
		
					if ($this->Comment->save($this->data)) {
						$this->redirect(array('action'=>'admin_index'));
						//$this->flash(__('The Post has been saved.', true), array('action' => 'admin_index'));
					} else {
					}
				}
				if (empty($this->data)) {
					$this->data = $this->Comment->read(null, $id);
					//$this->data = $this->Post->find('first', array('conditions' => array('_id' => $id)));
				}
				
		}
	public function admin_delete($id=null) {
		
		if(!$id) {
			   $this -> flash(__('Invalid Article', true), array('action' => 'index'));
		    }	
			if($this -> Comment -> delete($id)) {
				/*foreach($a['Media'] as $media){
				 $this->Attachment->delete_files($media["media_file_path"]);
				 }*/
				$this -> flash(__('Comment deleted', true), array('action' => 'index'));
			} else {
				$this -> flash(__('Comment deleted Fail', true), array('action' => 'index'));
			}
	}
	public function admin_index() {
	
		
		$results = $this -> paginate('Comment');

		$this -> set(compact('results'));

		
	}

	public function add() {
		
		if($this -> RequestHandler -> isAjax()) {
			$this -> autoRender = false;
			$returnData=array();
			if($this->data){
				
				$this->Comment->create();
				$this->Comment->set($this -> data);
				if($this->Comment->validates()){
					
					$this -> data['Comment']['model'] = 'Article';
					$this -> data['Comment']['subject_url'] = $this->referer();
				   if($this->Comment->save($this->data)){
				   	$returnData["message"]="comment saved";
				   }
				}else{
					$errors = $this->Comment->invalidFields();
					$returnData["errors"]=$errors;
                }
				 $this->set(compact('returnData'));
				 $this->render("add_json");
			}
			
		}else{
			//$this->cakeError('error404', array(array('url' => '/')));
			$this->redirect("/");
		}
		
	}	
	
    }

	
?>