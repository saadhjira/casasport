<?php
class Media extends AppModel {
    public $actsAs = array('Searchable');
	
	public $belongsTo = array('Article' => array('conditions' => array('Media.model' => 'Article'),'foreignKey'=> 'fg_key',
	  'counterCache' => true
	  ),
	 );
	public $validate = array(
        'title'=> array(
    'rule' =>'notEmpty',             
   'required' => true,  'message' => 'Chiffres et lettres uniquement !' ),
       
    );
	
	public function setAttachment($attachment){
		$this->attachment=$attachment;
	}
	
	public function beforeDelete($cascade){
		    $m=$this->read(null,$this->id);
			$this->attachment->delete_files($m["Media"]["media_file_path"]);
			return true;
	}
	
	function clean($value){
		return strip_tags(html_entity_decode($value,ENT_COMPAT,'UTF-8'));
	}
	
	function indexData() {
		         
		        
		         $index = $this->clean($this->data['Media']['title']).'.'.$this->clean($this->data['Media']['caption']);
				  
				 return $index;
   }
	
	
	
	
}


?>
