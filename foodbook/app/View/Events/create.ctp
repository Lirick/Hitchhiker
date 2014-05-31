<div class="container">
    <div class="col-xs-10 col-xs-offset-1">
        <?php echo $this->Form->create('Event'); ?>
        <h2>Host your event</h2>
        <hr>

        <?php
        $cs = array();
        foreach ($cuisines as $c) {
            $cs[$c['Cuisine']['id']] = $c['Cuisine']['name'];
        }
        ?>
        <div class="row">
            <div class="col-xs-12">
                <?php
                //Event name
                echo $this->Form->input(
                    'ename',
                    array('div' => 'form-group',
                        'label' => 'Event Topic',
                        'class' => 'form-control',
                        'placeholder' => "What's the topic of your event?"));
                ?>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6">
                <?php
                //Search address box
                echo $this->Form->input(
                    'address',
                    array('label' => 'Address of your event',
                        'div' => 'form-group',
                        'id' => 'address-search',
                        'class' => 'form-control',
                        'placeholder' => "Start typying address of the event"));
                ?>
                <div id="map-canvas" style="width: 100%; height: 200px;"></div>
            </div>
            <div class="col-xs-6">
                <?php
                //Date

                echo '<div class="form-group">';
                echo '<label>Schedule</label>';
                echo $this->Form->input('date', array('label' => false));
                echo '</div>';

                /*
                echo $this->Form->input(
                    'date',
                    array('label' => 'Schedule of your event',
                        'div' => 'form-group',
                        'type' => 'text',
                        'class' => 'form-control',
                        'between' => "<div class='input-group date' id='eventdp'>",
                        'after' => "<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></div>"));
                */
                ?>
                <div class="form-group">
                    <label>Guest number</label>

                    <div class="row">
                        <div class="col-xs-1" style="padding: 0; margin-left: 15px;">
                            <p style="line-height:34px;">From</p>
                        </div>
                        <div class="col-xs-3">
                            <?php
                            echo $this->Form->input(
                                'min_guests',
                                array('label' => false,
                                    'div' => false,
                                    'class' => 'form-control',
                                    'placeholder' => '1',
                                    'value' => 1,
                                    'type' => 'number'
                                ));
                            ?>
                        </div>
                        <div class="col-xs-1" style="padding: 0;"><p style="line-height:34px;">To</p></div>
                        <div class="col-xs-3">
                            <?php
                            echo $this->Form->input(
                                'max_guests',
                                array('label' => false,
                                    'div' => false,
                                    'class' => 'form-control',
                                    'placeholder' => '5',
                                    'value' => 5,
                                    'type' => 'number'
                                ));
                            ?>
                        </div>
                    </div>
                </div>

                <?php
                //for some reasons, it's better to use Form->input(type => select) instead of Form->select
                echo $this->Form->input(
                    'cuisine', array(
                    'div' => 'form-group',
                    'options' => $cs,
                    'type' => 'select',
                    'label' => 'Cusine',
                    'class' => 'form-control'
                ));
                ?>

            </div>
            <!-- .col-xs-6 end -->
        </div>
        <!-- .form-group end -->
        <!-- <div style="clear:both;"></div> -->

        <div class="row">
            <div class="col-xs-12" style="margin-top: 10px;">
                <?php
                echo $this->Form->input(
                    'text', array(
                    'label' => 'Event description',
                    'class' => 'form-control'
                ));
                ?>
            </div>
        </div>
        <hr>
        <div class="row" style="margin-top: 15px;">
            <div class="col-xs-4">
                <?php
                echo $this->Form->input(
                    'price_per_guest',
                    array('label' => 'Price per person',
                        'div' => 'form-group',
                        'class' => 'form-control',
                        'between' => "<div class='input-group input-group-lg'>",
                        'after' => '<span class="input-group-addon">SEK</span></div>',
                        'type' => 'number',
                        'placeholder' => '0',
                        'value' => 0
                    ));
                ?>  
            </div>
            <div class="col-xs-4">
            </div>
            <div class="col-xs-4" style="margin-top: 30px;">
            <?php echo $this->Form->button(
                'Invite people',
                array(
                	'data-toggle' => 'modal',
                	'data-target' => '#inviteModal',
                	'type' => 'button',
                	'class' => 'btn btn-default btn-lg btn-block'
                    ));?>
            </div>
            
        </div>
        <hr>
        <div>
            <?php
            echo $this->Form->end(array(
                'label' => 'Create my event',
                'class' => 'btn btn-primary btn-lg btn-block'));
            ?>
            <?php
            //          //Attempt to fix preventing submission when press Enter because we also press Enter when we confirm
            //          //autocomplete in location search
            //         echo $this->Form->submit('Create my event',
            //         		array(
            //         				'onmousedown' => 'itsclicked = true; return true;',
            //         				'onkeydown' => 'itsclicked = true; return true;',
            //         				'class' => 'btn btn-primary btn-lg btn-block'
            //         		));
            //
            ?>
        </div> 
        <!-- Modal -->

			<div class="modal fade" id="inviteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title" id="myModalLabel">Invite people</h4>
			      </div>
			      <div class="modal-body">
			        <div class="container">
					<?php //echo $this->Form->create('Event');
						 ?>
					<?php echo $this->Form->input('Search', array('id' => 'search-i')); ?>
					<?php echo $this->Form->button('Search',
					array(
						'type' => 'button',
						'id' => 'search-button')); ?>
						
						
					</div>
					<div class="container" id="search-container">
					
						
					
					</div>
					<script>
						$('#search-button').click(function() {
							$.ajax({
					          type: "POST",
					          url: "<?php echo $this->Html->url(array('controller' => 'events', 'action' => 'searchUsers')); ?>",
					          data: { 
					           'data' : $('#search-i').val()
					           },
					          dataType:"json",
					          success: function(data){
						          console.log(data);
						          //var parsedJSON = $.parseJSON(data);
						          $('#search-container').html(data);
					          },
					          error: function (response, status){
						          alert('ERROR!');
					          }
					          });
					          
						});
					</script>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Save changes</button>
			      </div>
			    </div>
			  </div>
			</div>
    </div>
</div>
