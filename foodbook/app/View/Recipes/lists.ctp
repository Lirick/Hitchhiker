<?php  echo 'Showing recipes created by user ' . $user . ':<br>';?>
<?php 
		foreach($found as $name => $id)
		{
			echo $this->Html->link($name,array('controller' => 'recipes', 'action' => 'view/' . $id , 'full_base' => true)) . ' <br>';
		}
?>
</div>

