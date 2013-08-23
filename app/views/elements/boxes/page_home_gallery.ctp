    <link rel="stylesheet" href="home_gallery/themes/default/default.css" type="text/css" media="screen" />
  
    <link rel="stylesheet" href="home_gallery/nivo-slider.css" type="text/css"  />
    <link rel="stylesheet" href="home_gallery/style.css" type="text/css"  />
     	<?php $result=$box->get('gallery_playlist_home') ;?>
     	
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
            	<?php   foreach($box->executeQuery($result) as $item):?> 
            		
            		 <?php 
            		
								echo $this->Html->link(
								   $this->Article->extractGalleryPhotoImageGalleryHome($item['gallery']['id'],array('width'=>'195px','height'=>'139px','title'=>$item['gallery']['name'])),
								    $this->Article->paramsUrlGallery($item),
								    array('escape'=>false)
								);
					        ?>
                  <?php endforeach; ?>   
            </div>
           
        </div>
      
    <script type="text/javascript" src="home_gallery/scripts/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>

