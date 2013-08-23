<?php
/**
 * Site front-end controller
 */

class PagesController extends AppController {
    public $name = 'Pages';
	public $layout="application__";
	public $helpers = array('Ajax',"Text","Article","Media",'Miladi','Hijri','xml','Form', 'Html', 'Javascript', 'Time', 'Media','Cache');
	public $uses = array('Menu','Box');
	public $components = array('Cookie','Security');
	
	
	
	public function beforeFilter(){
		parent::beforeFilter();
		
		$menus=$this->Menu->find('threaded',array(
		'conditions' => array('id >' => 1,'disabled'=>false
		   ),
		 'order' => array('lft' =>"ASC"),  
		   ));
		  $box=$this->Box;
		  $this->set(compact("menus","box"));
	}
	
	public function show_info() {
			$this -> render($this->params['par'],"application");
	}
	public function show_searches() {
			
		if(!empty($this -> params['url']['q'])) {
			$this -> redirect(array("controller"=>"searches","q" => $this -> params['url']['q']));
		} else {
			$this->loadModel("SearchIndex");
			$this->loadModel("Article");
			$q=$this->passedArgs["q"];
			$this -> paginate = array('limit' => 10, 'conditions' => "MATCH(SearchIndex.data) AGAINST('$q' IN BOOLEAN MODE)");
			$res = $this -> paginate('SearchIndex');
			$arr_filter = array();
			foreach($res as $rec) {
				array_push($arr_filter, $rec['SearchIndex']['association_key']);
			}
			$results = $this -> Article -> find('all', array('conditions' => array("Article.id" => $arr_filter)));
			
			$this->params['controller']='Articles';
			$this -> set(compact('results'));
			$this -> viewPath = 'elements';
			$this -> render("boxes/page_search","application");
		}
	}
	
	public function show() {
			if ($this -> params['url']['url'] == "/") {
				$this -> params['menu'] = "home";
			}
			if (isset($this -> params['menu'])) {
				//$menuItem = $this->Menu->paginate('Menu',array('Permalink'=>$this->params['menu']));
				$menuItem = $this -> Menu -> findByPermalink($this -> params['menu']);
				if (!empty($menuItem['Menu']['meta_title'])) {
					$meta_title = $menuItem['Menu']['meta_title'];
				} else {
					$meta_title = 'كازاسبور' . ' | ' . $menuItem['Menu']['title'];
				}

				if (!empty($menuItem['Menu']['meta_description'])) {
					$meta_description = $menuItem['Menu']['meta_description'];
				}

				if ($menuItem["Menu"]["permalink"] == "home") {
					$meta_link_canonical = "http://www.wijhatnadar.com";
					$this -> set(compact('menuItem', 'meta_title', "meta_description", "meta_link_canonical"));
					$this -> viewPath = "elements/boxes";
					$this -> render($menuItem['Menu']['view']);
				}else{
					$this -> loadModel("Article");
					$this -> loadModel("Menu");
					
					$menuItem = $this -> Menu -> findByPermalink($this -> params['menu']);
					$pageindex = $this -> params['url']['p'];
					$this -> loadModel("Box");
					$result = $this -> Box -> get($menuItem['Menu']['permalink'] . '_featured_slide');
					//print_r($result);die();
					$min = $pageindex * 10;
					$max = 10;
					//$min+15;
					$result['Box']['limit'] = $min . ', ' . $max;
					//print_r($result);die();
					if (!empty($menuItem['Menu']['meta_title'])) {
						$meta_title = $menuItem['Menu']['meta_title'];
					} else {
						$meta_title = 'كازاسبور' . ' | ' . $menuItem['Menu']['title'];
					}
		
					if (!empty($menuItem['Menu']['meta_description'])) {
						$meta_description = $menuItem['Menu']['meta_description'];
					}
		
					$this -> set(compact('result', 'menuItem', 'meta_title', "meta_description", "meta_link_canonical"));
					$this -> viewPath = "elements/boxes";
		
					$this -> render('menu_second');
				}
		}
	}
	
