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

					<th class="table-header-repeat line-left minwidth-1"><?php echo $this->Html->link("ID", ''); ?></th>
					<th class="table-header-repeat line-left minwidth-1"><?php echo $this->Html->link("Pages", ''); ?></th>
					<th class="table-header-repeat line-left minwidth-1"><?php echo $this->Html->link("Nom", ''); ?></th>
					<th class="table-header-repeat line-left minwidth-1"><?php echo $this->Html->link("PDF", ''); ?></th>
					<th class="table-header-repeat line-left minwidth-1"><?php echo $this->Html->link("IDML", ''); ?></th>
                    <th class="table-header-options line-left"><?php echo $this->Html->link(__('Options',true), ''); ?></th>

				</tr>

	
				<?php foreach($results as $result): ?>
                    <tr class="tr_article">

					<td><input  type="checkbox" id="Category_<?php echo$result['Category']['id']; ?>"/></td>

					<td><?php echo $result['Category']['id']; ?></td>

					<td><?php echo $result['Category']['page']; ?></td>
					
					<td><?php echo $this->Html->link($result['Category']['title'],array("controller"=>"Alhayats","action"=>"articleslist/".$result['Category']['id'])); ?></td>
					
					<td><?php echo $result['Category']['PDF']; ?></td>
					<td><?php echo $result['Category']['IDML']; ?></td>
					

                    <td class="options-width">
                    <?php 
					   echo $this->Html->link('',array("controller"=>"Alhayats","action"=>"edit/".$result['Category']['id']),
					   array("title"=>"edit","class"=>"icon-1 info-tooltip"));
					?>
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

			<div id="actions-box">

				<a href="" class="action-slider"></a>

				<div id="actions-box-slider">
                    <a onclick="return false;" id="save_weights" class="action-edit">Save weights</a>
					<a  id="delete_articles" class="action-delete">Delete</a>

				</div>

				<div class="clear"></div>

			</div>

			
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

