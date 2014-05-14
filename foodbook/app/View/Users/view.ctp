<div class="users page">
<?php echo $this->Html->image($picture, array('alt' => 'Profile Picture', 'fullBase' => true)); ?> <br>
Username: <?php echo $username?> <br>
Email: <?php echo $email?> <br>
Phone Number: <?php echo $phone?> <br>
<?php
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
} ?>

</div>
