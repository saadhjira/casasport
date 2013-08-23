<?php 
class User extends AppModel {
	public $displayField="realname";
    public $validate = array('realname'=>array('rule'=>'notEmpty', 'required'=>true),
	'username'=>array('rule'=>'alphaNumeric', 'required'=>true), 
	'email'=>array('rule'=>'email', 'message'=>'Please provide valid email address.', 'required'=>true), 
	'pass_new'=>array('rule'=>'alphaNumeric', 'message'=>'Please provide password.', 'required'=>true), 
	'passwd_confirm'=>array('rule'=>'matchpwd', 'message'=>'Confirm password doesnt match')
    );
    public $actsAs = array('Acl' => array('requester'),'Searchable');

  	var $belongsTo = array('Group');
    /*
     * This method will be called to check password match
     */
    public function setAttachment($attachment){
		$this->attachment=$attachment;
	}
	function matchpwd($data) {
        if ($this->data['User']['passwd_confirm'] != $this->data['User']['pass_new']) {
            return false;
        }
        return true;
    }

    public function beforeDelete($cascade){
    	
		    $m=$this->read(null,$this->id);
			$this->attachment->delete_files($m["User"]["photo_file_path"]);
			return true;
	}
	
	function beforeSave()
    {
        if (!empty($this->data['User']['pass_new']))
        {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['pass_new']);
        }
     return true;
 }


	function parentNode(){
        if (!$this->id && empty($this->data)) {
        return null;
    }
    if (isset($this->data['User']['group_id'])) {
	$groupId = $this->data['User']['group_id'];
    } else {
    	$groupId = $this->field('group_id');
    }
    if (!$groupId) {
	return null;
    } else {
        return array('Group' => array('id' => $groupId));
    }
    }
  
  function bindNode($user) {
    return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
}



}


?>
