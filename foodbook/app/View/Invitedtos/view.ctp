<div class="invitedtos view">
<h2><?php echo __('Invitedto'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($invitedto['Invitedto']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($invitedto['User']['phone'], array('controller' => 'users', 'action' => 'view', $invitedto['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($invitedto['Event']['ename'], array('controller' => 'events', 'action' => 'view', $invitedto['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Invitation Accept'); ?></dt>
		<dd>
			<?php echo h($invitedto['Invitedto']['invitation_accept']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Invitedto'), array('action' => 'edit', $invitedto['Invitedto']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Invitedto'), array('action' => 'delete', $invitedto['Invitedto']['id']), null, __('Are you sure you want to delete # %s?', $invitedto['Invitedto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Invitedtos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invitedto'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
