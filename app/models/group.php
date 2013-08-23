<?php
class Group extends AppModel
{
	//public $displayField="name";
  var $actsAs = array('Acl' => array('requester'));
  var $hasMany = 'User';
 
  function parentNode()
  {return null;
  }
}
?>