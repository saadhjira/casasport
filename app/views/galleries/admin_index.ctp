<div id="page-heading">
        <h1>    <?php echo $this->Html->link(__('New Gallery |', true), array('action' => 'add')); ?> 
		<?php echo $this->Html->link(__('List Images |', true), array('controller' => 'images', 'action' => 'index')); ?> 
		<?php echo $this->Html->link(__('New Image ', true), array('controller' => 'images', 'action' => 'add')); ?> </h1>

	</div>

	<!-- end page-heading -->
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">

	<tr>

		<th rowspan="3" class="sized">
			
			<?php echo $this->Html->image('admin/shared/side_shadowleft.jpg', array('alt' => '','width'=>20,'height'=>300))?>
		</th>
        
		<th class="topleft"></th>

		<td id="tbl-border-top">&nbsp;</td>

		<th class="topright"></th>

		<th rowspan="3" class="sized">
			
			<?php echo $this->Html->image('admin/shared/side_shadowright.jpg',array('alt' => '','width'=>20,'height'=>300))?>
	    </th>

	</tr>

	<tr>

		<td id="tbl-border-left"></td>

		<td>

		<!--  start content-table-inner ...................................................................... START -->

		<div id="content-table-inner">

		

			<!--  start table-content  -->

			<div id="table-content">

			<!--  start product-table ..................................................................................... -->

				<form id="mainform" action="">

				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">

				<tr>
					<th class="table-header-check"><a id="toggle-all" ></a> </th>
					<th class="table-header-repeat line-left minwidth-1"><?php echo $this->Paginator->sort(__('ID',true), 'Gallery.id'); ?>	</th>
					<th class="table-header-repeat line-left minwidth-1"><?php echo $this->Paginator->sort('name');?></th>
					<th class="table-header-options line-left"><?php echo $this->Html->link(__('Options',true), ''); ?></th>
					
				</tr>
				
				
				<?php
				$i = 0;
				foreach ($galleries as $gallery):
					$class = null;
					if ($i++ % 2 == 0) {
						$class = ' class="altrow"';
					}
				?>
				<tr class="tr_article">
					<td><input  type="checkbox" id="Gallery_<?php echo $gallery['Gallery']['id']; ?>"/></td>
					<td><?php echo $gallery['Gallery']['id']; ?>&nbsp;</td>
					<td><?php echo $this->Html->link(__($gallery['Gallery']['name'], true), array('action' => 'view', $gallery['Gallery']['id'])); ?></td>
					<td class="options-width">
                    <?php echo $this->element("/shared/admin_index_options",array('id'=>$gallery['Gallery']['id']));  ?>
				</tr>
			<?php endforeach; ?>
	
</table>
			
			</div>
				<!--  end product-table................................... --> 

				</form>

			</div>

			<!--  end content-table  -->

		

			<!--  start actions-box ............................................... -->

			<div id="actions-box">

				<a href="" class="action-slider"></a>

				<div id="actions-box-slider">
                    <a onclick="return false;" id="save_weights" class="action-edit">Save weights</a>
					<a  id="delete_articles" class="action-delete">Delete</a>

				</div>

				<div class="clear"></div>

			</div>

			<!-- end actions-box........... -->

			<?php echo $this->element("shared/paginator"); ?> 
			
            <div class="clear"></div>

		 

		</div>

		<!--  end content-table-inner ............................................END  -->

		</td>

		<td id="tbl-border-right"></td>

	</tr>

	<tr>

		<th class="sized bottomleft"></th>

		<td id="tbl-border-bottom">&nbsp;</td>

		<th class="sized bottomright"></th>

	</tr>

	</table>