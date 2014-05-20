<h2>Endorsers</h2>
<hr>
<?php
if (empty($endorsers)) {
    echo 'No Users found.';
} else {
    foreach ($endorsers as $id => $user) {
        echo '<div class="row"><div class="col-xs-1 col-xs-offset-1">';
        echo $this->Html->image('user1.png', array("alt" => "user avatar", "class" => "img-responsive", 'style' => 'height:40px;'));
        echo '</div><div class="col-xs-10">';
        echo $this->Html->link($user, array('controller' => 'users', 'action' => 'view/' . $id, 'full_base' => true), array('style' => 'font-size:18px; line-height:40px;'));
        echo '</div></div><hr>';
    }
}
?>


