<?php
class ArticlesController extends AppController {

	public $name = 'Articles';
	public $layout = "admin";
	public $paginate = array('limit' => 15, 'order' => array('Article.id' => 'desc'));
	public $uses = array("Article", "Media", "Box");
	public $components = array('RequestHandler', 'Attachment' => array('default_col' => 'media', 'images_size' => array('big' => array(640, 480, 'resize'), 'slide' => array(600, 280, 'resizeCrop'), 'med' => array(263, 263, 'resizeCrop'), 'small' => array(90, 90, 'resizeCrop'), )));
	public $helpers = array('Text','Form', 'Html', 'Javascript', 'Time', 'Media','Article');

	public function beforeFilter() {
		parent::beforeFilter();
		
		if(in_array($this -> action, array("admin_search", "admin_edit", "admin_add"))) {
			$authors = $this -> Article -> User -> find('list');
			$categories = $this -> Article -> Category -> generatetreelist(null, "{n}.Category.id", "{n}.Category.title");
			$boxes = $this -> Article -> Box -> generatetreelist(null, "{n}.Box.id", "{n}.Box.title");
			$this -> set(compact('authors', 'categories', 'boxes'));
		}
	}

	

	public function admin_save_weights() {
		
		if($this -> RequestHandler -> isAjax()) {
			$this -> autoRender = false;
			//Configure::write('debug', 0);
			$res = json_decode($this -> data);
			foreach($res as $object) {
				$this -> Article -> updateAll(array("Article.weight" => $object -> value), array("Article.id" => $object -> id));
			}
			echo json_encode(array("success"=>"ok"));
		}
	}

	public function admin_search() {
		if(isset($this -> params['url']['usid']) || isset($this -> params['url']['phd']) || isset($this -> params['url']['ctid'])) {

			$this -> redirect(array("usid" => $this -> params['url']['usid'], 'phd' => $this -> params['url']['phd'], 'ctid' => $this -> params['url']['ctid'], 'bxid' => $this -> params['url']['bxid']));
		} else {

			$filters = array();
			$options = array();
			if(isset($this -> passedArgs["usid"])) {
				$usid = $this -> passedArgs["usid"];
				array_push($filters, "Article.author_id ='$usid'");
			}
			if(isset($this -> passedArgs["phd"])) {
				$phd = $this -> passedArgs["phd"];
				array_push($filters, "Article.published = $phd");
			}
			if(isset($this -> passedArgs["ctid"])) {
				$ctid = $this -> passedArgs["ctid"];
				array_push($filters, "ArticlesCategory.category_id = $ctid");
				$options['joins'] = array( array('table' => 'articles_categories', 'alias' => 'ArticlesCategory', 'type' => 'inner', 'conditions' => array('Article.id = ArticlesCategory.article_id')));

			}
			if(isset($this -> passedArgs["bxid"])) {
				$ctid = $this -> passedArgs["bxid"];
				array_push($filters, "ArticlesBox.box_id = $ctid");
				$options['joins'] = array( array('table' => 'articles_boxes', 'alias' => 'ArticlesBox', 'type' => 'inner', 'conditions' => array('Article.id = ArticlesBox.article_id')));

			}
			$options['conditions'] = $filters;
			$this -> paginate = array_merge($this -> paginate, $options);
			$results = $this -> paginate('Article');
			$this -> set(compact('results'));
			$this -> render("admin_index");
		}
	}

	public function index() {

		$results = $this -> paginate('Article');

		$this -> set(compact('results'));

	}

	public function admin_index() {

		$results = $this -> paginate('Article');

		$this -> set(compact('results'));

	}

	public function admin_add() {

		if(empty($this -> data['Media']['-1']['media']['size'])) {
			unset($this -> data['Media']['-1']);
		}

		if(empty($this -> data['Media']['-2']['video_path'])) {
			unset($this -> data['Media']['-2']);

		}

		if(empty($this -> data['Media'])) {
			unset($this -> data['Media']);
		}
		
		

		if(!empty($this -> data)) {
			$this -> Article -> create();
			$this -> Article -> set($this -> data);

			if($this -> Article -> validates()) {

				if(!empty($this -> data['Media']['-1'])) {
					$this -> Attachment -> upload($this -> data['Media']['-1']);
					$this -> data['Media']['-1']['model'] = 'Article';
				}
				if(!empty($this -> data['Media']['-2'])) {
					$this -> data['Media']['-2']['model'] = 'Article';
				}
				if($this -> Article -> saveAll($this -> data, array("validate" => false))) {
					
					$this -> flash(__('Post saved.', true), array('action' => 'index'));
				}
			} else {
				unset($this -> data['Media']);
			}

		}

	}

