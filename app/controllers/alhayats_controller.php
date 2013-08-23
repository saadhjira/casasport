<?php
class AlhayatsController extends AppController {

	var $name = 'Alhayats';
	public $layout = "admin";
	public $uses = array("Alhayat", "Media", 'Article', "Category");
	public $paginate = array('limit' => 15, 'order' => array('Article.id' => 'desc'));
	public $helpers = array('Javascript', 'Form', 'Html','xml');
	public $components = array("Cookie", 'Attachment' => array('default_col' => 'media', 'images_size' => array(
	/* You may define as many options as you like */
		'big' => array(640, 480, 'resize'), 'med' => array(263, 263, 'resizeCrop'), 'small' => array(90, 90, 'resizeCrop'), )));

	function beforeFilter() {
		$this -> Auth -> allow(array("admin_search", "admin_index", "admin_edit", "admin_delete", "admin_articleslist"));
	}

	function admin_index() {
		// $results = $this -> paginate('Alhayat');
// 
		// $this -> set(compact('results'));
		
		$this -> loadModel('Category');

		$date = $this -> params["url"]["dated_at"];

		$this -> Cookie -> write('year', $date["year"]);
		$this -> Cookie -> write('month', $date["month"]);
		$this -> Cookie -> write('day', $date["day"]);

		$results = $this -> Category -> find('all', array("conditions" => array("Category.parent_id" => 1)));

		//print_r($this->Cookie->read('year'));die();

		$this -> set(compact('results'));
	}
	
	// function admin_search() {
		// $date = $this -> params["url"]["dated_at"];
// 
		// $this -> Cookie -> write('year', $date["year"]);
		// $this -> Cookie -> write('month', $date["month"]);
		// $this -> Cookie -> write('day', $date["day"]);
// 		
		// $results = $this -> Alhayat -> Query("SELECT * From alhayats where title = '1' ");
// 
		// print_r($results);die();
// 
		// $this -> set(compact('results'));
	// }

	function admin_search() {
		$this -> loadModel('Category');

		$date = $this -> params["url"]["dated_at"];

		$this -> Cookie -> write('year', $date["year"]);
		$this -> Cookie -> write('month', $date["month"]);
		$this -> Cookie -> write('day', $date["day"]);

		$results = $this -> Category -> find('all', array("conditions" => array("Category.parent_id" => 1)));

		//print_r($this->Cookie->read('year'));die();

		$this -> set(compact('results'));
	}

	function admin_add() {
		print_r($this -> data);

		if (empty($this -> data['Media']['-1']['media']['size'])) {
			unset($this -> data['Media']['-1']);
		}

		if (empty($this -> data['Media']['-2']['size'])) {

		}
		if (empty($this -> data['Media'])) {
			unset($this -> data['Media']);
		}
		if (!empty($this -> data)) {
			$this -> Alhayat -> create();
			$this -> Alhayat -> set($this -> data);

			if ($this -> Alhayat -> validates()) {

				foreach ($this->data['Media'] as $media) {
					if (!empty($media)) {
						$this -> Attachment -> upload($media);
						//$this -> data['Media']['-1']['model'] = 'Alhayat';
						$this -> Media -> setAttachment($this -> Attachment);
					}
				}

				if (!empty($this -> data['Media']['-1'])) {
					$this -> Attachment -> upload($this -> data['Media']['-1']);
					$this -> data['Media']['-1']['model'] = 'Alhayat';

				}
				if (!empty($this -> data['Media']['-2'])) {

					$this -> Attachment -> upload($this -> data['Media']['-2']);
					$this -> data['Media']['-2']['model'] = 'Alhayat';

					$this -> Media -> setAttachment($this -> Attachment);
					print_r($this -> data['Media']);
					die();
				}
				if ($this -> Alhayat -> saveAll($this -> data, array("validate" => false))) {

					$this -> flash(__('Post saved.', true), array('action' => 'index'));
				}
			} else {
				unset($this -> data['Media']);
			}

		}

	}

