<?php 
class Box extends AppModel {
    public $actsAs = array('Tree');
    
    /**
     *
     * @param object $criteria ex:permalink_boxtitle like acceuil_featured_slide
     * @param object $menuItem where the box appear
     * @return box array
     */
    public function get($criteria) {
        $conditions = array();
		
		$boxes = $this->find('threaded', array('conditions'=>array_merge(array('title'=>$criteria, 'disabled'=>false))));
		if(!empty($boxes)){
		   return $boxes[0];
		}
    }
    
    public function getChildren($parent_id) {
        $boxes = $this->find('threaded', array('conditions'=>array('parent_id'=>$parent_id, 'disabled'=>false), 'order'=>array('lft'=>"ASC")));
        return $boxes;
    }
    
    public function executeQuery($box) {
    
        if ( empty($box['Box']['isHtml'])) {
        
            $options["conditions"] = array();
            $options["joins"] = array();
            $options['order'] = array();
            
            if (! empty($box['Box']['from'])) {
                $object = ClassRegistry::init($box['Box']['from']);
                if (! empty($box['Box']['joins'])) {
                    $joinsNames = array_map('trim', explode(",", $box['Box']['joins']));
                    foreach ($joinsNames as $jn) {
                        switch ($jn) {
                            case "ArticlesCategory":
                                array_push($options["joins"], array('table'=>'articles_categories', 'alias'=>'ArticlesCategory', 'type'=>'inner', 'conditions'=>array('Article.id = ArticlesCategory.article_id')));
                                break;
                            case "ArticlesBox":
                                array_push($options["joins"], array('table'=>'articles_boxes', 'alias'=>'ArticlesBox', 'type'=>'inner', 'conditions'=>array('Article.id = ArticlesBox.article_id')));
                                break;
                        }
                    }
                }
                if (! empty($box['Box']['select'])) {
                    $selects = array_map('trim', explode(",", $box['Box']['select']));
					
                    $options['fields'] = $selects;
                }
                if (! empty($box['Box']['contain'])) {
                    if ($box['Box']['contain'] == "false") {
                        $contains = false;
                    } else {
                        $contains = array_map('trim', explode(",", $box['Box']['contain']));
                    }
                    
                    $options['contain'] = $contains;
                }

                
                if ($box['Box']['where']) {
                    array_push($options["conditions"], str_replace("{this.box}", $box['Box']['id'], $box['Box']['where']));
                }
                array_push($options["order"], $box['Box']['orderBy']);
                $options['limit'] = $box['Box']['limit'];
             
			    return $object->find("all", $options);
		
            } else {
                return array();
            }
            
        } else {
            return $box['Box']['html'];
        }
    }

    function beforeSave($options) {
        $this->data['Box']['cache_key'] = "wn_".$this->data['Box']['title'];
		if ( empty($this->data['Box']['cache_time'])) {
            $this->data['Box']['cache_time'] = 1800;
		}
        return true;
    }
	 
	 public function cloneBox($id=8) {
		 $boxes=$this -> find('all', array('conditions' => array('fg_key'=>$id)));
		 print_r($boxes);
	     	foreach($boxes as $result){
	     		
			     $e= explode("_",$result["Box"]["title"]);
				 unset($e[0]);
	     		 $result["Box"]['title']="morocco_".implode("_",$e);
				 $result["Box"]['fg_key']=7;
				 unset($result["Box"]["id"]);
				 $this->create();
			    $this->save($result);
           	
	     	}
	  }

    
}
?>
