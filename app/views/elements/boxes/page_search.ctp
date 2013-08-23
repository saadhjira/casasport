 <div class="container">
 	<div style="float:left;margin-right:8px;" class="column">
       <?php echo $this->element("/boxes/most") ;?>
    </div>
        <h2>نتائج البحث  </h2>
      
       	<div class="footerserch"> 
       	 	<table>
      	<?php
      	 if(!empty($results)) ?>
        	
        	<?php foreach($results as $result): ?>
              <tr>
					<td><?php //echo $result['Article']['title']; ?></td>
					<td><?php// echo $result['User']['realname']; ?></td> 
					<td><?php //echo $result['Article']['dated_at']; ?></td>


					<td> <?php echo $this->Article->extractSmallPhoto($result,array("class"=>"imgr","width"=>"125","height"=>"125")); ?>	</td>
                    <td>
                    	
                    <h3>
                    <?php echo $this->Html->link($result['Article']['title'],$this->Article->paramsUrl($result),array("escape"=>false)); ?>
                    </h3>
                    <p class="articlestyle">
                    <?php echo !empty($result['Article']['short']) ? $result['Article']['short'] : $this->Text->truncate(strip_tags($result['Article']['body']),250) ; ?>
                   </p>
                   </td>
					   
                    <td class="options-width">
                  
					<!--
					<a href="" title="Edit" class="icon-3 info-tooltip"></a>

					<a href="" title="Edit" class="icon-4 info-tooltip"></a>

					<a href="" title="Edit" class="icon-5 info-tooltip"></a>
                    -->
					</td>

				</tr>
	

<?php endforeach; ?>
        
	
        			
        </table>
       		
       </div>
      </div>