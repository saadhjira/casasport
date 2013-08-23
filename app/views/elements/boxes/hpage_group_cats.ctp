<?php for ($i=0; $i < sizeof($children) ; $i++) {?>
	
	<?php $lab = (string)$children[$i]['Box']['link']; ?>
	<?php $boxes = $box->executeQuery($children[$i]); ?>
	<div class="post-container">
		<div>
			<div class="right <?php echo $children[$i]['Box']['title'];?>" style="float: right;width: 273px;">
				<h1 style="font-size: 200%;margin-bottom: 10px;color: black;"><?php  echo $this -> Html -> link($children[$i]['Box']['label'], array('controller' => 'pages', 'action' => 'show', 'menu' => $lab));?></h1>
	        	<ul>
	        		<?php for ($j=0; $j < sizeof($boxes); $j++) :?>   
		        		<li>
		        			<?php  echo $this -> Html -> link($this->Article->extractMedPhoto($boxes[$j]), $this -> Article -> paramsUrl($boxes[$j]),array("escape"=>false) );?>
		        			<h3><a href="#"><?php  echo $this -> Html -> link($boxes[$j]['Article']['title'], $this -> Article -> paramsUrl($boxes[$j]));?></a></h3>
		        			<span class="data-post">
		        				<?php $dateFromDb = date("Y/m/d", strtotime($boxes[$j]['Article']['dated_at']));
							  		 $timeFromDb = date("H:i", strtotime($boxes[$j]['Article']['dated_at']));
							  		 $dateConverted = (string)$dateFromDb;
							  		 $liba = new DateTime($dateConverted);
							  		 $jour = (string)$liba->format('N') . PHP_EOL;
							  		 $varia = $this->Miladi->convertDay($jour);
							  		 echo $varia." ".$this->Miladi->convertMiladi($dateFromDb,true); ?>
							</span>
		        		</li>
				    <?php endfor;?> 
	        	</ul>
	        </div>
	     </div>
	     <?php $i++; $lab = (string)$children[$i]['Box']['link']; ?>
		<?php $boxes = $box->executeQuery($children[$i]); ?>
        <div class="right <?php echo $children[$i]['Box']['title'];?>">
				<h1 style="font-size: 200%;margin-bottom: 10px;color: black;"><?php  echo $this -> Html -> link($children[$i]['Box']['label'], array('controller' => 'pages', 'action' => 'show', 'menu' => $lab));?></h1>
        	<ul>
        		<?php for ($j=0; $j < sizeof($boxes); $j++) :?>   
	        		<li>
	        			<?php  echo $this -> Html -> link($this->Article->extractMedPhoto($boxes[$j]), $this -> Article -> paramsUrl($boxes[$j]),array("escape"=>false) );?>
	        			<h3><a href="#"><?php  echo $this -> Html -> link($boxes[$j]['Article']['title'], $this -> Article -> paramsUrl($boxes[$j]));?></a></h3>
	        			<span class="data-post">
	        				<?php $dateFromDb = date("Y/m/d", strtotime($boxes[$j]['Article']['dated_at']));
						  		 $timeFromDb = date("H:i", strtotime($boxes[$j]['Article']['dated_at']));
						  		 $dateConverted = (string)$dateFromDb;
						  		 $liba = new DateTime($dateConverted);
						  		 $jour = (string)$liba->format('N') . PHP_EOL;
						  		 $varia = $this->Miladi->convertDay($jour);
						  		 echo $varia." ".$this->Miladi->convertMiladi($dateFromDb,true); ?>
						</span>
	        		</li>
			    <?php endfor;?> 
        	</ul>
        </div>
	 </div>
 <?php } ?>