<?php
class Category extends AppModel {
	public $actsAs = array('Tree');
public $validate = array(
        'title'=> array(
		    'rule' =>'notEmpty',             
		   'required' => true,  'message' => 'Titre Obligatoire !' ),
    );

}


?>
