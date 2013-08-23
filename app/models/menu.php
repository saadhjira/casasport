<?php
class Menu extends AppModel {
	public $actsAs = array('Tree'
	);
	
	public $validate = array(
        'title'=> array(
		    'rule' =>'notEmpty',             
		   'required' => true,  'message' => 'Titre Obligatoire' ),
   'permalink'=> array(
		    'rule' =>'isUnique',             
		   'required' => true,  'message' => 'permalink Obligatoire' ),
	
       
    );
     

	 
	  

}


?>
