
<?php echo $this->Html->css(array('stylegallery')); ?>



<?php echo $this->Html->script(array('slide/jquery.ad-gallery.pack.js','slide/jquery.anythingslider.min.js','slide/jquery.colorbox-min.js','slide/script.js')); 
?>
<div class="wrapper">
  <div class="container">
  	
  	 <div style="float:left;margin-right:8px;" class="column">
			      					 <?php echo $this->element("/boxes/group_column_left") ;?>
			       
			     			<div id="tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all ui-corner-marg ">
			 				 <div>
							     <?php 
									 
									 $resultf=$box->get("facebooklikebox");
							    	 echo $box->executeQuery($resultf);
									 
									 ?>
							   </div>    
			    			</div>
    				</div>
  	<div class="content">
   <body class="right_sidebar blogs">
<!--[if lte IE 8]><div id="ie_message"><div class="wrapper"><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img src="images/banner_ie.png" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/></a></div></div><![endif]-->

      
      <div id="page"> 
        <!-- content -->
        <div id="content">
        	<?php   foreach($box->executeQuery($result) as $item):?> 
        	<div class="about" style="background: #EBEBEB;  padding: 10px;  margin: 20px 0;  overflow: hidden;">
                  <div>
                    <div class="photo" style=" float: left;  width: 282px;  height: 211px;  padding-right: 20px;">
                    	     <?php 
								echo $this->Html->link(
								   $this->Article->extractGalleryPhotoImageBig($item['Image'][0],array('width'=>'282px','height'=>'211px')),
								    $this->Article->paramsUrlGallery($item),
								    array('escape'=>false)
								);
					        ?>
                    	 </div>
                    <div class="details" style="    float: right;      width: 307px;">
                      <h4 class="title"><?php echo $this->Html->link($item['gallery']['name'],$this->Article->paramsUrlGallery($item), array('escape'=>false));?><span class="photos"><?php echo '('.count($item['Image']). 'photos)'?></span></h1>
                      <p style=" margin-bottom: 10px;  font-size: 14px;"><?php echo  $this->Text->truncate(strip_tags($item['gallery']['description']),450)?></p>
                      <p><a href="gallery_page.html" class="view_all"   style="opacity: 0.5; opacity: 0.5;  color: #282828;  font-size: 12px;  text-transform: lowercase;  font-weight: normal;  text-decoration: none;  background: url(../images/bg_view_all.png) no-repeat 0 -48px;  padding-left: 11px;  display: inline-block;  zoom: 1;"><span><span></span></span></a></p>
                    </div>
                  </div>
                </div>
                   <?php break;endforeach; ?>   
          <div class="region">
            <article class="node">
              <!--<h2 class="title">3 Column Gallery</h2>
              <span class="change_gallery"> 
              	<a href="#" class="without_description active" style="opacity: 0.5; "></a> 
              	<a href="#" class="with_description" style="opacity: 0.5; "></a> 
              </span>-->
              <div class="content block" style="width: 649px;">
                
                <section id="gallery_list" class="gallery_3columns">
                  <ul class="gallery_without_description">
                  	<?php $cpt=FALSE;  foreach($box->executeQuery($result) as $item):?> 
                   	<?php if($cpt):?> 
                    <li>
                      <article>
                      	
                        <div class="photo">
                        	<?php 
echo $this->Html->link(
   $this->Article->extractGalleryPhotoImageBig($item['Image'][0],array('width'=>'195px','height'=>'139px')),
    $this->Article->paramsUrlGallery($item),
    array('escape'=>false)
);
?>
                        	
                        	<span class="bg" style="display: none; "></span></div>
                        <div class="details">
                          <h4 class="title"><?php echo $this->Html->link($this->Text->truncate(strip_tags($item['gallery']['name']),40),$this->Article->paramsUrlGallery($item), array('escape'=>false));?>
                          	
                          	<span class="photos"><?php echo '('.count($item['Image']). 'photos)'?></span></h4>
                        
                        </div>
                      </article>
                    </li>  
                     <?php endif; $cpt=TRUE;  ?> 
                     
                    <?php endforeach; ?>   
                    
                  </ul>
                </section>
                
              </div>
            </article>
          </div>
        </div>
        <!-- end content --> 
      </div>
      <!-- right sidebar -->
      
      <!-- end right sidebar --> 

  
  <!-- footer -->
  
  <!-- end footer --> 




</body>
</div></div></div>