	public function show_article(){

		$this->loadModel("Article");
		//debug($this -> params);die();
		$articleItem=$this->Article->read(null,$this->params['id']);
		if (empty($articleItem)) {
				 //$this->redirect(array('action' => 'index'), 301);
				 $this->cakeError('error404', array(array('url' => $this->action)));
		}else {
		$dated=$articleItem["Article"]['dated_at'];
		$neighbors = $this->Article->find('neighbors', array('field' => 'dated_at', 'value' =>$dated ));

		if(!empty($articleItem) && !$this->check_if_spider()){
			
	      $this->Article->updateAll(array('Article.readings_count'=>'Article.readings_count+1'),
	        array("Article.id"=>$articleItem["Article"]["id"])
		  );
		}
	
		if(!empty($articleItem['Article']['meta_first_key'])){
			$meta_title=$articleItem['Article']['meta_first_key'].'-'.$articleItem['Article']['title'];
		}else{
			$meta_title=$articleItem['Article']['title'];
		}

		
		$meta_description=$this->Truncate(strip_tags($articleItem['Article']['body']),250);	
		$meta_facebook_image=$articleItem['Media'][0]['media_file_path'];
		$video=split("/", $articleItem['Media'][0]['video_path']);
		
		if(!empty($video[4])){
			$meta_facebook_video=$video[4];
			$meta_og_title='فيديو: '.$articleItem['Article']['title'];
		}else{
			$meta_og_title=$articleItem['Article']['title'];
		}
		
		$randomArticles = $this->Article->find('all', array('order' => 'RAND()', 'limit' => "6"));
		
		$meta_type="article";
		$this->set(compact('randomArticles','neighbors','meta_og_title','meta_facebook_video','articleItem','meta_title','meta_description','meta_facebook_image','meta_type'));
		$this->viewPath="elements/boxes";
		$this->render("page_single_view_article");
	}
	}
	
	public function show_media_page(){
		
		$this -> loadModel("Article");
		$this -> loadModel("Menu");
		
		$menuItem = $this -> Menu -> findByPermalink("media");
		$pageindex = $this -> params['url']['p'];
		$this -> loadModel("Box");
		$result = $this -> Box -> get($menuItem['Menu']['permalink'] . '_playlist');
		//print_r($result);die();
		$min = $pageindex * 21;
		$max = 21;
		//$min+15;
		$result['Box']['limit'] = $min . ', ' . $max;
		//print_r($result);die();
		if (!empty($menuItem['Menu']['meta_title'])) {
			$meta_title = $menuItem['Menu']['meta_title'];
		} else {
			$meta_title = 'وجهات نظر' . ' | ' . $menuItem['Menu']['title'];
		}

		if (!empty($menuItem['Menu']['meta_description'])) {
			$meta_description = $menuItem['Menu']['meta_description'];
		}

		$this -> set(compact('result', 'menuItem', 'meta_title', "meta_description", "meta_link_canonical"));
		$this -> viewPath = "elements/boxes";
		$this -> render('media_playlist');
	}
	
	public function show_media(){

		$this->loadModel("Media");
		$mediaItem=$this->Media->read(null,$this->params['id']);
		if(empty($mediaItem))
		{
		  	
	  	}
		if(!empty($mediaItem) ){
		}
		$this->set(compact('mediaItem'));
		$this->viewPath="elements/boxes";
		$this->render("page_single_view_media");
	}
	
	public function show_biblio(){
		$this->loadModel("User");
		$userItem=$this->User->read(null,$this->params['id']);
		
		print_r($this->params['id']);
		//$meta_title=$articleItem['Article']['title'];
		//$meta_description=$this->Truncate(strip_tags($articleItem['Article']['']),250);	 
		
		$this->set(compact('userItem'));
		$this->viewPath="elements/boxes";
		$this->render("Page_single_view_user");
	}

	public function sitemap() {
		
		$this->layoutPath="xml";
		$this->layout="default";
        $this->loadModel("Menu");
     	$results = $this->Menu->find("all",array('fields' => array('Menu.id', 'Menu.permalink','Menu.priority','Menu.changefreq')));
     	$this->set(compact("results"));
		$this->viewPath="menus";
		$this->render("xml/sitemap");
    }
    
	public function sitemaptwodays() {
		
		$this->layoutPath="xml";
		$this->layout="default";
        $this->viewPath="articles";
		$this->render("xml/sitemap");
	}
	public function sitemapgooglenews() {
		$this->layoutPath="xml";
		$this->layout="default";
        $this->viewPath="articles";
		$this->render("xml/sitemapnews");
	}
	
