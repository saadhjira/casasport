<div id="page-heading"><h1>
       	<h1><?php echo $this->Html->link(__('List Galleries |', true), array('action' => 'index'));?>
		<?php echo $this->Html->link(__('List Images |', true), array('controller' => 'images', 'action' => 'index')); ?> 
		<?php echo $this->Html->link(__('New Image', true), array('controller' => 'images', 'action' => 'add')); ?> </h1>
</h1>
</div>

<br/>
<table style="margin-left:100px" >
	<tr>
			<td><h1><?php __('Id'); ?></h1></td>
			<td style="padding-left:50px"><h1><?php echo $image['Image']['id']; ?></h1></td>
	</tr>
		
	<tr>
			<td><h1><?php __('Gallery'); ?></h1></td>
			<td style="padding-left:50px"><h1><?php echo $this->Html->link($image['Gallery']['name'], array('controller' => 'galleries', 'action' => 'view', $image['Gallery']['id'])); ?></h1> </td>
	</tr>
	
	<tr>
			<td><h1><?php __('Name'); ?></h1></td>
			<td style="padding-left:50px"><h1><?php echo $image['Image']['name']; ?></h1> </td>
	</tr>
	
	<tr>
			<td><h1><?php __('Description'); ?></h1></td>
			<td style="padding-left:50px"><h1><?php echo $image['Image']['description']; ?></h1> </td>
	</tr>
	
	<tr>
			<td><h1><?php __('Img File'); ?></h1></td>
			<td style="padding-left:50px"><h1>
                     
					 <?php  
					    if(!empty($image['Image']['photo_file_path'])){
						echo $this->Html->image('/attachments/images/small/' .$image['Image']['photo_file_path']); 
						}
					 ?>
					</h1></td>
	</tr>
	
	<tr>		
			<td><h1><?php __('Actions'); ?></h1></td>
			<td style="padding-left:50px"><h1><?php echo $this->element("/shared/admin_index_options",array('id'=>$image['Image']['id']));  ?></h1></td>
	</tr>
</table>
