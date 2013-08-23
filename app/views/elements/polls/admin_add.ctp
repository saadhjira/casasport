<div id="page-heading"><h1>
       	<h1><?php echo $this->Html->link(__('List Polls |', true), array('action' => 'index'));?>
		<?php echo $this->Html->link(__('List Choices |', true), array('controller' => 'choices', 'action' => 'index')); ?> 
		<?php echo $this->Html->link(__('New Choice', true), array('controller' => 'choices', 'action' => 'add')); ?> </h1>

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
<?php echo $this->Form->create('Poll' , array( 'type' => 'post' ));?>

		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">

		<tr>

			<th valign="top"><?php __('Name') ;?>:</th>

			<td>
				<?php
				echo $this->Form->hidden('id');
		        echo $this->Form->input('name',array("label"=>false,"error"=>false,'dir'=>"rtl"));
				?>
				
			</td>
			<td>
			
				<?php if($error=$this->Form->error( 'name',  __('Name is required',true))):?>
				<div class="error-left"></div>
                <div class="error-inner"><?php echo $error;?></div>
				<?php endif; ?>
				
			</td>

			<td></td>

		</tr>
        <tr>

			<th valign="top"><?php __('Question') ;?>:</th>

			<td>
				<?php echo $this->Form->input('question',array("label"=>false));
				 ?>
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