<!-- app/View/Users/edit.ctp -->
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Edit User'); ?></legend>
        <?php echo $this->Form->input('email', array('default' => $email)); ?>
        <?php echo $this->Form->input('phone', array('default' => $phone)); ?>
    </fieldset>
<?php echo $this->Form->end(__('Save')); ?>
</div>

