<div class="container">
    <h3><?php echo count($events) . " events have been found:" ?></h3>
    <hr>
    <div class="row">
        <div class="col-xs-3"></div>
        <div class="col-xs-9" style="border-left: 1px solid #e2e2e2;">
            <div class="row">
                <div class="col-xs-2">
                    <?php echo $this->Paginator->counter(); ?>
                </div>
                <div class="col-xs-3 col-xs-offset-7">
                    <?php

                    // Shows the next and previous links
                    echo $this->Paginator->prev(
                        '« Previous',
                        null,
                        null,
                        array('class' => 'disabled')
                    );

                    echo '&nbsp;';
                    // Shows the page numbers
                    echo $this->Paginator->numbers(array('modulus' => 3));

                    echo '&nbsp;';
                    echo $this->Paginator->next(
                        'Next »',
                        null,
                        null,
                        array('class' => 'disabled')
                    );
                    ?>
                </div>
            </div>
            <hr>
            <?php foreach ($events as $event): ?>
                <div class="row">
                    <div class="col-xs-3">
                        <?php
                        echo $this->Html->image(
                            'eventdefault.png',
                            array(
                                "alt" => "dinner picture",
                                "class" => "img-responsive",
                                "url" =>  array(
                                    'controller' => 'events',
                                    'action' => 'view',
                                    $event['Event']['id']
                                )
                            )
                        );
                        ?>
                    </div>
                    <div class="col-xs-5">
                        <div class="row" style="border-bottom: 1px solid #e2e2e2;">
                            <h4>
                                <?php echo $this->Html->link($event['Event']['ename'], array(
                                        'controller' => 'events',
                                        'action' => 'view',
                                        $event['Event']['id'])
                                ); ?>
                            </h4>
                        </div>
                        <div class="row" style="margin-top: 15px;">
                            <div class="col-xs-3">
                                <?php
                                echo $this->Html->image(
                                    "users/" . $event['EventHost']['picture'],
                                    array(
                                        "alt" => "user avatar",
                                        "class" => "img-responsive img-thumbnail")
                                ); ?>
                            </div>
                            <div class="col-xs-9">
                                Host By <br>
                                <?php echo $this->Html->link($event['EventHost']['username'], array(
                                        'controller' => 'users',
                                        'action' => 'view',
                                        $event['Event']['user_id'])
                                ); ?>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 15px;">
                            <div class="col-xs-12">
                                <p>
                                    <span class="glyphicon glyphicon-home"></span>
                                    <?php echo $event['Event']['address'] ?>
                                </p>

                                <p>
                                    <span class="glyphicon glyphicon-time"></span>
                                    <?php echo $event['Event']['date'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <h3 class="panel-title">Price</h3>
                            </div>
                            <div class="panel-body">
                                <h3><?php echo h($event['Event']['price_per_guest']) ?>
                                    <small>SEK / guest</small>
                                </h3>
                            </div>
                        </div>
                        <?php
                        if (AuthComponent::user('id') != $event['Event']['user_id']) {
                            echo $this->Form->postLink(
                                'Join!',
                                array(
                                    'controller' => 'events',
                                    'action' => 'request',
                                    $event['Event']['id']
                                ),
                                array(
                                    'class' => 'btn btn-primary btn-block'
                                )
                            );
                        }
                        ?>
                    </div>
                </div>
                <hr>
            <?php endforeach; ?>
            <div class="row">
                <div class="col-xs-2">
                    <?php echo $this->Paginator->counter(); ?>
                </div>
                <div class="col-xs-3 col-xs-offset-7">
                    <?php

                    // Shows the next and previous links
                    echo $this->Paginator->prev(
                        '« Previous',
                        null,
                        null,
                        array('class' => 'disabled')
                    );

                    echo '&nbsp;';
                    // Shows the page numbers
                    echo $this->Paginator->numbers(array('modulus' => 3));

                    echo '&nbsp;';
                    echo $this->Paginator->next(
                        'Next »',
                        null,
                        null,
                        array('class' => 'disabled')
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>