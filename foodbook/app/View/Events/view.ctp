<!-- 
<pre>
	<?php //print_r($event); ?>
</pre>
 -->
<div class="container">
    <div class="row">
        <div class="col-xs-3" style="border-right: 1px solid #e2e2e2;">

            <div>
                <?php echo $this->Html->image("users/" .$event['EventHost']['picture'], array('class' => 'img-responsive img-thumbnail', 'alt' => 'Profile Picture', 'fullBase' => true)); ?>
            </div>
            <div>
                <blockquote style="margin: 10px 0;"><p class="lead"><?php echo $event['EventHost']['username'] ?></p></blockquote>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div><p><span class="glyphicon glyphicon-envelope">  <?php echo $event['EventHost']['email'] ?></span></p></div>
                    <div><span class="glyphicon glyphicon-earphone">  <?php echo $event['EventHost']['phone'] ?></span></div>
                </div>
            </div>

        </div>
        <div class="col-xs-6">
            <div>

                <h2><?php echo h($event['Event']['ename'])?></h2>
                <h4 style="display: inline-block;"><small>Host by </small><?php echo h($event['EventHost']['username'])?></h4>

            </div>
            <hr>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Event Information</h3>
                </div>
                <div class="panel-body">
                    <dl class="dl-horizontal" style="margin-bottom: 5px;">
                        <dt>Address</dt>
                        <dd><?php echo h($event['Event']['address'])?></dd>
                        <dt>Date</dt>
                        <dd><?php echo $event['Event']['date']?></dd>
                        <dt>Guest Number</dt>
                        <dd><?php echo h($event['Event']['min_guests'])?> - <?php echo h($event['Event']['max_guests'])?>  persons</dd>
                        <dt>Cuisine</dt>
                        <dd><?php echo h($event['Cuisine'][0]['name'])?></dd>
                    </dl>
                </div>

            </div>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Event Description</h3>
                </div>
                <div class="panel-body">
                    <?php echo h($event['Event']['text'])?>
                </div>

            </div>

            <?php echo $this->element('comments');?>
        </div>
        <div class="col-xs-3">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Price</h3>
                </div>
                <div class="panel-body">
                    <h2><?php echo h($event['Event']['price_per_guest'])?> <small>SEK / guest</small></h2>
                </div>
            </div>
            <button class="btn btn-primary btn-block btn-lg">I want to join!</button>
            <hr>
            <?php echo $this->Html->link('Edit', array('action' => 'edit', $event['Event']['id']), array('class' => 'btn btn-default btn-block ')); ?>
            <?php echo $this->Html->link('Delete', array('action' => 'delete', $event['Event']['id']), array('class' => 'btn btn-danger btn-block'));  ?>
        </div>
    </div>

</div>