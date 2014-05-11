<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Search user'); ?>
        </legend>
        <?php echo $this->Form->input('Search'); ?>
    </fieldset>
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
			echo '<a href="/users/view/'. $id . '" class="button">' . $user . '</a><br>';
		}
	}
}?>
</div>

