<div class="wrapper">
<div class="container">
 <div style="float:left;margin-right:8px;" class="column">
       <?php echo $this->element("/boxes/group_column_left") ;?>
       
     <div id="tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all ui-corner-marg ">
  <div>
     <?php 
		 
		 $result=$box->get("facebooklikebox");
    	 echo $box->executeQuery($result);
		 
		 ?>
    </div>    
    </div>
    </div>
<h2><?php echo "الرأي » ".$catItem[0]['boxes']['label']; ?></h2>
<?php $results=$box->get($catItem[0]['boxes']['title']);   ?>

<div class="containermedia">
<?php 
	$lim = 1;
	foreach($box->executeQuery($results) as $item):  ?>  
   
     <div class="allbloger">
				 
     	 <div class="imagelistblogor">
     	 	 <?php	echo $this->Article->extractSmallUserPhoto($item,array("class"=>"lazyLoadUser",'width'=>60));?>
     	 </div>
     	 
     <div class="infos">
     	 <div class="date-surtitle">
			

                      <span class="surtitle" >
                <?php 
      
  		 $dateFromDb = date("Y/m/d", strtotime($item['Article']['dated_at']));
		
  		 $timeFromDb = date("H:i", strtotime($item['Article']['dated_at']));
  		 $dateConverted = (string)$dateFromDb;
  		 $liba = new DateTime($dateConverted);
  		 $jour = (string)$liba->format('N') . PHP_EOL;
  		 $varia = $this->Miladi->convertDay($jour);
  		 echo $varia." ".$this->Miladi->convertMiladi($dateFromDb,true)."م ";
      
      
    
     
       ?>           
              </span>
          
          
                  </div>
      
       <div  class="">
       
       		  <h2 class="titlelistblog">
   	<?php echo $this->Html->link($item['Article']['title'],$this->Article->paramsUrl($item));?>
   	</h2>
      	
       <div class="teaser">
      	<?php echo !empty($item['Article']['short']) ? $item['Article']['short'] : $this->Text->truncate(strip_tags($item['Article']['body']),250) ; ?>
       </div>
      </div> </div>
     </div>
  
      <?php endforeach; ?>
</div>
</div>
</div>




 
