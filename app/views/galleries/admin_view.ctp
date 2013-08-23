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
			<td style="padding-left:50px"><h1><?php echo $gallery['Gallery']['id']; ?></h1></td>
	</tr>
		
	<tr>
			<td><h1><?php __('Name'); ?></h1></td>
			<td style="padding-left:50px"><h1><?php echo $gallery['Gallery']['name']; ?></h1> </td>
	</tr>
	
	<tr>
			<td><h1><?php __('Description'); ?></h1></td>
			<td style="padding-left:50px"><h1><?php echo $gallery['Gallery']['description']; ?></h1> </td>
	</tr>
	
	<tr>		
			<td><h1><?php __('Actions'); ?></h1></td>
			<td style="padding-left:50px"><h1><?php echo $this->element("/shared/admin_index_options",array('id'=>$gallery['Gallery']['id']));  ?></h1></td>
	</tr>
</table>
<br/><br/>
		<br />
<div id="page-heading">
		<h1><?php __('Related Images');?></h1>
		<?php if (!empty($gallery['Image'])):?>
		<table border="0" width="100%" cellpadding="0" cellspacing="0"
	id="content-table">

	<tr>

		<th rowspan="3" class="sized"><?php echo $this->Html->image('admin/shared/side_shadowleft.jpg', array('alt' => '','width'=>20,'height'=>300))?>
		</th>

		<th class="topleft"></th>

		<td id="tbl-border-top">&nbsp;</td>

		<th class="topright"></th>

		<th rowspan="3" class="sized"><?php echo $this->Html->image('admin/shared/side_shadowright.jpg',array('alt' => '','width'=>20,'height'=>300))?>
		</th>

	</tr>

	<tr>

		<td id="tbl-border-left"></td>

		<td><!--  start content-table-inner ...................................................................... START -->

		<div id="content-table-inner"><!--  start table-content  -->

		<div id="table-content"><!--  start product-table ..................................................................................... -->

		<form id="mainform" action="">

		<table border="0" width="100%" cellpadding="0" cellspacing="0"
			id="product-table">

			<tr>
				<th class="table-header-repeat line-left minwidth-1"><?php echo $this->Html->link(__('ID',true), ''); ?></th>
				<th class="table-header-repeat line-left minwidth-1"><?php echo $this->Html->link(__('Image',true), ''); ?></th>
				<th class="table-header-repeat line-left minwidth-1"><?php echo $this->Html->link(__('Img File',true), ''); ?></th>
				
			<?php
		$i = 0;
		foreach ($gallery['Image'] as $choice):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
			<tr <?php echo $class;?>>
				<td><?php echo $choice['id'];?></td>
				<td><?php echo $this->Html->link($choice['name'], array('controller' => 'images', 'action' => 'view', $choice['id']));?></td>
				<td>
                     
					 <?php  
					    if(!empty($choice['photo_file_path'])){
						echo $this->Html->image('/attachments/images/small/' .$choice['photo_file_path']); 
						}
					 ?>
					</td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php endif; ?>

		<div id="page-heading">
			<h1><?php echo $this->Html->link(__('New Image', true), array('controller' => 'images', 'action' => 'add'));?>
			</h1>
		</ul>
		</div>
		</div>
		</td>
	</tr>
</table>
