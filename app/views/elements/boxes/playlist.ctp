<div class="container">
<div style="float: left; margin-right: 8px;" class="column"><?php echo $this->element("/boxes/most") ;?>
</div>





<div class="containermedia">
	<div class="header cat1">
	<a>
		<?php 
		if(!empty($result['Box']['label'])){
			
			echo $result['Box']['label']; 
		}else{
			
			echo $catItem[0]['User']['realname']; 
			
		}
		
		
		?>
	</a></div>

	<?php 
		$lim = 1; 
		if(!empty($result))
		$results=$box->executeQuery($result);
		//print_r($results);
		if(empty($results)){
			$results=$catItem;
			
		}
		foreach( $results as $result): ?>
			<div class="allbloger">
				<div class="imagelistblogor">
					<?php  echo $this->Article->extractSmallPhoto($result,array("class"=>"lazyLoadRight",'width'=>60));?>
				
				</div>
				<div class="infos">
     	 			<div class="date-surtitle">
     	 				<span class="surtitle" >
     	 					<?php 
						  		 $dateFromDb = date("Y/m/d", strtotime($result['Article']['dated_at']));
						  		 $timeFromDb = date("H:i", strtotime($result['Article']['dated_at']));
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
     	 				<?php echo $this->Html->link($result['Article']['title'],$this->Article->paramsUrl($result)); ?>
     	 			</h2>
     	 			<div class="teaser">
						<?php echo  $this->Text->truncate(strip_tags($result['Article']['body']),130)  ; ?>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>    
	

</div>

</div>
