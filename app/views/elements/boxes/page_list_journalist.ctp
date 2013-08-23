<?php $result=$box->get('liste_journalistes') ?>



<div class="container">
<div style="float: left; margin-right: 8px;" class="column"><?php echo $this->element("/boxes/most") ;?>
</div>

<h2><?php 
if(!empty($result)){
	$results=$box->executeQuery($result);
		
		}?></h2>


<div class="containermedia">

	<?php 
			
		foreach( $results as $result): ?>
			<div class="allbloger">
				<div class="imagelistblogor">
					<?php  echo $this->Article->extractSmallUserPhoto($result,array("class"=>"lazyLoadUser",'width'=>60));?>
				</div>
				<div class="infos">
     	 			<div class="date-surtitle">
     	 				
					</div>
					<div  class="">
		       		<h2 class="titlelistblog">
     	 				<?php echo $this->Html->link($result['User']['realname'],$this->Article->paramsUserUrl($result,'165')); ?>
     	 			</h2>
     	 			<div class="teaser">
						<?php echo ($result['User']['biography'])  ; ?>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>    
	
</div>

</div>

