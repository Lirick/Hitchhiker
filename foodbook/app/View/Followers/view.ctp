<h2>Followers</h2>
<hr>
<?php

if (empty($follower)) {
    echo 'No Users found.';
} else {
    foreach ($follower as $f) {
        echo '<div class="row"><div class="col-xs-1 col-xs-offset-1">';
        echo $this->Html->image('users/'.$f['FFollower']['picture'], array("alt" => "user avatar", "class" => "img-responsive", 'style' => 'height:40px;'));
        echo '</div><div class="col-xs-10">';
        echo $this->Html->link($f['FFollower']['username'], array('controller' => 'users', 'action' => 'view/' . $f['FFollower']['id'], 'full_base' => true), array('style' => 'font-size:18px; line-height:40px;'));
        echo '</div></div><hr>';
    }
}
?>

