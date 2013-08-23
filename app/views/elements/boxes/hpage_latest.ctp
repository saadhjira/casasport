
        	<div class="header cat1">
        		
        	<?php 
        	 echo $this->Html->link($result['Box']['label']."»",array('controller' => 'pages', 'action' => 'show_list_milafat'));
	 ?>
			</div>
        	
        	 
        <ul class="latestnews">
        	<?php  foreach($box->executeQuery($result) as $item): ?>
          <li>
          	<?php 
		echo $this->Article->extractSmallPhoto($item,array("class"=>"lazyLoadLeft"));		?>
		  <h3>
		 	<?php 	
	 echo $this->Html->link($item['Article']['title'],$this->Article->paramsUrl($item)); ?>  </h3>
			  </li>
          <?php endforeach; ?>
        </ul>
        <br class="clear" />
   