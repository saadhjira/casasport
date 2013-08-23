
      	<?php $result=$box->get($menuItem['Menu']['permalink'].'_featured_slide',$menuItem) ;?>
      <?php if(!empty($result)): ?>
      <?php echo $this->element('boxes/menu_second',
        array('cache' => array('key' => $result['Box']['cache_key'], 
        'time' => "{$result['Box']['cache_time']} {$result['Box']['cache_unittime']}"),"result"=>$result));  ?>
       <?php endif; ?>
           
    
	
