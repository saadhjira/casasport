<?php
class ChoicesController extends AppController {

	var $name = 'Choices';
	public $layout = "admin";
    // Automatically generated code.    
	function admin_index() {
		$this->Choice->recursive = 0;
		$this->set('choices', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid choice', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('choice', $this->Choice->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Choice->create();
			if ($this->Choice->save($this->data)) {
				$this->Session->setFlash(__('The choice has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The choice could not be saved. Please, try again.', true));
			}
		}
		$polls = $this->Choice->Poll->find('list');
		$this->set(compact('polls'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid choice', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Choice->save($this->data)) {
				$this->Session->setFlash(__('The choice has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The choice could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Choice->read(null, $id);
		}
		$polls = $this->Choice->Poll->find('list');
		$this->set(compact('polls'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for choice', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Choice->delete($id)) {
			$this->Session->setFlash(__('Choice deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Choice was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
