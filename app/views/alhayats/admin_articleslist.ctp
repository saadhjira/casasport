<div id="page-heading">
        <h1>
        	<?php //echo $this->Html->link(__('Add article',true),array("controller"=>"articles","action"=>"add"));?>
        	Articles de la categorie X a publié le jj:mm:yyy 
		</h1>
		

	</div>

	<!-- end page-heading -->
 <?php //echo $this->element("/articles/admin_search_form");  ?>
&nbsp;
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

					<th class="table-header-repeat line-left minwidth-1"><?php echo $this->Paginator->sort(__('ID',true), 'Article.id'); ?>	</th>
					<th class="table-header-repeat line-left minwidth-1"><?php echo $this->Paginator->sort(__('Title',true), 'Article.title'); ?></th>
					<th class="table-header-repeat line-left minwidth-1"><?php echo $this->Paginator->sort(__('Author',true), 'User.realname'); ?></th>
					<th class="table-header-repeat line-left minwidth-1"><?php echo $this->Paginator->sort(__('weight',true), 'Article.weight'); ?></th>
					<th class="table-header-repeat line-left minwidth-1"><?php echo $this->Paginator->sort(__('Date',true), 'Article.dated_at'); ?></th>
					<th class="table-header-repeat line-left minwidth-1"><?php echo $this->Paginator->sort(__('published',true), 'Article.published'); ?></th>
                    <th class="table-header-options line-left"><?php echo $this->Html->link(__('Options',true), ''); ?></th>

				</tr>

	
				<?php foreach($results as $result): ?>
                    <tr class="tr_article">

					<td><input  type="checkbox" id="Article_<?php echo $result['Article']['id']; ?>"/></td>

					<td><?php echo $result['Article']['id']; ?></td>

					<td><?php echo $result['Article']['title']; ?></td>
					<td><?php echo $result['User']['realname']; ?></td>
					
					<td><?php  echo $this->Form->input('weight',array("id"=>"weight_".$result['Article']['id'],"class"=>"weight","label"=>false,'value'=>$result['Article']['weight'],'size'=>1)); ?> </td>
					<td><?php echo $result['Article']['dated_at']; ?></td>


					<td><?php echo $result['Article']['published']==1 ? 'OUI' : 'NON';?></td>
                    
                    <td class="options-width">
                    	
                    <?php 
						   echo $this->Html->link('',array("controller"=>"Articles","action"=>"edit/".$result['Article']['id']),
						   array("title"=>"export","class"=>"icon-1 info-tooltip"));
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

