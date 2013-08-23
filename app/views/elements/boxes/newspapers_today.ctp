<div class="header cat1"><a> أقوال الصحف </a></div>
      <ul class="latestnews_today">
      	<?php	
      	
      	$r=$box->executeQuery($result);
      	$cpt=count($r); ?>
      	<?php foreach($r as $item): ?>
       
        	<?php //echo $this->Article->extractSmallPhoto($item,array("class"=>"lazyLoadRight"));?>
          <div class="imagenews" style="height: 190px;">
        
          
          <?php
          
		  echo $this->Html->link(
 $this->Article->extractBigPhoto($item,array('height'=>'196px','width'=>'309px')),
    $this->Article->paramsUrl($item),
    array('escape'=>false)
);
		  
		   ?>
         
         <div class="news_title">
         	<h2 style="padding-right: 5px;">
        	  <?php echo $this->Html->link($this->Text->truncate(strip_tags($item['Article']['title']),39) ,$this->Article->paramsUrl($item)); ?>
        </h2>
         </div>
          </div>
       
       
        <?php endforeach; ?>
      </ul>