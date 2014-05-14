<div class="events">
<?php echo $this->Form->create('Event'); ?>
    <fieldset>
        <legend><?php echo __('Create Event'); ?></legend>
        <?php
       		echo $this->Form->input('ename');
        	echo $this->Form->input('text');
        	echo $this->Form->input('address');
        	echo $this->Form->input('date');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>

</div>