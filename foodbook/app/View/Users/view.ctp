<pre>
<?php
	print_r($ratings)
?>

</pre>


<div class="users page">
<?php echo $this->Html->image($picture, array('alt' => 'Profile Picture', 'fullBase' => true)); ?> <br>
Username: <?php echo $username?> <br>
Email: <?php echo $email?> <br>
Phone Number: <?php echo $phone?> <br>
User has <?php echo $nrfollows ?> following them (<?php echo $this->Html->link('View',array('controller' => 'followers', 'action' => 'view', $id)); ?>). <br>
User has <?php echo $nrendorses ?> endorsing them (<?php echo $this->Html->link('View',array('controller' => 'endorsers', 'action' => 'view', $id)); ?>). <br>
<?php foreach ($ratings as $rating):
 
	
?>

<?php
if ($id != $regid)
{
	if (!$follows)
	{
	 	echo $this->Html->link('Follow',array('controller' => 'followers', 'action' => 'add', $id)); 
	}
	else
	{
	 	echo $this->Html->link('Unfollow',array('controller' => 'followers', 'action' => 'delete', $id));
	} ?> <br>
	<?php
	if (!$endorses)
	{
	 	echo $this->Html->link('Endorse',array('controller' => 'endorsers', 'action' => 'add', $id)); 
	}
	else
	{
	 	echo $this->Html->link('Stop Endorsing',array('controller' => 'endorsers', 'action' => 'delete', $id));
	}
} ?>

</div>
