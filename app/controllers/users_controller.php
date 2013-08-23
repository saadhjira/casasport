<?php 
class UsersController extends AppController {

    public $name = 'Users';
    public $layout = "admin";
    public $paginate = array('limit'=>15, 'order'=>array('User.id'=>'desc'));
    public $components = array('Cookie', 'Attachment'=>array('files_dir'=>'users', 'default_col'=>'photo', 'images_size'=>array('big'=>array(640, 480, 'resize'), 'med'=>array(263, 263, 'resizeCrop'), 'small'=>array(90, 90, 'resizeCrop'))));

    
    /**
     *  The AuthComponent provides the needed functionality
     *  for login, so you can leave this function blank.
     */
    function beforeFilter() {
    	parent::beforeFilter();
		
        $this->Auth->autoRedirect = false;
        $this->Auth->allow(array('login','logout'));	
        $this->User->setAttachment($this->Attachment);
		$groups = $this -> User -> Group -> find('list');
		$this -> set(compact('groups'));
       
    }
   
    function admin_index() {
    		
        	
         
        $results = $this->paginate('User');
		$this->set(compact('results'));
        
    }
    
    function admin_add() {
   
        if ($this->data) {
            $this->User->set($this->data);
            if ($this->User->validates()) {
                	
                
                if ($this->User->save($this->data, false)) {
                   $this->redirect(array("action"=>"admin_index"));
                }
            }
            
        }
        
    }
       function admin_edit($id, $password=null) {
       if ($this->data) {
            $this->User->set($this->data);
            if ($password!="password") {
                
				if ($this->User->validates(array('fieldList'=>array('realname', 'username', 'email')))) {
                   
                    //$this->Attachment->upload($this->data['User']);
                    if ($this->User->save($this->data, false)) {
                        $this->redirect(array("action"=>"admin_index"));
                    }
                }
            }else{
            	
            	if ($this->User->validates(array('fieldList'=>array('pass_new', 'passwd_confirm')))) {
                    if ($this->User->save($this->data, false)) {
                        
						$this->redirect(array("action"=>"edit/$id"));
                    }
                }
				
            }
            
        } else {
        	
            $this->data = $this->User->read(null, $id);
			
        }
		if($password=="password"){
				$this->set("password",true);
		}
    }
    
    public function admin_delete($id = null) {
        if (!$id) {
            $this->flash(__('Invalid User', true), array('action'=>'index'));
        }
        if ($this->User->delete($id)) {
            $this->flash(__('User deleted', true), array('action'=>'index'));
        } else {
            $this->flash(__('User deleted Fail', true), array('action'=>'index'));
        }
    }
    
    function login() {
        $this->layout = false;
		 if (!empty($this->data)&&$this->Auth->user()) {
		 	$user=$this->User->findById($this->Auth->user('id'));	
		    $this->Session->write('User.role',$user['Group']['name']);
			$this -> Cookie -> write('Groupe', $user['Group']['id']);
			
			$this->redirect($this->Auth->redirect());
		 }
		}
    
    function logout() {
        $this->Session->destroy();	
		$this -> Session -> destroy();
        $this->redirect($this->Auth->logout());
    }
}
?>
