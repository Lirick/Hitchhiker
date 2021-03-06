
<div class="container">
<div class="row">

<div class="col-xs-3" style="border-right: 1px solid #e2e2e2;">
    <div>
        <?php echo $this->Html->image($picture,
            array(
                'class' => 'img-responsive img-thumbnail',
                'style' => 'width:260px;height:260px;',
                'alt' => 'Profile Picture',
                'fullBase' => true));
        ?>
    </div>
    <div>
        <blockquote style="margin: 10px 0;"><p class="lead"><?php echo $name ?></p></blockquote>
    </div>
    <div style="margin-bottom: 15px;">
        <?php
        if ($id != $regid) {
            if (!$follows) {
                echo $this->Html->link('Follow', array('controller' => 'followers', 'action' => 'add', $id), array('class' => 'btn btn-primary btn-block'));
            } else {
                echo $this->Html->link('Unfollow', array('controller' => 'followers', 'action' => 'delete', $id), array('class' => 'btn btn-default btn-block'));
            } ?>
            <?php
            if (!$endorses) {
                echo $this->Html->link('Endorse', array('controller' => 'endorsers', 'action' => 'add', $id), array('class' => 'btn btn-success btn-block'));
            } else {
                echo $this->Html->link('Stop Endorsing', array('controller' => 'endorsers', 'action' => 'delete', $id), array('class' => 'btn btn-default btn-block'));
            }
        } else {
            echo $this->Html->link('Edit my recipes', array('controller' => 'recipes', 'action' => 'index'), array('class' => 'btn btn-default btn-block'));
            echo $this->Html->link('Edit my profile', array('controller' => 'users', 'action' => 'edit'), array('class' => 'btn btn-default btn-block'));
        }?>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <?php if (!empty($location)): ?>
                <div><p><span class="glyphicon glyphicon-map-marker">  <?php echo $location ?></span></p></div>
            <?php endif ?>
            <?php if (!empty($email)): ?>
                <div><p><span class="glyphicon glyphicon-envelope">  <?php echo $email ?></span></p></div>
            <?php endif ?>
            <?php if (!empty($phone)): ?>
                <div><span class="glyphicon glyphicon-earphone">  <?php echo $phone ?></span></div>
            <?php endif ?>
        </div>
    </div>
    <?php if (!empty($description)): ?>
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo nl2br($description); ?>
            </div>
        </div>
    <?php endif ?>
    <?php if ($nrrecipes > 0): ?>
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo $this->Html->link('View users ' . $nrrecipes . ' recipes', array('controller' => 'recipes', 'action' => 'lists/' . $regid)); ?>
            </div>
        </div>
    <?php endif ?>
    <div class="panel panel-primary" style="text-align: center;">
        <div class="panel-body">

            <div>
                <p>
                    <a href="javascript: loadfollowers(<?php echo $id ?>);"><?php echo $nrfollows .= "  Followers" ?></a>
                </p>
            </div>

            <div>
                <p>
                    <a href="javascript: loadendorsers(<?php echo $id ?>);"><?php echo $nrendorses .= "  Endorsers" ?></a>
                </p>
            </div>
        </div>
    </div>

    <div class="panel panel-warning" style="text-align: center;">
        <div class="panel-body">
            <?php foreach ($ratings as $rating): ?>
                <div>Rating:<br>

                    <?php $i = $rating['Userrating']['Rating'] ?>
                    <?php for ($x = 1; $x <= 10; $x++): ?>
                        <i class="glyphicon glyphicon-star<?php if ($x > $i): ?><?php echo '-empty' ?><?php endif; ?>"></i>
                    <?php endfor; ?>
                </div>
            <?php endforeach; ?>
            <br>

            <div>
                <?php echo $this->Html->script('rate.js') ?>
                <script>
                    $(function () {
                        $('input').on('change', function () {
                            $.ajax({
                                type: "POST",
                                url: '<?php echo Router::url(array('controller' => 'users', 'action' => 'rate')); ?>',
                                data: {
                                    id:<?php echo $id?>,
                                    rating: $(this).val()
                                },
                                success: function () {
                                    window.location.reload();
                                }
                            });

                        })
                    });
                </script>
                My rating: <input type="number" data-max="10" data-min="1" name="your_awesome_parameter"
                                  id="some_id" class="rating"/>
            </div>

        </div>
    </div>

