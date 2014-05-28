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

        echo $this->Form->input(
            'ename',
            array('div' => false,
                'label' => 'Event Topic',
                'class' => 'form-control',
                'placeholder' => "What's topic of your event?"));

        ?>

        <div class="row" style="margin-top: 15px;">
            <div class="col-xs-6">
                <?php

                echo $this->Form->input(
                    'address',
                    array('label' => 'Address of your event',
                        'div' => 'form-group',
                        'class' => 'form-control',
                        'placeholder' => "Address"));
                //echo $this->Form->input('date');

                echo $this->Form->input(
                    'date',
                    array('label' => 'Schedule of your event',
                        'div' => 'form-group',
                        'type' => 'text',
                        'class' => 'form-control',
                        'between' => "<div class='input-group date' id='eventdp'>",
                        'after' => "<span class='input-group-addon'><span class='glyphicon glyphicon-calendar'></span></span></div>"));




                ?>
            </div>
            <div class="col-xs-6">
                <?php


                echo '<label>Guest number</label>';

                ?>
                <div class="row">
                    <div class="col-xs-1" style="padding: 0; margin-left: 15px;"><p style="line-height:34px;">From</p>
                    </div>
                    <div class="col-xs-3">
                        <?php
                        echo $this->Form->input(
                            'min_guests',
                            array('label' => false,
                                'div' => false,
                                'class' => 'form-control',
                                'placeholder' => '0',
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
                                'placeholder' => '0',
                                'type' => 'number'
                            ));
                        ?>
                    </div>
                </div>
                <div style="margin-top: 5px;">
                    <label>Cuisine</label>
                <?php
                echo $this->Form->select(
                    'cuisine', $cs,
                    array('label' => 'Cusine',
                        'class' => 'form-control',
                        'value' => 'None'
                    ));
                ?>
                </div>
            </div>
        </div>
        <div>
            <?php
            echo $this->Form->input(
                'text',
                array(
                    'label' => 'Even description',
                    'class' => 'form-control'
                )
            );
            ?>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-4">

                <?php
                echo $this->Form->input(
                    'price_per_guest',
                    array('label' => 'Price per person',
                        'div' => 'form-group',
                        'class' => 'form-control',
                        'between' => "<div class='input-group input-group-lg'>",
                        'after' => '<span class="input-group-addon">SEK</span></div>',
                        'type' => 'number'
                    ));


                ?>
            </div>
        </div>
        <hr>
        <div>
        <?php echo $this->Form->end(array(
            'label' => 'Create my event',
            'class' => 'btn btn-primary btn-lg btn-block'));
        ?>
        </div>
    </div>
</div>