  
  <?php if(!empty($articleItem['Comment'])): ?>
         <div id="comments">
        <h2>تعليقات القراء</h2>
        <?php endif; ?>
        
        



	 <ul class="commentlist">
    <?php  $k=0; foreach($articleItem['Comment'] as $child): ?>
        <li class='<?php echo($k%2==0?"comment_even":"comment_odd") ?>'>
       	 <div class="author"><span class="name"> <a href="#"><?php echo $child['nickname'];  ?> </a></span> <span class="wrote"></span></div>
            <div class="submitdate"><a href="#"> <?php echo $child['created'];  ?>  </a></div>
            <p>   <?php echo $child['body'];  ?></p>

           
          </li>
       
        
         
        
        <?php $k=$k+1; ?>
        
    <?php endforeach; ?>
   
</ul>


      </div>