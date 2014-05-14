<div class="events">
	<table>
		<?php foreach ($events as $event): ?>
    	<tr>
        	<td><?php echo $event['Event']['id']; ?></td>
        	<td><?php echo $event['Event']['ename']; ?></td>
        	<td><?php echo $event['Event']['host']; ?></td>
        	<td><?php echo $event['Event']['text']; ?></td>
        	<td><?php echo $event['Event']['address']; ?></td>
        	<td><?php echo $event['Event']['date']; ?></td>
        	<td><?php
        		echo $this->Html->link('View', array('action' => 'view', $event['Event']['id']));
        		?></td>
        	<td><?php
        		echo $this->Html->link('Edit', array('action' => 'edit', $event['Event']['id']));
        		?></td>
        	<td><?php        
        		echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $event['Event']['id']),
                    array('confirm' => 'Are you sure?')
                );
        		?></td>
    	</tr>
		<?php endforeach; ?>
	</table>
	<p><?php echo $this->Html->link('Create', array('action' => 'create'));?></p>
</div>