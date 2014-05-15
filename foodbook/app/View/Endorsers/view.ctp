<?php
	if (empty($endorsers))
	{
		echo 'No Users found.';
	}
	else
	{
		foreach($endorsers as $id => $user)
		{
			echo $this->Html->link($user,array('controller' => 'users', 'action' => 'view/' . $id , 'full_base' => true)) . '<br>';
		}
	}
?>
