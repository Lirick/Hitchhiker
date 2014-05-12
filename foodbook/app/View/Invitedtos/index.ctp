<div class="invitedtos index">
	<h2><?php echo __('Invitedtos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('event_id'); ?></th>
			<th><?php echo $this->Paginator->sort('invitation_accept'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($invitedtos as $invitedto): ?>
	<tr>
		<td><?php echo h($invitedto['Invitedto']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($invitedto['User']['phone'], array('controller' => 'users', 'action' => 'view', $invitedto['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($invitedto['Event']['ename'], array('controller' => 'events', 'action' => 'view', $invitedto['Event']['id'])); ?>
		</td>
		<td><?php echo h($invitedto['Invitedto']['invitation_accept']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $invitedto['Invitedto']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $invitedto['Invitedto']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $invitedto['Invitedto']['id']), null, __('Are you sure you want to delete # %s?', $invitedto['Invitedto']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Invitedto'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
