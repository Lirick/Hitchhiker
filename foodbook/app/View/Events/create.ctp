<?php 
	echo $this->Html->script('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places');    
    echo $this->Html->script('map');    
?>
	
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
                    	'id' => 'event-topic', 
                    	'value' => 'Event Topic',                   	
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

//                 echo '<div class="form-group">';
//                 echo '<label>Schedule</label>';
//                 echo $this->Form->input('date', array('label' => false, 'id' => 'event-schedule'));
//                 echo '</div>';

                
                echo $this->Form->input(
                    'date',
                    array('label' => 'Schedule of your event',
                        'div' => 'form-group',
                    	'id' => 'event-schedule',                        
                        'type' => 'text',                    	
                        'class' => 'form-control',
                        'between' => "<div class='input-group date' id='eventdp'>",
                        'after' => "<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></div>"));
                
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
                                	'id' => 'event-min-guests',
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
                                	'id' => 'event-max-guests',
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
                    'id' => 'event-cuisine',
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
                    'value' => 'Event Description',
                    'id' => 'event-description',
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
                    	'id' => 'event-price',
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
                'Invite users',
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
	        	//echo $this->Js->event(''); 
	        ?>
            <?php
            	echo $this->Form->button('Create my Event', array(
            			'type' => 'button',
            			'id' => 'create-button',
            			'class' => 'btn btn-primary btn-lg btn-block'));                       	 
            ?>
        </div> 
        <!-- Modal -->

			<div class="modal fade" id="inviteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title" id="myModalLabel">Invite users</h4>
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
					<div class="container" id="search-container" style="width:400px; height:200px;overflow-y:scroll;">
					
						
					
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
					          		var searchdiv = document.getElementById("search-container");
					          		searchdiv.removeChild(searchdiv.firstChild);
					          		var f = document.createElement("form");
					          		f.setAttribute('method',"post");
					          		//f.setAttribute('action',"submit.php");
					          		var divrow = document.createElement("div");
					          		divrow.setAttribute('class', 'row');
					          		divrow.setAttribute('style', 'width:550px');
					          		var limit = 3;
					          		var count = 0;
						          $.each(data, function(id,object){
						          
							          console.log(object);
						          	  var hdiv = document.createElement("div");
						          	  hdiv.setAttribute('class', 'col-xs-4');
						          	  
						          	  var divrow2 = document.createElement("div");
						          	  divrow2.setAttribute('class', 'row');
						          	  divrow2.setAttribute('style', 'width:150px');

							          $.each(object, function(username,image){
							          
							          var divrow3 = document.createElement("div");
						          	  divrow3.setAttribute('class', 'row');
						          	  divrow3.setAttribute('style', 'width:150px');	          	  
							          
							          var div = document.createElement("div");
							          div.setAttribute('class', 'col-xs-2');
							          
							          
							          var idiv = document.createElement("div");
							          //idiv.setAttribute('style', 'width:50px');
							          idiv.setAttribute('class', 'col-xs-6');
							          
							          var h3div = document.createElement("div");
							          h3div.setAttribute('class', 'col-xs-2');
							          
							          
							          var c = document.createElement("input"); //input element, checkbox
							          c.setAttribute('type',"checkbox");
							          c.setAttribute('value',username);
							          //c.setAttribute('style', 'padding:5px');
							          
							          var img = document.createElement("img");
							          img.setAttribute('src', '../img/users/' + image);
							          img.setAttribute('style', 'height:50px;width:50px');
							          img.setAttribute('class','img-responsive img-thumbnail');
							          
							          var h3 = document.createElement("h3");
							          h3.innerHTML = username;
							          h3.setAttribute('class', 'panel-title');
							         
							          
							          div.appendChild(c);
							          idiv.appendChild(img);
							          h3div.appendChild(h3);
							          
							          divrow3.appendChild(div);
							          divrow3.appendChild(idiv);
							          divrow3.appendChild(h3div);
 
							          divrow2.appendChild(divrow3);

							          hdiv.appendChild(divrow2);
							          
							          divrow.appendChild(hdiv);
							         
							          
							          });
							          f.appendChild(divrow);
  
						          });
						          searchdiv.appendChild(f);
						          //$('#search-container').
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

<script>
	$(function() {
		//Remove loginModal form even though it's hidden to prevent validation bug in HTML5:
	    //poping up 'Please fill in the field' for the hidden element with the required attribute
	    $('#loginModal').remove();

	    $('#eventdp').datetimepicker({
	    	defaultDate: moment().format('MM/DD/YYYY h:mm A')
		});
	    
		
	    $('#create-button').click(function(){
    	    var ids = ['event-topic', 'event-schedule', 'event-min-guests', 'event-max-guests', 
	            	    'event-cuisine', 'event-description', 'event-price'];
    	    var values = {};
    	    //go though the fields and add them to the values object		            	   
    	    for(var i = 0; i < ids.length; i++){
        	    console.log( $('#' + ids[i]).val() );
        	    values[ ids[i] ] = $('#' + ids[i] ).val();
    	    }

	        values['event-address'] = window['address'];
			console.log(JSON.stringify(values));

			$.ajax({
				type: 'POST',
                url: "<?php echo $this->Html->url(array('controller' => 'events', 'action' => 'create')); ?>",
				data: values,
				success: function(){
					window.location.href = "<?php echo $this->Html->url(array('controller' => 'events', 'action' => 'search')); ?>";
				}
			});
	            	        
		});
    	    
	});

	</script>