	/**
	 * edit method
	 *
	 * @param mixed $id null
	 * @return void
	 * @access public
	 */
	public function admin_edit($id = null) {
		if(!$id && empty($this -> data)) {
			$this -> flash(__('Invalid Post', true), array('action' => 'index'));
		}
		
		if(empty($this -> data['Media']['-1']['media']['size'])) {
			unset($this -> data['Media']['-1']);
		}

		if(empty($this -> data['Media']['-2']['video_path'])) {
			unset($this -> data['Media']['-2']);
		}

		if(empty($this -> data['Media'])) {
			unset($this -> data['Media']);
		}

		if(!empty($this -> data['Media']['remove'])) {
			$media_to_remove = $this -> data['Media']['remove'];
			unset($this -> data['Media']['remove']);
		}

		if(!empty($this -> data)) {

			$this -> Article -> set($this -> data);

			if($this -> Article -> validates()) {
               if(!empty($this -> data['Media']['-1'])) {
					$this -> Attachment -> upload($this -> data['Media']['-1']);
					$this -> data['Media']['-1']['model'] = 'Article';

				}
				if(!empty($this -> data['Media']['-2'])) {
					$this -> data['Media']['-2']['model'] = 'Article';
				}

				$this -> Media -> setAttachment($this -> Attachment);
                 
				if($this -> Article -> saveAll($this -> data, array("validate" => false))) {
					
					if(!empty($media_to_remove)) {
						foreach($media_to_remove as $key => $val) {
							$this -> Media -> delete($key);
							//$this->Attachment->delete_files($val);
						}
					}
					$this -> flash(__('The Post has been saved.', true), array('action' => 'index'));
				}
			} else {
				unset($this -> data['Media']['-1']);
			}
		}
		if(empty($this -> data)) {
			$this -> data = $this -> Article -> read(null, $id);
			
			
		}

	}

	/**
	 * delete method
	 *
	 * @param mixed $id null
	 * @return void
	 * @access public
	 */
	public function admin_delete($id = null) {
		
		//$a=$this->Article->read(null, $id);

		$this -> Media -> setAttachment($this -> Attachment);

		if($this -> RequestHandler -> isAjax()) {
			$this -> autoRender = false;
			if($this -> data){
			  if($this->Article->deleteAll(array("Article.id"=>explode(",",$this->data),true))) {
			  	   echo json_encode(array("success"=>"ok"));
			  }	
			}
		} else {
			if(!$id) {
			   $this -> flash(__('Invalid Article', true), array('action' => 'index'));
		    }	
			if($this -> Article -> delete($id)) {
				/*foreach($a['Media'] as $media){
				 $this->Attachment->delete_files($media["media_file_path"]);
				 }*/
				$this -> flash(__('Article deleted', true), array('action' => 'index'));
			} else {
				$this -> flash(__('Article deleted Fail', true), array('action' => 'index'));
			}
		}
	}
	function flux()
		{
			//print_r($this->params);
			$this->Article->bindModel(array('hasOne' => array('ArticlesCategory')));
			if ($this->params['par'] == "general") {
				$articles = $this->Article->find(
					'all',
					array('conditions' =>array('Article.published'=>1) 
					,'order' => 'dated_at DESC','limit' => 15)
				);
				
				$channel = array(
					'title' => utf8_encode("Mon flux RSS"),
					'description' => utf8_encode("Tous les articles"),
					'language' => 'fr',
					'webMaster' => 'wijhatnadar@devocean.ma'
				);
			}
			else{
				$articles = $this->Article->find(
					'all',
					array('conditions' =>array('ArticlesCategory.category_id' => $this->params['par'],'Article.published'=>1) 
					,'order' => 'dated_at DESC','limit' => 35)
				);
				
				$channel = array(
					'title' => utf8_encode("Mon flux RSS"),
					'description' => utf8_encode("Les derniers articles"),
					'language' => 'fr',
					'webMaster' => 'wijhatnadar@devocean.ma'
				);
			}
	 
			$this->set(compact('articles', 'channel'));
		}
		
	function fluxbox()
		{
			//print_r($this->params);
			$this->Article->bindModel(array('hasOne' => array('ArticlesBox')));
			$articles = $this->Article->find(
				'all',
				array('conditions' =>array('ArticlesBox.box_id' => $this->params['par'],'Article.published'=>1) 
				,'order' => 'dated_at DESC','limit' => 80)
			);
			//print_r($articles);
			$channel = array(
				'title' => utf8_encode("Mon flux RSS"),
				'description' => utf8_encode("Les derniers articles"),
				'language' => 'fr',
				'webMaster' => 'wijhatnadar@devocean.ma'
			);
			$this->set(compact('articles', 'channel'));
		}
}

?>
