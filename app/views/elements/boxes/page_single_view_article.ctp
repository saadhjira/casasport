<?php  $this->set("facetitle",'<meta property="og:title" content="'.$articleItem['Article']['title'].'"/>');

$this->set("faceurl",'<meta property="og:url" content="'.Router::url( $this->here, true ).'"/>');

 if (!empty($Articles[$i]['Article']['short'])) {
    $descString = $articleItem['Article']['short'];
  }else if(!empty($articleItem['Article']['body'])){
    $descString = $this->Text->truncate(strip_tags($articleItem['Article']['body']),100) ; 
  }else{
    $descString = "كازاسبور";
  }
$this->set("facedesc",'<meta property="og:description" content="'.$descString.'"/>');
?>

<div id="content">
			<div class="page-container singlepost">
				<h1 class="title-post"> <?php echo $articleItem['Article']['title'] ?></h1>

				<p class="date"><?php 
      
			  		 $dateFromDb = date("Y/m/d", strtotime($articleItem['Article']['dated_at']));
			  		 $timeFromDb = date("H:i", strtotime($articleItem['Article']['dated_at']));
			  		 $dateConverted = (string)$dateFromDb;
			  		 $liba = new DateTime($dateConverted);
			  		 $jour = (string)$liba->format('N') . PHP_EOL;
			  		 $varia = $this->Miladi->convertDay($jour);
			  		 echo $varia." ".$this->Miladi->convertMiladi($dateFromDb,true); 
			  		 
			  		 ?>
			  	</p>
				 <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style ">
		            <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
		            <a class="addthis_button_tweet" data-lang="en"></a>
		            <a class="addthis_counter addthis_pill_style"></a>
                </div>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51b6028d676a763c"></script>
                <!-- AddThis Button END -->
				<!-- One Image -->
				<div class="single-image">
					<p>
<?php 
 
       $vdo=-1;
       $imge['Media']=null;
       $i2 = 0;
       
       for ($j2 = 0; $j2 < count($articleItem['Media']); $j2++) {
         if ($articleItem['Media'][$j2]['media_content_type'] == 'video') {
            $vdo = $j2;
         }
         else {
            $imge['Media'][$i2] = $articleItem['Media'][$j2];
            $i2++;
         }
       }
      
       if($vdo != -1){
        $imgpath = $this->Media->videoThumbUrl($articleItem['Media'][$vdo]['video_path'],"hq")
         ?>

      <p>
        <span class='embed-youtube' style='text-align:center; display: block;'>
          <iframe class='youtube-player'
           type='text/html' 
           width="590" 
		   height="320" 
           src=<?php  echo $articleItem['Media'][$vdo]['video_path'];?> 
           frameborder='0'>
          </iframe>
        </span>
      </p>
        <?php 
       }else {
        $imgpath = 'http://localhost/casasport/attachments/photos/slide/'.$articleItem['Media'][0]['media_file_path'];
        
          $img=$this->Article->extractSlidePhoto($imge,array("caption"=>true,'class'=>'xxl')); 
          echo $img->image;
        
          
        ?>
      
        <strong class="caption_image"><?php echo $img->caption ?></strong>
   <?php
       }
      $this->set("faceimg",'<meta property="og:image" content="'.$imgpath.'"/>'); 
       ?>

<!-- ---------------------------------------------------------------------- Fin Photo/Video ------------------------------------------------------------ -->
  </p>
				</div>
				<!-- End One Image -->

				<?php echo $articleItem['Article']['body'];; ?>
				
				<!-- Social Box -->
				<div class="socialbox-container clearfix">
					<!-- Comments -->
					<div class="socialbox">
						<div class="addthis_toolbox addthis_default_style ">
				            <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				            <a class="addthis_button_tweet" data-lang="en"></a>
				            <a class="addthis_counter addthis_pill_style"></a>
		                </div>
					</div>
					<!-- End Comments -->
				</div>
				
				<!-- End Social Box -->

			</div>
			<div class="carousel-post-container">
	        	<div class="post-container scroll-post" style="padding-right: 0px;">
		        	<h2 style="padding-right: 20px;"><?php  echo $this -> Html -> link("اقرأ أيضا",'#' );?></h2>
		        	<ul class="carousel-post">
		        		<?php foreach ($randomArticles as $value){?>
			        		<li class="post-item">
			  		        	<?php 
						          echo $this->Html->link(
						               $this->Article->extractMedPhoto($value),
						               $this->Article->paramsUrl($value),
						              array('escape'=>false)
						          );
						        ?>
							    <h3>
							    	<?php echo $this->Html->link($this->Text->truncate(strip_tags($value['Article']['title']),67),$this->Article->paramsUrl($value)); ?>
							    </h3>
			  		        	
			  		        	<div class="post-item-footer" style="float: right;">
						        	<?php 
							          echo $this->Html->link(
							               "إقرأ المزيد",
							               $this->Article->paramsUrl($value),
							              array("class"=>"more-link", 'escape'=>false)
							          );
							        ?>
						        </div>
			        		</li>
		        		<?php } ?>
		        	</ul>
		        </div>
			</div>
			<div class="post-container ads-post-full">
	        	<?php echo $this->Html->image('frontend/upload/ads-post.jpg');?>
	        </div>
			<div id="reply" class="post-container padding">
				<h2><?php  echo $this -> Html -> link("تعليقك على الموضوع",'#' );?></h2>
				<div class="fb-comments" data-href="http://www.wijhatnadar.com" data-width="470" data-num-posts="10"></div>
			</div>
	</div>
        		<!-- Popular, Recent and Comments -->
					<?php echo $this->element("/boxes/group_column_left") ;?>
        		<!-- End Popular, Recent and Comments -->
        <!-- End Sidebar -->