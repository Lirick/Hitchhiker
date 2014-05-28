<!-- Used in View Events -->

<div class="panel panel-success">
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
            'class' => 'btn btn-success btn-block'));
        ?>
        <hr>
        <?php foreach ($event['Comment'] as $comment): ?>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $comment['username']; ?> said:</h3>
                </div>
                <div class="panel-body">
                    <p><?php echo h($comment['text']); ?></p>
                    <p class="text-right" style="margin: 0;color: #e2e2e2">
                        <small>
                            <em><?php echo $comment['time']; ?></em>
                        </small>
                    </p>
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
