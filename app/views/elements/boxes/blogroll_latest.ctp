<?php $r=$box->executeQuery($result); ?>

<?php 

$cpt=count($r);
 foreach($r as $item): $cpt--;?>
  <li class=<?php if($cpt==0){
  		echo "last";
  		
	}?>>
  	
  	<?php
  	
	
		echo $this->Article->extractSmallUserPhoto($item,array("class"=>"lazyLoadUser",'width'=>60));
		
	?>

  	<h3><?php echo $this->Html->link($item['Article']['title'],$this->Article->paramsUrl($item)); ?></h3>
  	<div>
  		<strong class="username"><?php echo $this->Html->link($item['User']['realname'],$this->Article->paramsUserUrl($item,$result['Box']['id'])) ;?></strong>
  		<div id="datearticlemain" class="datearticle">
  		 <strong>
  		 <?php 
  		$dateFromDb = date("Y/m/d", strtotime($item['Article']['dated_at']));
  		 echo $this->Miladi->convertMiladi($dateFromDb,true);?> 
  		 
  		 
  		 </strong>
  		 </div>  
  	</div>
   <p class="articlestyle">
    	<?php echo !empty($item['Article']['short']) ? $item['Article']['short'] : $this->Text->truncate(strip_tags($item['Article']['body']),170) ; ?>
    </p>
   </li>
<?php endforeach; ?>
