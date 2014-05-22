<!-- Used in View Events -->
<p style="font-weight: bold;">Comments</p>
<div>		
	<?php 
		echo $this->Form->create('Comment', array(
			'url' => array('controller' => 'comments', 'action' => 'add', $event['Event']['id'])
			)); 
		echo $this->Form->input('text');
		echo $this->Form->end(__('Submit')); 
	?>
	
	<?php foreach ($event['Comment'] as $comment): ?>
		<div style="padding: 10px; border-bottom: 1px solid;">
			<p>Author: <?php echo $comment['username']; ?></p>
			<p>Text: <?php echo h($comment['text']); ?></p>
			<p>Time: <?php echo $comment['time']; ?></p>
			<p><?php        			
        		echo $this->Form->postLink(
                    'Delete', 
        			array('controller' => 'comments', 'action' =>'delete', $comment['id']),
        			array('confirm' => 'Are you sure?')
                );
        		?></p>
		</div>
	<?php endforeach; ?>
</div>