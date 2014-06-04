
<h2>Endorsers</h2>
<hr>
<?php
if (empty($endorsers)) {
    echo 'No Users found.';
} else {
    foreach ($endorsers as $e) {
        echo '<div class="row"><div class="col-xs-1 col-xs-offset-1">';
        echo $this->Html->image('users/'.$e['EEndorser']['picture'], array("alt" => "user avatar", "class" => "img-responsive", 'style' => 'height:40px;'));
        echo '</div><div class="col-xs-10">';
        echo $this->Html->link($e['EEndorser']['name'], array('controller' => 'users', 'action' => 'view/' . $e['EEndorser']['id'], 'full_base' => true), array('style' => 'font-size:18px; line-height:40px;'));
        echo '</div></div><hr>';
    }
}
?>


