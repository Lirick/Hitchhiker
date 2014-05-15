<div class="events">
	Id: <?php echo $event['Event']['id']?> <br/>
    Name: <?php echo h($event['Event']['ename'])?><br/>
    Host: <?php echo h($event['Event']['host'])?><br/>
    Address: <?php echo h($event['Event']['address'])?><br/>
    Date:  <?php echo $event['Event']['date']?><br/>
    Text:  <?php echo h($event['Event']['text'])?><br/>
    <p><?php $this->Html->link('Edit', array('action' => 'edit', $event['Event']['id'])); ?></p>
	<p><?php $this->Html->link('Delete', array('action' => 'delete', $event['Event']['id'])); ?></p>
</div>