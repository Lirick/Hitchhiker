<div class="invites view">
<h2><?php echo __('Invite'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($invite['Invite']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User From'); ?></dt>
		<dd>
			<?php echo h($invite['Invite']['user_from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User To'); ?></dt>
		<dd>
			<?php echo h($invite['Invite']['user_to']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Event'); ?></dt>
		<dd>
			<?php echo $this->Html->link($invite['Event']['ename'], array('controller' => 'events', 'action' => 'view', $invite['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ivitation Accept'); ?></dt>
		<dd>
			<?php echo h($invite['Invite']['ivitation_accept']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Invite'), array('action' => 'edit', $invite['Invite']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Invite'), array('action' => 'delete', $invite['Invite']['id']), null, __('Are you sure you want to delete # %s?', $invite['Invite']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Invites'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invite'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
