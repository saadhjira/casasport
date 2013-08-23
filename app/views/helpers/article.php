<?php
/* /app/views/helpers/lien.php */

class ArticleHelper extends AppHelper {
    public $helpers = array('Html');
	
	
	public function extractSlidePhoto($item,$options=array()){
		$media=Set::extract("Article/Media[media_content_type=/image/i]",$item);
		$image=$this->Html->image('/attachments/photos/slide/'.$media['0']['Media']['media_file_path'],$options);
		
		 if(!empty($options["caption"])){
		  $caption=$media['0']['Media']['caption'];
		  return (object)compact("image","caption");
		 }else{
		 	return $image;
		 }
	}
		public function extractSlidePhotoMilafat($item,$options=array()){
		$media=Set::extract("Article/Media[media_content_type=/image/i]",$item);
		$image=$this->Html->image('/attachments/photos/slide/'.$media['1']['Media']['media_file_path'],$options);
		
		 if(!empty($options["caption"])){
		  $caption=$media['0']['Media']['caption'];
		  return (object)compact("image","caption");
		 }else{
		 	return $image;
		 }
	}
	public function paramsUrl_alhayat(){
		
		return array("controller"=>"pages",
		"action"=>"show_pdf_alhayat",
		
		'ext' => 'html'
		);
	}
	public function paramsUrl_old($item){
		$created=strtotime($item["Article"]["created"]);
		return array("controller"=>"pages",
		"action"=>"show_article",
		"id"=>$item["Article"]["id"],
		"title"=> str_replace(" ", "_", $item['Article']["title"]),
		);
	}

	public function paramsUrl($item){
		
		
		$created=strtotime($item["Article"]["created"]);
		//if($created>strtotime('2012-01-07 10:04:33'))
		
		return $this->paramsUrl_old($item);
		
	}
		public function paramsUrlGallery($item){
					
		return array("controller"=>"pages",
		"action"=>"show_gallery",
		"id"=>$item["gallery"]["id"],
		"name"=>rawurlencode(Inflector::slug($item["gallery"]["name"])),
		'ext' => 'html'
		);	
		
	}
	
	public function paramsUrlMilafat($item){
		
	
		$created=strtotime($item["Article"]["created"]);
		if($created>strtotime('2012-03-14 10:04:33')&& $created<strtotime('2012-03-03 10:04:33'))
		{
				return array("controller"=>"pages",
		"action"=>"show_article_milafat",
		'slug'=>rawurlencode(Inflector::slug($item["Article"]["slug"])),
		"id"=>$item["Article"]["id"],
		"cat"=>"ملف",
		'ext' => 'html'
		);	
			
		}else{
			
		return $this->paramsUrl($item);
		}
		
		
	}
	public function paramsUrlRss($item){
		$link = explode("(", $item);
		
		$link = explode(")", $link[1]);
		
		return array("controller"=>"articles",
		"action"=>"flux",
		"par"=>$link[0],
		'ext' => 'rss'
		);
	}
		
		
	public function paramsUserUrl($item,$result){
		
		$iduser=$item["User"]["id"];
		$username=$item["User"]["username"];
		return array("controller"=>"pages",
		"action"=>"show_author",
		"name"=>$username,
		"id"=>$iduser,
		"ibox"=>$result,
		'ext' => 'html'
		);
	}
	public function extractGalleryPhoto($item,$options=array()){
		
		return $this->Html->image('/attachments/images/small/'.$item['Image'][0]['photo_file_path'],$options);
	}
	public function extractSmallPhoto($item,$options=array()){
		$media=Set::extract("Article/Media[media_content_type=/image/i]",$item);
		
		return $this->Html->image("grey.gif",array_merge(array("data-original"=>'/attachments/photos/small/'.$media['0']['Media']['media_file_path']),$options)); 
	}
	public function extractSmallUserPhoto($item,$options=array()){
		
		//return $this->Html->image('/attachments/users/small/'.$item['User']['photo_file_path'],$options);
		return  $this->Html->image("grey.gif",array_merge(array("data-original"=>'/attachments/users/small/'.$item['User']['photo_file_path']),$options)); 
		
	}
	
	public function extractMedPhoto($item,$options=array()){
		$media=Set::extract("Article/Media[media_content_type=/image/i]",$item);
		return $this->Html->image('/attachments/photos/med/'.$media['0']['Media']['media_file_path'],$options);
	}
	
	public function extractBigPhoto($item,$options=array()){
		$media=Set::extract("Article/Media[media_content_type=/image/i]",$item);
		return $this->Html->image('/attachments/photos/big/'.$media['0']['Media']['media_file_path'],$options);
	}
	
public function extractBigPhotoHomeMilafat($item,$options=array()){
	
		return $this->Html->image('/img/thumb_home_milafat/'.$item['Article']['id'].'.jpg',$options);
	}
// gallery
	public function extractGalleryPhotoMed($item,$options=array()){
		return $this->Html->image('/attachments/images/med/'.$item['Image'][0]['photo_file_path'],$options);
	}
	
	public function extractGalleryPhotolink($item,$options=array()){
		return 'attachments/images/big/'.$item['Image'][0]['photo_file_path'];
	}
	
	public function extractGalleryPhotoImageBig($image,$options=array()){
		return $this->Html->image('/attachments/images/big/'.$image['photo_file_path'],$options);
	}
public function extractGalleryPhotoImageGalleryHome($image,$options=array()){
	
		return $this->Html->image('/attachments/gallery/'.$image.'.jpg',$options);
	}

	public function extractGalleryPhotoImage($image,$options=array()){
		return $this->Html->image('/attachments/images/small/'.$image['photo_file_path'],$options);
	}
	
	public function extractGalleryPhotoImageLink($image,$options=array()){
		return 'attachments/images/big/'.$image['photo_file_path'];
	}
	public function extractSmallGalleryPhoto($item,$options=array()){
		return $this->Html->image('/attachments/photos/small/'.$item['Image'][0]['photo_file_path'],$options);
	}
}
?>