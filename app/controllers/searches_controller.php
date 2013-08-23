<?php
class SearchesController extends AppController {
	public $name = 'Searches';

	public $uses = array('SearchIndex', 'Article', 'Media','User');

	public function admin_index() {
			
		if(!empty($this -> params['url']['q'])) {
			$this -> redirect(array("q" => $this -> params['url']['q'], 'in' => $this -> params['url']['in']));
		} else {
			$q=$this->passedArgs["q"];
			switch($this->passedArgs["in"]) {
				case "articles" :
					$model = "Article";
					$view = "articles";
					$controller= "articles";
					break;
				case "media" :
					$model = "Media";
					$view = "media";
					$controller= "media";
					break;
				case "users" :
					$model = "User";
					$view = "users";
					$controller= "users";
					break;
			}
			$this -> paginate = array('limit' => 10, 'conditions' => "MATCH(SearchIndex.data) AGAINST('$q' IN BOOLEAN MODE)");
			$res = $this -> paginate('SearchIndex');
			$arr_filter = array();
			foreach($res as $rec) {
				array_push($arr_filter, $rec['SearchIndex']['association_key']);
			}
			$results = $this -> {$model} -> find('all', array('conditions' => array("$model.id" => $arr_filter)));
			parent::checkAccess(array('controller'=>$controller));
			$this->params['controller']=$controller;
			$this -> set(compact('results'));
			$this -> viewPath = $view;
			$this -> render("admin_index","admin");
		}
	}

}
?>