
<div class="events">
	<table>
		<?php foreach ($users as $user): ?>
		
    	<tr>
        	<td><?php echo $user['username']; ?></td>
        	<td><?php echo $user['email']; ?></td>
        	<td><?php echo $user['phone']; ?></td>
        	<td><?php echo $user['picture']; ?></td>
            <td> <?php        
        		echo $this->Form->postLink(
                    'Accept',
                    array('action' => 'acceptuser', $user['id'],$event['id'])
                );
        		?> </td>
    	</tr>
    	
		<?php endforeach; ?>
	</table>
</div>