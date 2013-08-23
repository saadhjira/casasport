<?php $lab = (string)$result['Box']['link'];$i=0?>
<?php $boxes = $box->executeQuery($result); ?>
			<div class="post-container">
				<div>
					<div class="right" style="float: right;width: 273px;">
						<h2><?php  echo $this -> Html -> link($result['Box']['label'], array('controller' => 'pages', 'action' => 'show', 'menu' => $lab));?></h2>
			        	<ul>
			        		<?php for ($i=1; $i < sizeof($boxes); $i++) :?>   
				        		<li>
				        			<?php  echo $this -> Html -> link($this->Article->extractMedPhoto($boxes[$i]), $this -> Article -> paramsUrl($boxes[$i]),array("escape"=>false) );?>
				        			<h3><a href="#"><?php  echo $this -> Html -> link($boxes[$i]['Article']['title'], $this -> Article -> paramsUrl($boxes[$i]));?></a></h3>
				        			<span class="data-post">
				        				<?php $dateFromDb = date("Y/m/d", strtotime($boxes[$i]['Article']['dated_at']));
									  		 $timeFromDb = date("H:i", strtotime($boxes[$i]['Article']['dated_at']));
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
			        <div class="right">
			        	<h2><?php  echo $this -> Html -> link($result['Box']['label'], array('controller' => 'pages', 'action' => 'show', 'menu' => $lab));?></h2>
			        	<ul>
			        		<?php for ($i=1; $i < sizeof($boxes); $i++) :?>   
				        		<li>
				        			<?php  echo $this -> Html -> link($this->Article->extractMedPhoto($boxes[$i]), $this -> Article -> paramsUrl($boxes[$i]),array("escape"=>false) );?>
				        			<h3><a href="#"><?php  echo $this -> Html -> link($boxes[$i]['Article']['title'], $this -> Article -> paramsUrl($boxes[$i]));?></a></h3>
				        			<span class="data-post">
				        				<?php $dateFromDb = date("Y/m/d", strtotime($boxes[$i]['Article']['dated_at']));
									  		 $timeFromDb = date("H:i", strtotime($boxes[$i]['Article']['dated_at']));
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