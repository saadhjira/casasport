<?php $r=$box->executeQuery($result); ?>

<?php  foreach($r as $item): ?>
  <li>
  	<?php
		echo $this->Article->extractSmallUserPhoto($item,array('width'=>60));
	?>

  	<h3><?php echo $this->Html->link($item['Article']['title'],$this->Article->paramsUrl($item)); ?></h3>
  	<div>
  		<strong class="username"><?php echo $item['User']['realname'] ;?></strong>
  		<div id="datearticlemain" class="datearticle">
  		 <strong>
  		 	
  		 <?php 
  		  $dateFromDb = date("Y/m/d", strtotime($item['Article']['dated_at']));
  		 echo $this->Miladi->convertMiladi($dateFromDb,true);?> 
  		 
  		 
  		 </strong>
  		 </div>
  		  
  	</div>
  
	
   <p class="articlestyle">
    	<?php echo !empty($item['Article']['short']) ? $item['Article']['short'] : $this->Text->truncate(strip_tags($item['Article']['body']),250) ; ?>
    </p>
   </li>
<?php endforeach; ?>
