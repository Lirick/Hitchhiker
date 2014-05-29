<pre>
    <?php print_r($followers);
    ?>
</pre>

<h2>Followers</h2>
<hr>
<?php

if (empty($followers)) {
    echo 'No Users found.';
} else {
    foreach ($followers as $id => $user) {
        echo '<div class="row"><div class="col-xs-1 col-xs-offset-1">';
        echo $this->Html->image('user1.png', array("alt" => "user avatar", "class" => "img-responsive", 'style' => 'height:40px;'));
        echo '</div><div class="col-xs-10">';
        echo $this->Html->link($user, array('controller' => 'users', 'action' => 'view/' . $id, 'full_base' => true), array('style' => 'font-size:18px; line-height:40px;'));
        echo '</div></div><hr>';
    }
}
?>

