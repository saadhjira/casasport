<?php
/* /app/views/helpers/lien.php */

class MediaHelper extends AppHelper {

	public function videoThumbUrl($url,$taille=null) {
		if(eregi("youtube", $url)){
			$a_url=explode("/",$url);
			$id=$a_url[count($a_url)-1];
			return "http://img.youtube.com/vi/$id/".$taille."default.jpg";
						
		}else if(eregi("dailymotion", $url)){
			$a_url=explode("/",$url);
			$id=$a_url[count($a_url)-1];	
			
			return "http://www.dailymotion.com/thumbnail/160x120/video/$id";
		}
	 
			
		
	}
	public function videoThumbGallery($url,$taille=null) {
		$src=$this->videoThumbUrl($url,$taille);
		if ($taille == "mq") {
			return "<img src='$src' class='attachment-side wp-post-image' style='width: 184px; height: 142px !important;'/>";
		}else{
			return "<img src='$src' class='attachment-side wp-post-image' style=''/>";
		}
		
	}

	public function videoThumbFirst($url,$taille=null) {
		$src=$this->videoThumbUrl($url,$taille);
		return "<img src='$src' class='attachment-side wp-post-image' style='width: 300px; height:110px'/>";
	}

	public function videoThumb($url,$taille=null) {
		$src=$this->videoThumbUrl($url,$taille);
		return "<img src='$src' class='attachment-side wp-post-image' style='width: 66px; height: 66px'/>";
	}

	public function videoThumbReadMore($url,$taille=null) {
		$src=$this->videoThumbUrl($url,$taille);
		return "<img src='$src' style='width: 54px; height: 42px'/>";
	}
}
?>