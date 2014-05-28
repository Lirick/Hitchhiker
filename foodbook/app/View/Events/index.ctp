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
	<p style="font-weight: bold;">Page Navigator:</p>
	<?php
	
	// Shows the next and previous links
	echo $this->Paginator->prev(
			'« Previous',
			null,
			null,
			array('class' => 'disabled')
	);
	
	echo '&nbsp;';
	// Shows the page numbers
	echo $this->Paginator->numbers(array('modulus' => 3));
	
	echo '&nbsp;';
	echo $this->Paginator->next(
			'Next »',
			null,
			null,
			array('class' => 'disabled')
	);
	
	echo '<br/>';
	// prints X of Y, where X is current page and Y is number of pages
	echo $this->Paginator->counter();
// 	echo $this->Paginator->counter(array(
// 			'format' => 'Page {:page} of {:pages}, showing {:current} records out of
// 			{:count} total, starting on record {:start}, ending on {:end}'
// 	));
	?>
	<p><?php echo $this->Html->link('Create', array('action' => 'create'));?></p>
</div>