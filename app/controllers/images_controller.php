<?php
class ImagesController extends AppController {

	var $name = 'Images';
	public $layout = "admin";
	public  $paginate = array('limit' => 15,
	     'order' => array('Image.id' => 'desc')
	);
	public $helpers = array('Form', 'Html', 'Javascript', 'Time','Media');
	public $components = array(
			    'Attachment'=>array(
				    'files_dir'=>'images', 
				    'default_col'=>'photo', 
				    'images_size'=>array(
					    'big'  => array(640, 480, 'resize'), 
					    'med'  => array(263, 263, 'resizeCrop'),
					    'small'=> array(90, 90, 'resizeCrop'))));
	

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Image->setAttachment($this->Attachment);
	}
	 
	function admin_index() {
		$this->Image->recursive = 0;
		$this->set('images', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid image', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('image', $this->Image->read(null, $id));
	}

	function admin_add() {
		if ($this->data){
			print_r($this->data);
			$this->Image->create();
			$this->Attachment->upload($this->data['Image']);
			print_r($this->data);
			if(!empty($this->data['Image']['video_path'])){
					$this->data['Image']['Image_content_type']='video';
				}
			if($this->Image->save($this->data)){
            $this->redirect(array('action'=>'admin_index'));
            }
				//$this->flash(__('Post saved.', true), array('controller'=>'Image','action' => 'admin_index'));
				//$this->redirect(array('action'=>'admin_index'));
			}
		$galleries = $this->Image->Gallery->find('list');
		$this->set(compact('galleries'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid image', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->Attachment->upload($this->data['Image']);
			if ($this->Image->save($this->data)) {
				$this->Session->setFlash(__('The image has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The image could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Image->read(null, $id);
		}
		$galleries = $this->Image->Gallery->find('list');
		$this->set(compact('galleries'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for image', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Image->delete($id)) {
			$this->Session->setFlash(__('Image deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Image was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>