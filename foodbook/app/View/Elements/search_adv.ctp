<?php
/*************************************
 * Search by Event Name
************************************/
	echo $this->Form->create('Event', array('action' => 'search', 'novalidate' => true));
	
	echo $this->Form->input('ename', array(
			'div' => 'form-group',
			'label' => 'Event Name',
			'placeholder' => 'Type in the Event Name',
			'class' => 'form-control',			
			'type' => 'text'
			));
		
/*************************************
 * Date
************************************/
	echo $this->Form->input(
			'date-from',
			array('label' => 'Date From',
					'div' => 'form-group',
					'id' => 'date-from',
					'type' => 'text',
					'class' => 'form-control',
					'between' => "<div class='input-group date picker' id='date-from'>",
					'after' => "<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></div>"));
	 
	echo $this->Form->input(
			'date-to',
			array('label' => 'Date To',
					'div' => 'form-group',
					'id' => 'date-to',
					'type' => 'text',
					'class' => 'form-control',
					'between' => "<div class='input-group date picker' id='date-to'>",
					'after' => "<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></div>"));
	

	
/*************************************
 * Cuisines
 ************************************/	 
	$cs = array();
	$cs[0] = '---';
	foreach ($cuisines as $c) {
		$cs[$c['Cuisine']['id']] = $c['Cuisine']['name'];
	}
	

	//for some reasons, it's better to use Form->input(type => select) instead of Form->select
	echo $this->Form->input(
			'cuisine', array(
					'div' => 'form-group',
					'options' => $cs,
					'id' => 'cuisine',
					'type' => 'select',
					'label' => 'Cuisine',
					'class' => 'form-control'
			));


/*************************************
 * Price
 ************************************/	
	
	echo $this->Form->input('price', array(					
			'selected' => 'low',
			'label' => 'Sort Price',			
			'between' => ' ',									
			'options' => array('low' => 'lowest first', 'high' => 'highest first')
	));

	
/*************************************
 * Submit button
 ************************************/
	echo $this->Form->submit('Apply', array(
			'id' => 'search-button',
			'class' => 'btn btn-primary',
			'div' => false
			));	
	echo $this->Form->end();
	?>

<script>
	$('.picker').datetimepicker({
		//defaultDate: moment().format('MM/DD/YYYY h:mm A')
	});

	
	$('#search-button').click(function(){		
		if( $('#date-to').val() >= $('#date-from').val() ){			
			$('#EventSearchForm').submit();
		}
	});
	
	//check if to is smaller than from date - error!
</script>

<style>
	form{
		padding-top: 1em;		
		border-radius: 4px;
	}	
</style>