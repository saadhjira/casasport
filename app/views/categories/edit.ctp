<div class="posts form">
<?php echo $this->Form->create('Article' , array( 'type' => 'post' ));?>
	<fieldset>
 		<legend><?php __('Edit Article');?></legend>
	<?php
		echo $this->Form->hidden('id');
		echo $this->Form->input('title');
		echo $this->Form->input('body');
		
	?>
	</fieldset>
<?php echo $this->Form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('List Articles', true), array('action'=>'index'));?></li>
	</ul>
</div>