	function admin_edit($id = null) {
		$this -> loadModel('Category');

		if (!empty($this -> data)) {

			//print_r($this -> data);die();

			$arr_ext = array('pdf');
			//set allowed extensions

			if (!empty($this -> data['Category']['PDF'])) {

				if (!file_exists(WWW_ROOT . 'Journal' . DS . $this -> data['Category']['title'])) {
					mkdir(WWW_ROOT . 'Journal' . DS . $this -> data['Category']['title']);
				}
				$info_pdf = $this -> data['Category']['PDF'];
				//put the data into a var for easy use
				$extLogo = substr(strtolower(strrchr($info_pdf['name'], '.')), 1);
				//get the extension

				if (in_array($extLogo, $arr_ext)) {
					move_uploaded_file($info_pdf['tmp_name'], WWW_ROOT . 'Journal' . DS . $this -> data['Category']['title'] . DS . $info_pdf['name']);
					$this -> data['Category']['PDF'] = $info_pdf['name'];
				}
			}

			if (!empty($this -> data['Category']['IDML'])) {

				if (!file_exists(WWW_ROOT . 'Journal' . DS . $this -> data['Category']['title'])) {
					mkdir(WWW_ROOT . 'Journal' . DS . $this -> data['Category']['title']);
				}
				$info_pdf = $this -> data['Category']['IDML'];
				//put the data into a var for easy use
				$extLogo = substr(strtolower(strrchr($info_pdf['name'], '.')), 1);
				//get the extension

				if (in_array($extLogo, $arr_ext)) {
					move_uploaded_file($info_pdf['tmp_name'], WWW_ROOT . 'Journal' . DS . $this -> data['Category']['title'] . DS . $info_pdf['name']);
					$this -> data['Category']['IDML'] = $info_pdf['name'];
				}
			}

			$data = array('id' => $this -> data['Category']['id'], 'title' => $this -> data['Category']['title'], 'page' => $this -> data['Category']['page']);

			if ($this -> data['Category']['PDF']['error'] != 4) {
				$data['PDF'] = $this -> data['Category']['PDF'];
			}

			if ($this -> data['Category']['IDML']['error'] != 4) {
				$data['IDML'] = $this -> data['Category']['IDML'];
			}

			if ($this -> Category -> saveAll($data)) {

				$this -> flash(__('The PDF has been saved.', true), array('action' => 'index'));
			}

		}
		if (empty($this -> data)) {
			$this -> data = $this -> Category -> read(null, $id);
		}

	}

	function admin_delete($id = null) {
		if (!$id) {
			$this -> Session -> setFlash(__('Invalid id for PDF', true));
			$this -> redirect(array('action' => 'index'));
		}
		if ($this -> Alhayat -> delete($id)) {
			$this -> Session -> setFlash(__('PDF deleted', true));
			$this -> redirect(array('action' => 'index'));
		}
		$this -> Session -> setFlash(__('PDF was not deleted', true));
		$this -> redirect(array('action' => 'index'));
	}

	function admin_articleslist($id = null) {
		$this -> loadModel('Article');
		$this -> loadModel('Category');

		$filters = array();
		$options = array();

		array_push($filters, "ArticlesCategory.category_id = $id");
		$options['joins'] = array( array('table' => 'articles_categories', 'alias' => 'ArticlesCategory', 'type' => 'inner', 'conditions' => array('Article.id = ArticlesCategory.article_id')));

		array_push($filters, "Article.published = 1");
		
		array_push($filters, "Article.dated_at = '2013-09-01' ");
		// array_push($filters, "Article.published_magazine = 1");

		$options['conditions'] = $filters;

		$this -> paginate = array_merge($this -> paginate, $options);
		$results = $this -> paginate('Article');
		$this -> set(compact('results'));
	}
	
	function admin_export($id = null) {
		
		$this -> loadModel('Article');
		$this -> loadModel('Category');

		$filters = array();
		$options = array();

		array_push($filters, "ArticlesCategory.category_id = $id");
		$options['joins'] = array( array('table' => 'articles_categories', 'alias' => 'ArticlesCategory', 'type' => 'inner', 'conditions' => array('Article.id = ArticlesCategory.article_id')));

		array_push($filters, "Article.published = 1");
		
		array_push($filters, "Article.dated_at = '2013-09-01' ");
		// array_push($filters, "Article.published_magazine = 1");

		$options['conditions'] = $filters;

		$articles = $this -> Article -> find('all',$options);
		
		print_r($articles);die();
	}
	
	public function admin_sitemap($id = null) {
		
		$this->layoutPath="xml";
		$this->layout="default";
        
        $this -> loadModel('Article');
		$this -> loadModel('Category');

		$filters = array();
		$options = array();

		array_push($filters, "ArticlesCategory.category_id = $id");
		$options['joins'] = array( array('table' => 'articles_categories', 'alias' => 'ArticlesCategory', 'type' => 'inner', 'conditions' => array('Article.id = ArticlesCategory.article_id')));

		array_push($filters, "Article.published = 1");
		
		array_push($filters, "Article.dated_at = '2013-09-01' ");

		$options['conditions'] = $filters;

		$articles = $this -> Article -> find('all',$options);
		
		foreach ($articles as $value) {
			if (!file_exists(WWW_ROOT . "Journal".DS."".$value["Category"][0]["title"])) {
				mkdir(WWW_ROOT . "Journal".DS."".$value["Category"][0]["title"]);
			}
		}
		
		$this->set(compact('articles'));
		$this->viewPath="articles";
		
		$this->render("xml/sitemap");
    }
}
?>