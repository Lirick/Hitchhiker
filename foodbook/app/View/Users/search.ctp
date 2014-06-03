<div class="container">
<div class="col-xs-6 col-xs-offset-3" style="border: 1px solid #e2e2e2; padding-bottom: 15px;">
<?php echo $this->Form->create('User'); ?>
        <legend>
            <?php echo __('Search user'); ?>
        </legend>
        <?php echo $this->Form->input('Search',array('div'=> false,'class' => 'form-control','label' => 'Username')); ?>

<?php echo $this->Form->end(__('Search')); ?>
<?php if ($searched) {echo 'Showing results for ' . $username . ':<br>';}?>
<?php if ($searched) {
	if (empty($found))
	{
		echo 'No Users found.';}
	else
	{
		foreach($found as $user => $id)
		{
			echo $this->Html->link($user,array('controller' => 'users', 'action' => 'view/' . $id , 'full_base' => true)) . '<br>';
			
		}
	}
}?></div>
</div>

