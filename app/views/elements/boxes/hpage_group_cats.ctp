<!-- <div id="hpage_cats">
    <?php  $k=0; foreach($children as $child): ?>
       
       	  <div class='<?php echo($k%2==0?"fl_right":"fl_left") ?>'>
            <?php echo $this->element($child['Box']['partial_name'],
        array('cache' => array('key' => $child['Box']['cache_key'], 
        'time' => $child['Box']['cache_time']),"result"=>$child));  ?>
         </div>
        <?php if($k%2==1): ?>
        <br class="clear" />
        <?php endif; ?>
        
         <?php if(count($children)-1==$k && $k%2==0): ?>
           <br class="clear" />
         <?php endif; ?>
        
        <?php $k=$k+1; ?>
        
    <?php endforeach; ?>
   	
</div> --><div class="post-container">
				<?php for ($i=0; $i < sizeof($children) ; $i++) { ?>
					
				<?php echo $this->element($children[$i]['Box']['partial_name'],
						array(/*'cache' => array('key' => $child['Box']['cache_key'], 
						'time' => $child['Box']['cache_time']),*/"result"=>$child));  $i++ ; ?>
				<?php echo $this->element($children[$i]['partial_name'],
						array(/*'cache' => array('key' => $child['Box']['cache_key'], 
						'time' => $child['Box']['cache_time']),*/"result"=>$child));  ?>
				<?php } ?>
		  </div>