<?php
class Alhayat extends AppModel {
	
	public $useTable = false;
	public $hasMany=array("Media"=>array('conditions' => array('Media.model' => 'Alhayat'),
	 'foreignKey' => 'fg_key',"dependent"=>true));
}


?>
