<?php $result=$box->get($menuItem['Menu']['permalink'].'_playlist',$menuItem) ;?>
      <?php if(!empty($result)): ?>
      <?php echo $this->element($result['Box']['partial_name'],
        array("result"=>$result));  ?>
       <?php endif; ?>