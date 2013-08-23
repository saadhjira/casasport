<tr>

					<td><input  type="checkbox"/></td>

					<td><?php echo $id=$rec['Box']['id']; ?></td>

					<td><?php echo $spacer.$rec['Box']['title']; ?></td>
                    <td class="options-width">
                    
                    	<?php echo $this->element("/shared/admin_index_options",array('id'=>$id,'isTree'=>true));  ?>
                    	 
                 <?php  echo $this->Html->link('',array("controller"=>$this->params['controller'],"action"=>"cache/$id"),
					   array("title"=>"delete cache","class"=>"icon-1 info-tooltip")); ?>
                    	
					<!--
					<a href="" title="Edit" class="icon-3 info-tooltip"></a>

					<a href="" title="Edit" class="icon-4 info-tooltip"></a>

					<a href="" title="Edit" class="icon-5 info-tooltip"></a>
                    -->
					</td>

				</tr>