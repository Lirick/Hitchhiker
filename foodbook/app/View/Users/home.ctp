

<div class="users page">
Username: <?php echo $username?> <br>
Email: <?php echo $email?> <br>
Phone Number: <?php echo $phone?> <br>
<?php echo $this->Html->link('Main Page',array('controller' => '/', 'full_base' => true)); ?> 
<?php echo $this->Html->link('Edit',array('controller' => 'users', 'action' => 'edit', 'full_base' => true)); ?> 
<?php echo $this->Html->link('Search',array('controller' => 'users', 'action' => 'search', 'full_base' => true)); ?> 
<?php echo $this->Html->link('Logout',array('controller' => 'users', 'action' => 'logout', 'full_base' => true)); ?>

</div>
