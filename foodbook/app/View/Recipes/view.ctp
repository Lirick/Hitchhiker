<div class="container">
	<div class="col-xs-6 col-xs-offset-3" style="border: 1px solid #e2e2e2; padding-bottom: 15px;">
		<h2><?php echo $name ?></h2>
        <hr>
		By: <?php echo $author ?> <br> 

		<h4> Ingredients </h4>
		<?php echo nl2br($ingreds) ?>
		<hr>
				        
		<h4> Instructions </h4>
		<?php echo nl2br($text) ?>
	</div>
</div>

