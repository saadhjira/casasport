<div id="hpage_latest">
	
        
        	<div class="header cat1"><a><?php echo $result['Box']['label'] ?></a></div>
        	
        	 
        <ul>
        	<?php foreach($box->executeQuery($result) as $item): ?>
          <li><?php 
		echo $this->Article->extractSmallPhoto($item,array("class"=>"lazyLoadLeft"));
	?>
             <p><strong>
    	<a><?php //echo $item['Article']['title'] ?></a>
    </strong> 
            <p><?php echo $this->Html->link($item['Article']['title'],$this->Article->paramsUrl($item)); ?> </p>
             <p>    	<?php echo !empty($item['Article']['short']) ? $item['Article']['short'] : $this->Text->truncate(strip_tags($item['Article']['body']),250) ; ?> </p>
            <p class="readmore"><?php echo $this->Html->link( "إقرأ المزيد&raquo;",$this->Article->paramsUrl($item),array("escape"=>false)); ?></a></p>
          </li>
          <?php endforeach; ?>
        </ul>
        <br class="clear" />
      </div>