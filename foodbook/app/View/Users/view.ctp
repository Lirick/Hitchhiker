<div class="users page">
<?php echo $this->Html->image($picture, array('alt' => 'Profile Picture', 'fullBase' => true)); ?> <br>
Username: <?php echo $username?> <br>
Email: <?php echo $email?> <br>
Phone Number: <?php echo $phone?> <br>
<?php echo $this->Html->link(
    'Follow',
    array('controller' => 'followers', 'action' => 'add', $id)
); ?> <br>
<?php echo $this->Html->link(
    'Unfollow',
    array('controller' => 'followers', 'action' => 'delete', $id)
); ?>
</div>
