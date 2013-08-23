<div>
     <table>
      <?php foreach($box->executeQuery($result) as $item):     ?>  

    <tr>
    	<td class="imgagenda">
    		<?php	echo $img=$this->Article->extractSmallPhoto($item,array("class"=>"lazyLoadLeft",'width'=>60));  ?>	
    		
    	</td>
    	
    	<td>
    		<?php echo $this->Html->link($item['Article']['title'],$this->Article->paramsUrl($item)); ?>
    		 
    	</td>
    </tr>
      
     
		 
		
		   	
		   	
		 	

    
      <?php  endforeach; ?>  
</table></div>