<div class="polls index">
	<h2><?php __('Polls');?></h2>
	<table cellpadding="0" cellspacing="0" border="1">
    <?php
    // The sort() method of the Paginator helper creates links as headings that can be clicked to sort results by particular columns' values.
    // Clicking the links more than once will switch between descending and ascending sort orders.
    ?>
	<tr>
        <th><?php echo $this->Paginator->sort('id');?></th>
        <th><?php echo $this->Paginator->sort('name');?></th>
        <th><?php echo $this->Paginator->sort('question');?></th>
        <th><?php echo $this->Paginator->sort('created');?></th>
        <th><?php echo $this->Paginator->sort('modified');?></th>
        <th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($polls as $poll):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $poll['Poll']['id']; ?>&nbsp;</td>
		<td><?php echo $poll['Poll']['name']; ?>&nbsp;</td>
		<td><?php echo $poll['Poll']['question']; ?>&nbsp;</td>
		<td><?php echo $poll['Poll']['created']; ?>&nbsp;</td>
		<td><?php echo $poll['Poll']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $poll['Poll']['id'])); ?>			
		</td>
	</tr>
<?php endforeach; ?>
	</table>
