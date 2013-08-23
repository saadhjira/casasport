<div id="page-heading"><h1>
        	
			<?php 
			    echo $this->Html->link(__('liste des users',true),array("admin"=>true,"controller"=>"users","action"=>"admin_index"));
			?>
			<?php if(empty($password)): ?>
			&nbsp;|&nbsp;
			<?php 
			    echo $this->Html->link(__('Change password',true),array("admin"=>true,"controller"=>"users","action"=>"edit/{$this->data['User']['id']}/password"));
			?>
			<?php else: ?>
			 &nbsp;|&nbsp;
			<?php 
			    echo $this->Html->link(__('Edit user',true),array("admin"=>true,"controller"=>"users","action"=>"edit/{$this->data['User']['id']}"));
			?>
			<?php endif; ?>
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
<?php echo $this->Form->create('User' , (!empty($password)? array("url"=>array("admin"=>true,"controller"=>"users","action"=>"edit/{$this->data['User']['id']}/password")) : array( 'type' => 'file' )));?>

		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
        <?php
		 echo $this->Form->hidden('id'); 
		 if(empty($password)){
		    
			echo $this->element("users/admin_body_add");
		 }else{
		    echo $this->element("users/admin_password");	
		 }
		 
		?>
		
		<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<?php echo $this->Form->end(array('label' => 'Submit',"class"=>"form-submit"
			));?>
			
			
		</td>
		<td></td>
	</tr>
</table>