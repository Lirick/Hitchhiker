<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($user['User']['phone']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Invites'), array('controller' => 'invites', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Invite From'), array('controller' => 'invites', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Invite'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Invites'); ?></h3>
	<?php if (!empty($user['InviteFrom'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User From'); ?></th>
		<th><?php echo __('User To'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th><?php echo __('Ivitation Accept'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['InviteFrom'] as $inviteFrom): ?>
		<tr>
			<td><?php echo $inviteFrom['id']; ?></td>
			<td><?php echo $inviteFrom['user_from']; ?></td>
			<td><?php echo $inviteFrom['user_to']; ?></td>
			<td><?php echo $inviteFrom['event_id']; ?></td>
			<td><?php echo $inviteFrom['ivitation_accept']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'invites', 'action' => 'view', $inviteFrom['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'invites', 'action' => 'edit', $inviteFrom['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'invites', 'action' => 'delete', $inviteFrom['id']), null, __('Are you sure you want to delete # %s?', $inviteFrom['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Invite From'), array('controller' => 'invites', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Invites'); ?></h3>
	<?php if (!empty($user['InviteTo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User From'); ?></th>
		<th><?php echo __('User To'); ?></th>
		<th><?php echo __('Event Id'); ?></th>
		<th><?php echo __('Ivitation Accept'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['InviteTo'] as $inviteTo): ?>
		<tr>
			<td><?php echo $inviteTo['id']; ?></td>
			<td><?php echo $inviteTo['user_from']; ?></td>
			<td><?php echo $inviteTo['user_to']; ?></td>
			<td><?php echo $inviteTo['event_id']; ?></td>
			<td><?php echo $inviteTo['ivitation_accept']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'invites', 'action' => 'view', $inviteTo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'invites', 'action' => 'edit', $inviteTo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'invites', 'action' => 'delete', $inviteTo['id']), null, __('Are you sure you want to delete # %s?', $inviteTo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Invite To'), array('controller' => 'invites', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Events'); ?></h3>
	<?php if (!empty($user['Event'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Ename'); ?></th>
		<th><?php echo __('Host'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Text'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['Event'] as $event): ?>
		<tr>
			<td><?php echo $event['id']; ?></td>
			<td><?php echo $event['ename']; ?></td>
			<td><?php echo $event['host']; ?></td>
			<td><?php echo $event['address']; ?></td>
			<td><?php echo $event['date']; ?></td>
			<td><?php echo $event['text']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'events', 'action' => 'view', $event['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'events', 'action' => 'edit', $event['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'events', 'action' => 'delete', $event['id']), null, __('Are you sure you want to delete # %s?', $event['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($user['UserInvite'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['UserInvite'] as $userInvite): ?>
		<tr>
			<td><?php echo $userInvite['id']; ?></td>
			<td><?php echo $userInvite['name']; ?></td>
			<td><?php echo $userInvite['email']; ?></td>
			<td><?php echo $userInvite['phone']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $userInvite['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $userInvite['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $userInvite['id']), null, __('Are you sure you want to delete # %s?', $userInvite['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User Invite'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
