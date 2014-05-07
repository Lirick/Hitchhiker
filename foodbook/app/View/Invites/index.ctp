<div class="invites index">
	<h2><?php echo __('Invites'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_from'); ?></th>
			<th><?php echo $this->Paginator->sort('user_to'); ?></th>
			<th><?php echo $this->Paginator->sort('event_id'); ?></th>
			<th><?php echo $this->Paginator->sort('ivitation_accept'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($invites as $invite): ?>
	<tr>
		<td><?php echo h($invite['Invite']['id']); ?>&nbsp;</td>
		<td><?php echo h($invite['UserFrom']['name']); ?>&nbsp;</td>
		<td><?php echo h($invite['UserTo']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($invite['Event']['ename'], array('controller' => 'events', 'action' => 'view', $invite['Event']['id'])); ?>
		</td>
		<td><?php echo h($invite['Invite']['ivitation_accept']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $invite['Invite']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $invite['Invite']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $invite['Invite']['id']), null, __('Are you sure you want to delete # %s?', $invite['Invite']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Invite'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
