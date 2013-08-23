 <link href="css/style.css" rel="stylesheet" type="text/css">
 <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css">
<?php $result=$box->get('alhayat_pdf') ?>
 <div class="container">
 	<div style="float:left;margin-right:8px;" class="column">
       <?php echo $this->element("/boxes/most") ;?>
    </div>
        <h2 class="titlemedia"> الحياة اليوم   </h2>
   <?php  $pdf=$box->executeQuery($result);?> 

      </div>
     
    
 <div id="wrapper_sec">
    
    <!--Content Sec -->
        <div id="content_sec">
        	<!--Main Section-->
            <div class="col1">
                <!--Most Popular -->
                <div class="mostcontainerpdf">
                	
                	<ul>
                		<?php foreach($pdf as $result): ?>
                    	<li>
                   					     </p>	
							
                        	<div class="pdfdiv">
                            	   <?php //echo $this->Media->videoThumb($result["Media"][0]["video_path"]);
                            	    $dateFromDb = date("Y/m/d", strtotime($result['Alhayat']['date_publication']));
  		 							
                            	   ?>
                            	   
                            	  
                            	   
                            	   
                            	  
<?php 

echo $this->Html->link($this->Article->extractMedPhoto($result,array()),
       '/attachments/files/'.$result['Media']['1']['media_file_path'],
    array('target'=>'_blank','escape'=>false)
);
?>
	
                                	
                                	<span class="time"></span>
                               
                            
                            </div>
                        	
                        	
							 <p style="width: 94px;">
                        		<?php echo $this->Miladi->convertMiladi($dateFromDb,true); ?>
						
							</p>
							<p class="viewcounts">	<?php //echo $result['Alhayat']['readings_count'];?> مشاهدة</p>
							
                        </li>
                        	<?php endforeach; ?>
                       
                    </ul>
                </div>
            <div class="clear"></div>
            </div>
          
        <div class="clear"></div>
		<!-- movie ads-->
       
    </div> 
 <div class="clear"></div>
</div>