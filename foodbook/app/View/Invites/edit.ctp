<div class="invites form">
<?php echo $this->Form->create('Invite'); ?>
	<fieldset>
		<legend><?php echo __('Edit Invite'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('iviter_user_id');
		echo $this->Form->input('invited_user_id');
		echo $this->Form->input('event_id');
		echo $this->Form->input('ivitation_accept');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Invite.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Invite.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Invites'), array('action' => 'index')); ?></li>
	</ul>
</div>
