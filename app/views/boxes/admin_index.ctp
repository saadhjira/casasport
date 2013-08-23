<div id="page-heading">
        <h1>
        	<?php echo $this->Html->link(__('Add Boxes',true), 'add'); ?>
		</h1>
		

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
			
			<?php echo $this->Html->image('admin/shared/side_shadowright.jpg', array('alt' => '','width'=>20,'height'=>300))?>
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

					<th class="table-header-repeat line-left minwidth-1"><a>ID</a>	</th>

					<th class="table-header-repeat line-left minwidth-1"><a>Title</a>	</th>
                    <th class="table-header-options line-left"><?php echo $this->Html->link(__('Options',true), ''); ?></th>

				</tr>

				
				<?php foreach($results as $rec): ?>
                   
	               <?php  echo $this->element('boxes/admin_row',array('rec'=>$rec,'spacer'=>'')); ?>
	               
				   <?php   if(!empty($rec['children'])):  ?>
                        <?php foreach($rec['children'] as $child): ?>
						  <?php echo $this->element('boxes/admin_row',array('rec'=>$child,'spacer'=>'&nbsp;&nbsp;')); ?>
						  <?php   if(!empty($child['children'])):  ?>
						  	<?php foreach($child['children'] as $child2): ?>
						  		<?php echo $this->element('boxes/admin_row',array('rec'=>$child2,'spacer'=>'&nbsp;&nbsp;&nbsp;&nbsp;')); ?>
						  		<?php   if(!empty($child2['children'])):  ?>
						  	<?php foreach($child2['children'] as $child3): ?>
						  		<?php echo $this->element('boxes/admin_row',array('rec'=>$child3,'spacer'=>'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;')); ?>
						  	<?php endforeach; ?>
						  <?php endif ?>
						  		
						  		<?php //echo $this->element('boxes/admin_row',array('rec'=>$child2,'spacer'=>'&nbsp;&nbsp;&nbsp;&nbsp;')); ?>
						  	<?php endforeach; ?>
						  <?php endif ?>
						<?php endforeach; ?>
				   <?php endif ?>
                <?php endforeach; ?>
				
				
</table>

				<!--  end product-table................................... --> 

				</form>

			</div>

			<!--  end content-table  -->

		

			<!--  start actions-box ............................................... -->

			<div id="actions-box">

				<a href="" class="action-slider"></a>

				<div id="actions-box-slider">

					<a href="" class="action-edit">Edit</a>

					<?php  echo $this->Html->link('Delete All Cache',array("controller"=>$this->params['controller'],"action"=>"cache"),
					   array("title"=>"delete cache","class"=>"action-delete")); ?>

				</div>

				<div class="clear"></div>

			</div>

			<!-- end actions-box........... -->

				 
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

