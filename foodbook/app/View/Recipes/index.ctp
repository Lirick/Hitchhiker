<div class="container">
	<div class="col-xs-6" style="border: 1px solid #e2e2e2; padding-bottom: 15px;">
<div class="recipes index">
	<h2><?php echo __('Recipes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($recipes as $recipe): ?>
	<?php if ($myId == h($recipe['Recipe']['author'])): ?>
	<tr>
		<td><?php echo h($recipe['Recipe']['name']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['date']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $recipe['Recipe']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $recipe['Recipe']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $recipe['Recipe']['id']), null, __('Are you sure you want to delete %s?', $recipe['Recipe']['name'])); ?>
		</td>
	</tr>
<?php endif; endforeach; ?>
	</table>
</div>
<br>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Add a new recipe'), array('action' => 'add')); ?></li>
	</ul>
</div>
</div>
</div>
