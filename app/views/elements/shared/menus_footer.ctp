<div id="footer">
	<?php foreach($menus as $k=>$fv): ?>
    <div class="footbox">
    	
      <h2><?php
		echo $this->Html->link($fv["Menu"]["title"], array('controller' => 'pages', 'action' => 'show', 'menu' =>$fv['Menu']['permalink'], 'ext' => 'html'))
		?></h2>
		
		<?php if(!empty($fv["children"])): ?>
			
			<?php foreach($fv["children"] as $sv): ?>
				<ul>
				<li><?php
		echo $this->Html->link($sv["Menu"]["title"], array('controller' => 'pages', 'action' => 'show', 'menu' =>$sv['Menu']['permalink'], 'ext' => 'html'))
		?></li>
				</ul>
			<?php endforeach; ?>
			
			<?php endif; ?>
   
    </div>
     <?php endforeach; ?>
     </div> 
   
   
   
   
    <br class="clear" />
 