<div class="container">
	<div class="col-xs-6 col-xs-offset-3" style="border: 1px solid #e2e2e2; padding-bottom: 15px;">
		<?php echo $this->Form->create('Recipe'); ?>
		<h2>Edit the recipe</h2>
		 <div class="form-group">
		 <?php echo $this->form->input(
				            'name',
				            array('label' => 'Recipe name',
				            'div'=> false,
				                'class' => 'form-control',
				                'default' => $name
				                ));
				        ?>
		 <?php echo $this->form->input(
				            'ingreds',
				            array('label' => 'Ingredients',
				            'div'=> false,
				            'type' => 'textarea',
				                'class' => 'form-control',
				                'placeholder' => 'Summary of all necessary ingredients',
				                'default' => $ingreds
				                ));
				        ?>
		 <?php echo $this->form->input(
				            'text',
				            array('label' => 'Instructions',
				            'type' => 'textarea',
				            'div'=> false,
				                'class' => 'form-control',
				                'default' => $text
				                ));
				        ?>
		 <?php echo $this->form->input(
				            'tags',
				            array('label' => 'Extra tags',
				            'div'=> false,
				                'class' => 'form-control',
				                'default' => $tags
				                ));
				        ?><br>
				    <?php echo $this->Form->end(
				        array(
				            'label' => 'Save',
				            'class' => 'btn btn-primary btn-block')); ?>
	</div>
</div>
