<!-- Used in View Events -->

<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Comments</h3>
    </div>
    <div class="panel-body">
        <?php
        echo $this->Form->create('Comment', array(
            'url' => array('controller' => 'comments', 'action' => 'add', $event['Event']['id'])
        ));
        echo $this->Form->input('text',
            array(
                'label' => 'Write your comment here',
                'class' => 'form-control',
                'style' => 'margin-bottom: 5px;'
            ));
        echo $this->Form->end(array(
            'label' => 'Done',
            'class' => 'btn btn-primary btn-block'));
        ?>
        <hr>
        <?php foreach ($event['Comment'] as $comment): ?>
            <div class="panel panel-info">
                <div class="panel-heading">
                	<div style="margin-right: 10px; float:left;">
                		<?php echo $this->Html->image("users/" .$comment['picture'], array('style' =>'height:30px;padding:0;', 'class' => 'img-responsive img-thumbnail', 'alt' => 'Profile Picture', 'fullBase' => true)); ?>
                	</div>
                    <h3 class="panel-title">                    	
                    	<?php echo $this->Html->link($comment['username'], array('controller' => 'users','action' => 'view'));?>
                    </h3>
                    <h3 class="panel-title" style="margin: 0; color: #b2b2b2">
						<small><em><?php echo $comment['time']; ?></em></small>
                    </h3>
                    <div style="clear:both;"></div>
                </div>
                <div class="panel-body">
                    <p><?php echo h($comment['text']); ?></p>
<!--                     <p class="text-right" style="margin: 0;color: #b2b2b2">
                        <small><em><?php echo $comment['time']; ?></em></small>
                    </p>
-->
                    <?php echo $this->Form->postLink(
                        'Delete',
                        array('controller' => 'comments', 'action' =>'delete', $comment['id']),
                        array('confirm' => 'Are you sure?'));
                    ?>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>
