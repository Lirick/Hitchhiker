<!-- app/View/Users/edit.ctp -->


<div class="profilepicture">
<?php echo $this->Html->image($picture, array('alt' => 'Profile Picture', 'fullBase' => true)); ?>
<?php echo $this->Form->create('User', array('type' => 'file')); ?>
       
    <legend><?php echo __('Upload profile picture'); ?></legend>
    <?php
	echo $this->Form->input('Choose file',array( 'type' => 'file'));
    echo $this->Form->end('Upload');
?>
</div>


<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Edit User'); ?></legend>
        <?php echo $this->Form->input('email', array('default' => $email)); ?>
        <?php echo $this->Form->input('phone', array('default' => $phone)); ?>
    
<?php echo $this->Form->end(__('Save')); ?>
</div>

