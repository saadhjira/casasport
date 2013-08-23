<?php
class PollsController extends AppController {

	public $name = 'Polls';
	public $layout = "admin";
	public $helpers = array('Javascript', 'Form', 'Html');
	

	function beforeFilter()
	{
		// Calling parent::beforeFilter is good practise, in case the app_controller.php file has logic of its own in its own beforeFilter() method.
		parent::beforeFilter();

		// Allow the view and index pages to be viewed without logging in.
		$this->Auth->allow('view', 'index');
	}

	// To view a poll and its choices, this page must be navigated to
	function view($id = null) {
		$id = 4;
		$poll = $this->Poll->read(null, $id);
		
		$this->set(compact('poll'));
		// Pass the poll and its related data to the view
	}

	// A listing of existing polls
	function index() {
		$this->Poll->recursive = 0;
		$this->set('polls', $this->paginate());
	}

	// Automatically generated code. Should all work fine.
	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid poll', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('poll', $this->Poll->read(null, $id));
	}

	function admin_index() {
		$this->Poll->recursive = 0;
		$this->set('polls', $this->paginate());
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Poll->create();
			if ($this->Poll->save($this->data)) {
				$this->Session->setFlash(__('The poll has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The poll could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid poll', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Poll->save($this->data)) {
				$this->Session->setFlash(__('The poll has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The poll could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Poll->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for poll', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Poll->delete($id)) {
			$this->Session->setFlash(__('Poll deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Poll was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}