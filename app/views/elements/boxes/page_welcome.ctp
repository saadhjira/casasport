<div id="content">
			<!-- Slider -->
			<div class="slider-wrapper">				
				<?php $result=$box->get($menuItem['Menu']['permalink'].'_featured_slide',$menuItem) ?>
				<?php echo $this->element($result['Box']['partial_name'],
        			array(/*'cache' => array('key' => $result['Box']['cache_key'], 
        			'time' => "{$result['Box']['cache_time']} {$result['Box']['cache_unittime']}"),*/"result"=>$result));  ?>
				
	        </div>
	        <!-- End Slider -->
	        
	        <!-- jCarousel Post -->
	        <div class="carousel-post-container">
	        	<div class="post-container scroll-post" style="padding-right: 0px;">
		        	<h2 style="padding-right: 20px;"><?php  echo $this -> Html -> link("فيديوهات", array('controller' => 'pages', 'action' => 'show_media_page'));?></h2>
		        	<?php 
		        		$boxs = $box -> get("media_playlist");
						$videos = $box->executeQuery($boxs);
						//debug($videos);
		        	 ?>
		        	<ul class="carousel-post">
		        		<?php for ($i=0; $i < 10 ; $i++) {?>
			        		<li class="post-item">
			  		        	<?php 
						          echo $this->Html->link(
						               $this->Media->videoThumbGallery($videos[$i]["Media"][0]["video_path"],"mq"),
						               $this->Article->paramsUrl($videos[$i]),
						              array('escape'=>false)
						          );
						        ?>
							    <h3>
							    	<?php echo $this->Html->link($this->Text->truncate(strip_tags($videos[$i]['Article']['title']),67),$this->Article->paramsUrl($videos[$i])); ?>
							    </h3>
			  		        	
			  		        	<div class="post-item-footer" style="float: right;">
						        	<?php 
							          echo $this->Html->link(
							               "شاهد الفيديو ",
							               $this->Article->paramsUrl($videos[$i]),
							              array("class"=>"more-link", 'escape'=>false)
							          );
							        ?>
						        </div>
			        		</li>
		        		<?php } ?>
		        	</ul>
		        </div>
			</div>
			<!-- End jCarousel Post -->

	        <!-- Category Posts -->
	        	<?php $result=$box->get($menuItem['Menu']['permalink'].'_hpage_group_cats',$menuItem)?>
				<?php $children = $box->getChildren($result['Box']['id']);?>
				<?php if(!empty($result)):?>
					<?php echo $this->element($result['Box']['partial_name'],
						        array(/* 
								 'cache' => array('key' => $result['Box']['cache_key'], 
						        'time' => "{$result['Box']['cache_time']} {$result['Box']['cache_unittime']}"),"result"=>$result,*/"children"=>$children));?>
				<?php endif;?>
				<?php //echo  $this->element("/boxes/hpage_group_cats")?>
	        <!-- End Category Posts -->

			<!-- Gallery Corousel-->
			<!-- <div class="post-container scroll-post">
	        	<h2>معرض الصور</h2>
	        	<ul class="gallery-images">
	        		<li><?php echo $this->Html->link($this->Html->image('frontend/upload/gallery-image-0.jpg'),'/img/frontend/upload/gallery-image-big-0.jpg',array('escape' => false));?></li>
	        		<li><?php echo $this->Html->link($this->Html->image('frontend/upload/gallery-image-1.jpg'),'/img/frontend/upload/gallery-image-big-1.jpg',array('escape' => false));?></li>
	        		<li><?php echo $this->Html->link($this->Html->image('frontend/upload/gallery-image-2.jpg'),'/img/frontend/upload/gallery-image-big-2.jpg',array('escape' => false));?></li>
	        		<li><?php echo $this->Html->link($this->Html->image('frontend/upload/gallery-image-3.jpg'),'/img/frontend/upload/gallery-image-big-3.jpg',array('escape' => false));?></li>
	        		<li><?php echo $this->Html->link($this->Html->image('frontend/upload/gallery-image-0.jpg'),'/img/frontend/upload/gallery-image-big-0.jpg',array('escape' => false));?></li>
	        		<li><?php echo $this->Html->link($this->Html->image('frontend/upload/gallery-image-1.jpg'),'/img/frontend/upload/gallery-image-big-1.jpg',array('escape' => false));?></li>
	        		<li><?php echo $this->Html->link($this->Html->image('frontend/upload/gallery-image-3.jpg'),'/img/frontend/upload/gallery-image-big-3.jpg',array('escape' => false));?></li>
	        	</ul>
	        </div> -->
	        <!-- End Gallery Corousel-->

	        <!-- Ads 
	        <div class="post-container ads-post-full">
	        	<?php echo $this->Html->image('frontend/upload/ads-post.jpg');?>	        	
	        </div>
	        <!-- End Ads -->

        </div>
        <!-- End Content -->

        <!-- Sidebar -->
        <?php echo $this->element("boxes/group_column_left")?>
        <!-- End Sidebar -->