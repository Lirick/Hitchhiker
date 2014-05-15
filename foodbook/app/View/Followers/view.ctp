<?php
	if (empty($followers))
	{
		echo 'No Users found.';
	}
	else
	{
		foreach($followers as $id => $user)
		{
			echo $this->Html->link($user,array('controller' => 'users', 'action' => 'view/' . $id , 'full_base' => true)) . '<br>';
		}
	}
?>
