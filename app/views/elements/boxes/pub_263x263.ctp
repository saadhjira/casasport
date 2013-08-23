<?php $result=$box->get($criteria);?>
<div class="column">
	 <?php  foreach($box->executeQuery($result) as $item): ?>
      <div class="holder">
      	<?php
			  echo $this->Article->extractBigPhoto($item);
			?>
	  </div>
	  <?php endforeach; ?>  
	  
	
      <!--<div class="holder"><a href="#"><img src="images/demo/300x80.gif" alt=""></a></div>-->
    </div>