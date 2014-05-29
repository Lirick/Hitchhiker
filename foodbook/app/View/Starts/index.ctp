<div class="search-logo-homepage">
    <h1>Find your food in foodbook!</h1>

    <h3><em>Meet amazing people, eat great food and enjoy unforgettable experiences!</em></h3>

    <div class="row" style="margin-top: 40px;">
        <div class="col-xs-9">
            <div class="input-group">
                <span class="input-group-btn">
                    <button class="btn btn-primary btn-lg" type="button">Find your meal @</button>
                </span>
                <input type="text" class="form-control input-lg" placeholder="Uppsala, Sweden">
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
</div>

<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top: -20px;">
    <div class="carousel-inner">
        <div class="item active">
            <?php echo $this->Html->image('food1.jpg', array('alt' => 'First slide', 'style' => 'margin-right: auto; margin-left: auto;')); ?>
        </div>
        <div class="item">
            <?php echo $this->Html->image('food3.jpg', array('alt' => 'Second slide', 'style' => 'margin-right: auto; margin-left: auto;')); ?>
        </div>
        <div class="item">
            <?php echo $this->Html->image('food2.jpg', array('alt' => 'Third slide', 'style' => 'margin-right: auto; margin-left: auto;')); ?>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span
            class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next"><span
            class="glyphicon glyphicon-chevron-right"></span></a>
</div><!-- /.carousel -->

<!-- Users and Events Area-->
<div class="container" style="margin-top: 30px;">
    <!-- Users -->
    <div class="row">
        <div class="col-xs-3">
            <?php foreach ($users as $u) { ?>
                <div class="row" style="#margin-bottom: 20px;">
                    <div class="col-xs-4" style="height:97px;padding: 0;">
                        <?php echo $this->Html->image("users/" . $u['User']['picture'], array('class' => 'img-responsive img-thumbnail', 'alt' => 'Profile Picture')); ?>
                    </div>
                    <div class="col-xs-8">
                        <div class="row">
                            <div class="col-xs-2"><p><span class="glyphicon glyphicon-cutlery"></span></p></div>
                            <div class="col-xs-10">
                                <p>
                                    <strong><?php echo $this->Html->link($u['User']['username'], array(
                                                'controller' => 'users',
                                                'action' => 'view',
                                                $u['User']['id'])
                                        ); ?>
                                    </strong>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-2"><p><span class="glyphicon glyphicon-home"></span></p></div>
                            <div class="col-xs-10">
                                <p>
                                    <small><em>From Sweden</em></small>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-1"></div>
                            <div class="col-xs-9" style="border-top: 1px solid #e2e2e2"></div>
                            <div class="col-xs-2"></div>
                        </div>
                        <div class="row">
                            <div class="col-xs-2"><h4><span class="glyphicon glyphicon-star"></span></h4></div>
                            <div class="col-xs-10"><h4>Rating: 9.1</h4></div>
                        </div>
                    </div>
                </div>
                <hr>
            <?php } ?>
        </div>
        <!-- /Users -->

        <!-- Events -->
        <div class="col-xs-9" style="border-left: 1px solid #e2e2e2;height: 900px;">
            <?php   $i = 1;
            foreach ($events as $e) {
                if (fmod($i, 3) == 1 && $i == 1) {
                    echo '<div class="row">';
                } elseif (fmod($i, 3) == 1) {
                    echo '<div class="row" style="margin-top:20px;">';
                }

                ?>
                <div class="col-xs-4">
                    <div style="position: relative;">
                        <div class="event-namebar">
                            <h5>
                                <?php echo $this->Html->link($e['Event']['ename'], array(
                                        'controller' => 'events',
                                        'action' => 'view',
                                        $e['Event']['id'])
                                ); ?>
                            </h5>
                        </div>
                        <?php echo $this->Html->image(
                            'eventdefault.png',
                            array(
                                "alt" => "dinner picture",
                                "class" => "img-responsive",
                                "url" => array(
                                    'controller' => 'events',
                                    'action' => 'view',
                                    $e['Event']['id'])
                            )
                        ); ?>
                    </div>
                    <div>
                        <h4>
                            <small><?php echo $e['Event']['date'] ?></small>
                        </h4>
                    </div>
                    <div class="col-xs-12" style="border-top: 1px solid #e2e2e2;padding-bottom: 5px;"></div>
                    <div class="row">
                        <div class="col-xs-2" style="padding-right: 0;">
                            <?php echo $this->Html->image("users/" . $e['EventHost']['picture'], array("alt" => "user avatar", "class" => "img-responsive")); ?>
                        </div>
                        <div class="col-xs-10">
                            <p>
                                <strong>By</strong>
                                <?php echo $this->Html->link($e['EventHost']['username'], array(
                                        'controller' => 'users',
                                        'action' => 'view',
                                        $e['Event']['user_id'])
                                ); ?><br>

                                <em><?php echo $e['Event']['address']; ?></em>
                            </p>
                        </div>
                    </div>
                </div>
                <?php if (fmod($i, 3) == 0) {
                    echo '</div>';
                }
                $i = $i + 1;
            }
            ?>
            <!-- /Events -->
        </div>

    </div>
    <!-- / Users and Events Area-->