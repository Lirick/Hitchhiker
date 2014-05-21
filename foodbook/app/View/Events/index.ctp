
<div class="events">
	<table>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>HostId</th>
			<th>Text</th>
			<th>Address</th>
			<th>Date</th>
			<th>Price per Guest</th>
			<th>Min guests</th>
			<th>Max guests</th>
			<th>Cuisine Id</th>			
		</tr>
		<?php foreach ($events as $event): ?>
		
    	<tr>
        	<td><?php echo $event['Event']['id']; ?></td>
        	<td><?php echo $event['Event']['ename']; ?></td>
        	<td><?php echo $event['EventHost']['username']; ?></td>
        	<td><?php echo $event['Event']['text']; ?></td>
        	<td><?php echo $event['Event']['address']; ?></td>
        	
        	<td><?php echo $event['Event']['date']; ?></td>        	
   			<td><?php echo h($event['Event']['price_per_guest'])?></td>
   			<td><?php echo h($event['Event']['min_guests'])?></td>
    		<td><?php echo h($event['Event']['max_guests'])?></td>
    		<td><?php echo h($event['Cuisine'][0]['name'])?></td>
    		
        	
        	<?php foreach ($event['InvitedToEvent'] as $user): ?>
        	<td><?php echo $user['username']; ?></td>
        	<?php endforeach; ?>
        	
        	<td>
        	<?php
	        	echo $this->Form->postLink(
	        	'Request invite',
	        	array('action' => 'request', $event['Event']['id'])
	        	);
        	?>
        	</td>
        	
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