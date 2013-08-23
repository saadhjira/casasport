<div class="answers form">
<?php echo $this->Form->create('Answer');?>
	<fieldset>
		<legend><?php __('Add Answer'); ?></legend>
	<?php
		echo $this->Form->input('choice_id');
		echo $this->Form->input('poll_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Answers', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Choices', true), array('controller' => 'choices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Choice', true), array('controller' => 'choices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Polls', true), array('controller' => 'polls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll', true), array('controller' => 'polls', 'action' => 'add')); ?> </li>
	</ul>
</div>