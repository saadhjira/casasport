
    <script type="text/javascript">
        $(document).ready(function() {

            $('#carouselhAuto').jsCarousel({ onthumbnailclick: function(src) {  }, autoscroll: true, masked: false, itemstodisplay: 3, orientation: 'h' });
 
            $('#carouselh').jsCarousel({ onthumbnailclick: function(src) { }, autoscroll: true, circular: true, masked: false, itemstodisplay: 3, orientation: 'h' });
           
        });       
        
    </script>

    <style type="text/css">
       
        #demo-wrapper
        {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            padding: 40px 20px 0px 20px;
        }
        #demo-left
        {
            width: 15%;
            float: left;
        }
        #demo-right
        {
            width: 958px;
            float: left;
        }
        #hWrapperAuto
        {
            margin-top: 20px;
        }
        #demo-tabs
        {
            width: 100%;
            height: 50px;
            color: White;
            margin: 0;
            padding: 0;
        }
        #demo-tabs div.item
        {
            height: 35px;
            float: left;
            background-color: #2F2F2F;
            border: solid 1px gray;
            border-bottom: none;
            padding: 0;
            margin: 0;
            margin-left: 10px;
            text-align: center;
            padding: 10px 4px 4px 4px;
            font-weight: bold;
        }
        #contents
        {
            width: 100%;
            margin: 0;
            padding: 0;
            color: #111111;
            font: arial;
            font-size: 11pt;
        }
        #demo-tabs div.item.active-tab
        {
            background-color: Black;
        }
        #demo-tabs div.item.active-tabc
        {
            background-color: Black;
        }
        #v1, #v2
        {
            margin: 20px;
        }
        .visible
        {
            display: block;
        }
        .hidden
        {
            display: none;
        }
        #oldWrapper
        {
            margin-left: 100px;
        }
        #contents a
        {
            color: white;
			background-color: #069;
        }
      
       
        .heading
        {
            font-size: 20pt;
            font-weight: bold;
        }
    </style>

   <?php $result=$box->get('home_hpage_latest'); ?> 
   
<body>
    <div id="contents">
        <div id="v2">
        
            <div id="demo-wrapper">
              
                <div id="demo-right">
                	 
                    <div id="hWrapper">
                    	<div class="header cat1">
	<?php  echo $this->Html->link($result['Box']['label']."»",array('controller' => 'pages', 'action' => 'show_list_milafat')); ?>
	</div>
                    	 	
                        <div id="carouselh">
                        	<?php  foreach($box->executeQuery($result) as $item): ?>
                            <div>
                                  	
                                  	<?php 
echo $this->Html->link(
 $this->Article->extractBigPhotoHomeMilafat($item,array("class"=>"lazyLoadLeft")),
    $this->Article->paramsUrlMilafat($item),
    array('escape'=>false)
);
?>
                                  	
                                  	<br />
                          
                            </div>
                              <?php endforeach; ?>
                            
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</body>

