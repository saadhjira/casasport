
<div id="page-heading">
        <h1>
        	<?php echo $this->Html->link(__('Add Menu',true), 'add'); ?>
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

					<th class="table-header-repeat line-left minwidth-1"><?php echo $this->Html->link(__('id',true), ''); ?></th>

					<th class="table-header-repeat line-left minwidth-1"><?php echo $this->Html->link(__('Title',true), ''); ?></th>
                    <th class="table-header-options line-left"><?php echo $this->Html->link(__('Options',true), ''); ?></th>

				</tr>

				
				<?php foreach($menus as $id=>$title): ?>
                    <tr>

					<td><input  type="checkbox" id="Menu_<?php echo$id; ?>"/></td>

					<td><?php echo $id; ?></td>

					<td><?php echo $title; ?></td>
                    <td class="options-width">
                    
                    	<?php echo $this->element("/shared/admin_index_options",array('id'=>$id,'isTree'=>true));  ?>
                    	
					
					
					<!--
					<a href="" title="Edit" class="icon-3 info-tooltip"></a>

					<a href="" title="Edit" class="icon-4 info-tooltip"></a>

					<a href="" title="Edit" class="icon-5 info-tooltip"></a>
                    -->
					</td>

				</tr>
	

<?php endforeach; ?>
				
				
</table>

				<!--  end product-table................................... --> 

				</form>

			</div>

			<!--  end content-table  -->

		

			<!--  start actions-box ............................................... -->

			

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

