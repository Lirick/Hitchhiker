<div class="events">
<?php echo $this->Form->create('Event'); ?>
    <fieldset>
        <legend><?php echo __('Create Event'); ?></legend>
        <?php        	
        	$cs = array();
        	foreach($cuisines as $c){
        		$cs[$c['Cuisine']['id']] = $c['Cuisine']['name'];
        	}        	
       		echo $this->Form->input('ename');
        	echo $this->Form->input('text');
        	echo $this->Form->input('address');
        	echo $this->Form->input('date');
        	echo $this->Form->input('price_per_guest', array('placeholder' => 0));
        	
        	echo $this->Form->label('min_guests', 'Min guests');
        	echo $this->Form->select('min_guests', array(0,1,2,3,4,5));
        	
        	echo $this->Form->label('max_guests', 'Max guests');
        	echo $this->Form->select('max_guests', array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15));
        	
        	echo $this->Form->label('cuisine');
    		echo $this->Form->select('cuisine', $cs, array('value' => 'None'));
    ?>
    </fieldset>

<?php echo $this->Form->end(array(
		'label' => 'Create',
		'class' => 'btn btn-primary btn-block',
		'style' => 'width: 64px; margin: 10px')); 
?>
</div>