<?php 
App::import('Sanitize');
class Comment extends AppModel {
	 	
	 #var $belongsTo = array('ImageAlbum' => array('counterCache' => true,'counterScope' => array('Image.active' => 1)); // only count if "Image" is active = 1    ));
	 
	 public $belongsTo = array('Article' => array('conditions' => array('Comment.model' => 'Article'),'foreignKey'=> 'fg_key',
	  'counterCache' => true,
	  'counterScope' => array('Comment.published' => 1)),
	   ); 
	  
	 public $validate = array(
	'nickname'=>array('rule'=>'notEmpty', 'required'=>true),
	'email'=>array('rule'=>'email', 'message'=>'Please provide valid email address.', 'required'=>true), 
	'body'=>array('rule'=>'notEmpty', 'message'=>'Please provide message.', 'required'=>true), 
	);
	
	function beforeSave() {
	
	$this->data = Sanitize::clean($this->data,array('encode'=>false));
	
	return true;
} 
}
?>