    public function sitemapsixmonths() {
		
		$this->layoutPath="xml";
		$this->layout="default";
        $this->viewPath="articles";
		$this->render("xml/sitemapsixmonths");
		
    }
    
	public function show_list() {
		$this->loadModel("Box");
		$meta_title= 'الرأي';
		$finalName = $this->params['para']."_blogroll";
		$catItem = $this->Box->query("SELECT * FROM boxes Where title = '".$finalName."'");
		$this->set(compact('catItem','meta_title'));
		$this->viewPath="elements/boxes";
		$this->render("allarticles");
	}
	public function show_gallery() {

		$this->loadModel("Image");
		$results = $this -> Image -> find('all', array('conditions' => array('Image.gallery_id '=> $this->params['id'])));
		$meta_title=$results[0]['Gallery']['name'] ;
			
		$this->set(compact('meta_title','results'));
		$this->viewPath="elements/boxes";
		$this->render("page_single_view_gallery");
	}
	public function show_list_milafat() {
		$this->loadModel("Box");
		$meta_title= 'ملفات';
		$finalName = 'milafat';
		$result = $this->Box->findByid(368);
		//$result = $this->Box->query("SELECT * FROM boxes Where title = '".$finalName."'");
		$this->set(compact('result','meta_title'));
		$this->viewPath="elements/boxes";
		$this->render("playlist");
	}
	
	public function show_author() {
		
		$meta_title= 'Author '.$this->params['name'];
		$userid = $this->params['id'];
		$this->loadModel("Article");
		$this->Article->bindModel(array('hasOne' => array('ArticlesBox')));
		$catItem = $this->Article->find('all',array('conditions' => array('Article.author_id' => $userid,'ArticlesBox.box_id' => $this->params['ibox']),'order'=>'Article.dated_at DESC','limit' =>25));
		
		//$this -> paginate = array('limit' => 2, 'conditions' =>array('Article.author_id' => $userid),'order'=>array('Article.dated_at DESC') );
		//$data_result = $this->paginate('Article');
				
		$this->set(compact('catItem','meta_title'));
		$this->viewPath="elements/boxes";
		$this->render("playlist");
	}
	public function show_journaliste() {
		$meta_title='journalistes' ;
		$this->set(compact('meta_title'));
		$this->viewPath="elements/boxes";
		$this->render("page_list_journalist");
	}

public function show_pdf_alhayat() {
		$meta_title='alhayat_pdf' ;
		$this->set(compact('meta_title'));
		$this->viewPath="elements/boxes";
		$this->render("alhayat_pdf");
	}

	public function show_list_Rss() {
		$this->loadModel("Category");

		
		$results = $this->Category->find('all',array('conditions' => 
										  array('Category.parent_id' => 1),
										  'order'=>'Category.id DESC'));
		$this->set(compact('results'));
		 
		$this->viewPath="elements/boxes";
		$this->render("allrss");
	}
		public function show_article_milafat(){

		$this->loadModel("Article");
		$articleItem=$this->Article->read(null,$this->params['id']);
			 if(empty($articleItem))
				  {
				  	 //$this->redirect(array('action' => 'index'), 301);
				 // $this->cakeError('error404', array(array('url' => $this->action)));
				  }
		if(!empty($articleItem) && !$this->check_if_spider()){
			
	      $this->Article->updateAll(array('Article.readings_count'=>'Article.readings_count+1'),
	        array("Article.id"=>$articleItem["Article"]["id"])
		  );
		}
		$meta_og_title=$articleItem['Article']['title'];
		if(!empty($articleItem['Article']['meta_first_key'])){
			$meta_title=$articleItem['Article']['meta_first_key'].'-'.$articleItem['Article']['title'];
		}else{
			$meta_title=$articleItem['Article']['title'];
		}

		
		$meta_description=$this->Truncate(strip_tags($articleItem['Article']['body']),250);	
		$meta_facebook_image=$articleItem['Media'][0]['media_file_path'];
		$meta_facebook_video=$articleItem['Media'][0]['video_path'];
		$meta_type="article";
		$this->set(compact('meta_og_title','meta_facebook_video','articleItem','meta_title','meta_description','meta_facebook_image','meta_type'));
		$this->viewPath="elements/boxes";
		$this->render("page_single_view_article_milafat");
	}
	
	public function show_test() {
		$this -> layout = "application";
	}

}

?>