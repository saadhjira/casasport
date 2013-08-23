<?php
class Article extends AppModel {
	
	 public $hasAndBelongsToMany = array("Category",'Box');
	 public $hasMany=array("Comment"=>array('conditions' => array('Comment.model' => 'Article','Comment.published'=>1),
	 'foreignKey' => 'fg_key',"dependent"=>true),"Media"=>array('conditions' => array('Media.model' => 'Article'),
	 'foreignKey' => 'fg_key',"dependent"=>true));
	 public $actsAs = array('Containable','Searchable');
	 public $belongsTo = array('User' => array(
	  'foreignKey'=> 'author_id')); 
	
				
	 public $validate = array(
        'title'=> array(
    		'rule' =>'notEmpty',             
   			'required' => true,  'message' => 'Chiffres et lettres uniquement !' ),
    );
	
	function clean($value){
		return strip_tags(html_entity_decode($value,ENT_COMPAT,'UTF-8'));
	}
	
	function indexData() {
		         
		         $this->Media->Behaviors->detach('Searchable');
		         $index = $this->clean($this->data['Article']['title']).'.'.$this->clean($this->data['Article']['body']);
				 return $index;
   }
	
}

?>
