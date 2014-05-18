<div class="events">
<?php echo $this->Form->create('Event'); ?>
    <fieldset>
        <legend><?php echo __('Create Event'); ?></legend>
        <?php
        	//dummy
        	$cuisines = array(
        		'0' => 'None',        		
    			'1' => 'African',
    			'2' => 'Asian',
    			'3' => 'European'
			);
       		echo $this->Form->input('ename');
        	echo $this->Form->input('text');
        	echo $this->Form->input('address');
        	echo $this->Form->input('date');
        	echo $this->Form->input('price_per_guest');
        	
        	echo $this->Form->label('min_guests', 'Min guests');
        	echo $this->Form->select('min_guests', array(0,1,2,3,4,5));
        	
        	echo $this->Form->label('max_guests', 'Max guests');
        	echo $this->Form->select('max_guests', array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15));
        	
        	echo $this->Form->label('cuisine');
    		echo $this->Form->select('cuisine', $cuisines, array('value' => 'None'));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>

</div>