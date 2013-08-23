<div class="polls view">
<h2><?php  __('Poll');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $poll['Poll']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $poll['Poll']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Question'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $poll['Poll']['question']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $poll['Poll']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $poll['Poll']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Poll', true), array('action' => 'edit', $poll['Poll']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Poll', true), array('action' => 'delete', $poll['Poll']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $poll['Poll']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Polls', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Poll', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Answers', true), array('controller' => 'answers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Answer', true), array('controller' => 'answers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Choices', true), array('controller' => 'choices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Choice', true), array('controller' => 'choices', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Answers');?></h3>
	<?php if (!empty($poll['Answer'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Choice Id'); ?></th>
		<th><?php __('Poll Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($poll['Answer'] as $answer):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $answer['id'];?></td>
			<td><?php echo $answer['choice_id'];?></td>
			<td><?php echo $answer['poll_id'];?></td>
			<td><?php echo $answer['created'];?></td>
			<td><?php echo $answer['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'answers', 'action' => 'view', $answer['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'answers', 'action' => 'edit', $answer['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'answers', 'action' => 'delete', $answer['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $answer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Answer', true), array('controller' => 'answers', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php __('Related Choices');?></h3>
	<?php if (!empty($poll['Choice'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Poll Id'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Modified'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($poll['Choice'] as $choice):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $choice['id'];?></td>
			<td><?php echo $choice['name'];?></td>
			<td><?php echo $choice['poll_id'];?></td>
			<td><?php echo $choice['created'];?></td>
			<td><?php echo $choice['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'choices', 'action' => 'view', $choice['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'choices', 'action' => 'edit', $choice['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'choices', 'action' => 'delete', $choice['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $choice['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Choice', true), array('controller' => 'choices', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