</div>
<div class="col-xs-9" id="rview">

    <?php if ($uid == AuthComponent::user('id')) { ?>
    <div>
        <h4>Event to attend</h4>
        <hr>
        <?php
        	foreach($events as $event){
        		$attend = $event['GoingToEvent'];
        		foreach($attend as $at){
                    if ($at['id'] == $uid) {
                        // Picture
                        echo '<div class="row" style="margin-bottom: 20px;">';

                        echo '<div class="col-xs-3" style="text-align: center;">';
                        echo $this->Html->image('events/'.$event['Event']['picture'],
                            array("alt" => "user avatar",
                                "class" => "img-responsive img-thumbnail",
                                "style" => "width:120px;"));
                        echo '</div>';

                        //Event name
                        echo '<div class="col-xs-9">';
                        echo '<p style="font-size: 18px;">';
                        echo $this->Html->link($event['Event']['ename'], array(
                            'controller' => 'events',
                            'action' => 'view', $at['Goingto']['event_id']));
                        echo '</p>';

                        //Host name

                        echo '<p>';
                        echo 'Host By '. $this->Html->link($event['EventHost']['name'], array(
                                'controller' => 'users',
                                'action' => 'view', $event['Event']['user_id']));
                        echo '</p>';

                        //Time
                        echo '<p><span class="glyphicon glyphicon-time"></span> '.$event['Event']['date'].'</p>';

                        //Location
                        echo '<p><span class="glyphicon glyphicon-home"></span> '.$event['Location']['display_address'].'</p>';
                        echo '</div>';

                        echo '</div>'; //row
                    }

        		}
        		
        	} 
        ?>
		
    </div>
    <?php } ?>

    <div>
        <h4>Event to Host</h4>        
        <hr>
        <?php
        	foreach($events as $event){
        		if($event['Event']['user_id'] == $uid ){
        			echo '<div class="row" style="margin-bottom: 20px;">';
        			//Picture
        			echo '<div class="col-xs-3" style="text-align: center;">';
        			echo $this->Html->image('events/' . $event['Event']['picture'],
        					array("alt" => "event picture",
        							"class" => "img-responsive img-thumbnail",
        							"style" => "width:120px;"));
         			echo '</div>';
         			

         			//Event Name
         			echo '<div class="col-xs-9">';
         			echo '<p style="font-size: 18px;">';
         			echo $this->Html->link($event['Event']['ename'], array(
         					'controller' => 'events',
         					'action' => 'view', $event['Event']['id']));
         			echo '</p>';
         			
         			echo '<p><span class="glyphicon glyphicon-time"></span> '.$event['Event']['date'].'</p>';
         			echo '<p><span class="glyphicon glyphicon-home"></span> '.$event['Location']['display_address'].'</p>';
         			echo '</div>';
         			echo '</div>';//row
        		}
        	} 
        ?>            
    </div>
        
<?php if ($uid == AuthComponent::user('id')) { ?>
    
    <div>    
        <h4>Pending event request</h4>
        <hr>
        
        <?php
        	foreach($events as $event){
                if (AuthComponent::user('id') == $event['Event']['user_id']) {
                    $requests = $event['RequestInviteToEvent'];
                    foreach($requests as $req){
                        echo '<div class="row" style="margin-bottom:15px;">';
                        // Picture
                        echo '<div class="col-xs-2" style="text-align: center;">';
                        echo $this->Html->image('users/'.$req['picture'],
                            array(
                                "alt" => "user avatar",
                                "class" => "img-responsive img-thumbnail",
                                "style" => "width:60px;")
                        );
                        echo '</div>';

                        //Host Name
                        echo '<div class="col-xs-7" style="border-right: 1px solid #e2e2e2;">';
                        echo '<p style="line-height:60px;font-size: 16px;">';
                        echo $this->Html->link($req['username'], array(
                                'controller' => 'users',
                                'action' => 'view',$req['id'])) .' wants to join in '.
                            $this->Html->link("Event Name", array(
                                'controller' => 'events',
                                'action' => 'view', $req['Requestinvite']['event_id']));
                        echo '</p></div>';


                        echo '<div class="col-xs-3">';
                        //Accept Request
                        echo $this->Form->postLink("Accept",
                            array(
                                'controller' => 'events',
                                'action' => 'acceptuser',
                                $req['id'], $req['Requestinvite']['event_id']),
                            array(
                                'class' => 'btn btn-success btn-sm btn-block'
                            ));

                        //Reject request
                        echo $this->Form->postLink("Decline",
                            array(
                                'controller' => 'events',
                                'action' => 'rejectuser',
                                $req['id'], $req['Requestinvite']['event_id']),
                            array(
                                'class' => 'btn btn-danger btn-sm btn-block'
                            ));
                        echo '</div>';
                        echo '</div>'; //row
                    }
                }

        	} 
        ?>                  
        </div>
<?php } ?>
    </div>
</div>
</div>


