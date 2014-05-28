<div class="users form">
<?php echo $this->Form->create('Recipe'); ?>
    <fieldset>
        <legend>
            <?php echo __('Search Recipes'); ?>
        </legend>
        <?php echo $this->Form->input('Search'); ?>
    </fieldset>
<?php echo $this->Form->end(__('Search')); ?>
<?php if ($searched) {echo 'Showing results for ' . $recipe . ':<br>';}?>
<?php if ($searched) {
	if (empty($found))
	{
		echo 'No Recpies found.';}
	else
	{
		foreach($found as $id => $name)
		{
			foreach($name as $n => $aid)
			{
				echo $this->Html->link($n,array('controller' => 'recipes', 'action' => 'view/' . $id , 'full_base' => true)) . ' by '.$aid.' <br>';
			}
		}
	}
}?>
</div>

