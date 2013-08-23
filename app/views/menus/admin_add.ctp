<div id="page-heading"><h1>
        	<?php echo $this->Html->link(__('liste des menus',true),array("controller"=>"menus","action"=>"admin_index"));?>
		</h1></div>

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

	<!--  start content-table-inner -->

	<div id="content-table-inner">

	

	<table border="0" width="100%" cellpadding="0" cellspacing="0">

	<tr valign="top">

	<td>

	
<!-- start id-form -->
<?php echo $this->Form->create('Menu' , array( 'type' => 'post' ));?>

		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">

		<tr>

			<th valign="top"><?php __('Title') ;?>:</th>

			<td>
				<?php
				echo $this->Form->hidden('id');
		        echo $this->Form->input('title',array("label"=>false,"error"=>false));
				?>
				
			</td>

<td>
			
				<?php if($error=$this->Form->error( 'title',  __('Title is required',true))):?>
				<div class="error-left"></div>
                <div class="error-inner"><?php echo $error;?></div>
				<?php endif; ?>
				
			</td>

			<td></td>

		</tr>
		<tr>

			<th valign="top"><?php __('Disabled') ;?>:</th>

			<td>
				<?php echo $this->Form->input('disabled',array("empty"=>false,"label"=>false));?>
			</td>

			<td>
            </td>

		</tr>
        <tr>

			<th valign="top"><?php __('Parent Categories') ;?>:</th>

			<td>
				<?php echo $this->Form->input('parent_id',array("label"=>false));
				 ?>
			</td>

			<td>
            </td>

		</tr>
		<tr>

			<th valign="top"><?php __('Permalink') ;?>:</th>

			<td>
				<?php echo $this->Form->input('permalink',array("label"=>false,"error"=>false));
				 ?>
			</td>
<td>
			
				<?php if($error=$this->Form->error( 'permalink',__('permalink is required and unique',true))):?>
				<div class="error-left"></div>
                <div class="error-inner"><?php echo $error;?></div>
				<?php endif; ?>
				
			</td>
			<td>
            </td>

		</tr>
		<tr>

			<th valign="top"><?php __('Layout') ;?>:</th>

			<td>
				<?php echo $this->Form->input('layout',array("options"=>array("application"=>"application"),"empty"=>false,"label"=>false));?>
			</td>

			<td>
            </td>

		</tr>
		<tr>

			<th valign="top"><?php __('View') ;?>:</th>

			<td>
				<?php echo $this->Form->input('view',array("options"=>array("page_welcome"=>"page_welcome","page_second"=>"page_second","page_listing"=>"page_listing"),"empty"=>false,"label"=>false));?>
			</td>

			<td>
            </td>

		</tr>
		
		<tr>

			<th valign="top"><?php __('changefreq') ;?>:</th>

			<td>
			
			
			<?php echo $this->Form->input('changefreq',
			array("options"=>array(
			'always'=>'always',
			'hourly'=>'hourly',
			),
			"empty"=>false,"label"=>false));?>
			</td>

			<td>
            </td>

		</tr>
		
		<tr>

			<th valign="top"><?php __('priority') ;?>:</th>

			<td>
			<?php echo $this->Form->input('priority',array(
			"options"=>array(
			'0.1'=>'0.1',
			'0.2'=>'0.2',
			'0.3'=>'0.3',
			'0.4'=>'0.4',
			'0.5'=>'0.5',
			'0.6'=>'0.6',
			'0.7'=>'0.7',
			'0.8'=>'0.8',
			'0.9'=>'0.9',
			'1.0'=>'1.0',
			),"label"=>false));?>
			</td>

			<td>
            </td>

		</tr>		
		
		<tr>

			<th valign="top"><?php __('Meta title') ;?>:</th>

			<td>
				<?php echo $this->Form->input('meta_title',array("label"=>false));?>
			</td>

			<td>
            </td>

		</tr>
		<tr>

			<th valign="top"><?php __('Meta description') ;?>:</th>

			<td>
				<?php echo $this->Form->input('meta_description',array("label"=>false));?>
			</td>

			<td>
            </td>

		</tr>
		
		<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<?php echo $this->Form->end(array('label' => 'Submit',"class"=>"form-submit"
			));?>
			
			
		</td>
		<td></td>
	</tr>
</table>