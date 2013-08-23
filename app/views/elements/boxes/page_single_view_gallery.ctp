<?php echo $this->Html->css(array('stylegallery.css','common.css'))?>


<?php echo $this->Html->script(array('slide/script.js','slide/jquery.colorbox-min.js','slide/jquery.anythingslider.min.js','slide/jquery.ad-gallery.pack.js','slide/jquery-ui.min.js'))?>
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
  
  <div class="right_sidebar blogs blog_post">
  	<div id="shareButtons" style="margin-left: 8px;float: left;margin-top: 2px;">
      <div class="facebookBTN" style="float:left">
            	<div id="fb-root"></div>
				<script src="http://connect.facebook.net/en_US/all.js#appId=120075764716967&amp;xfbml=1"></script>
                <fb:like   href=""  layout="button_count" width="70" show_faces="true" font="" class=" fb_edge_widget_with_comment fb_iframe_widget">
                </fb:like>
      </div>
      <div id="tweetBTN" style="float:left"> 
	      
           <a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-lang="fr">Tweet</a>
           <script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
     </div>
      <div id="googleplusBTN" style="float:left;"> 
     <!-- Placez cette balise là où vous souhaitez positionner le bouton +1. -->
<g:plusone size="medium"></g:plusone>

<!-- Placez cet appel d'affichage à l'endroit approprié. -->
<script type="text/javascript">
  window.___gcfg = {lang: 'fr'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
  </div>
   <div id="linkedin" style="float:left;"> 
 <script src="http://platform.linkedin.com/in.js" type="text/javascript"></script>
<script type="IN/Share" data-url="http://www.wijhatnadar.com" data-counter="right"></script>
 </div>
      </div>
<!--[if lte IE 8]><div id="ie_message"><div class="wrapper"><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img src="images/banner_ie.png" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/></a></div></div><![endif]-->
<div id="wrapper"> 
  <!-- header -->
 
  <!-- end header -->
  <div id="container">
    <div class="wrapper">
    	<br class="clear">
       <div id="page"> 
        <!-- content -->
        <div id="content">
          <div class="region">
            <article class="node">
            	<div style="color: #069;"><?php echo $results[0]['Gallery']['name']?></div>
 	
              <div class="content block">
               
                <!-- AddThis Button BEGIN -->
                
                <script type="text/javascript" src="../../s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f3c188f442f3bf2"></script> 
                <!-- AddThis Button END -->
                <section class="about">
                  <div class="ad-gallery">
                    <div class="ad-image-wrapper"></div>
                    <div class="ad-controls"></div>
                    <div class="ad-nav">
                      <div class="ad-thumbs">
                        <ul class="ad-thumb-list">
                        	<?php foreach($results as $item):?>
                        		
                        		
                          <li><a href="../attachments/images/big/<?php echo $item['Image']['photo_file_path']?>"><?php echo $this->Article->extractGalleryPhotoImage($item['Image'],array('width'=>'65px','height'=>'47px')) ?></a></li>
                        <?php endforeach ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                </section>
                <section>
                 
                  <p>
                  	<?php echo $item['Gallery']['description']?>
                  </p>
                 
                </section>
                <!-- AddThis Button BEGIN -->
                <script type="text/javascript" src="../../s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f3c188f442f3bf2"></script> 
                <!-- AddThis Button END -->
                
             
               
              </div>
            </article>
          </div>
        </div>
     
      </div>
    
    </div>
  </div>

</div>
</div>

    </div>
  </div>