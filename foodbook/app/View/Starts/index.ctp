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
<div class="row" style="#margin-bottom: 20px;">
    <!-- Weather -->
    <script type="text/javascript">
        $(document).ready(function () {
        $('#test').weatherfeed(['SWXX0040']);
        });
    </script>
    <div class="row">
        <div id="test" class="col-xs-12" style=""></div>
    </div> 
    <!-- End Weather -->
    <div class="col-xs-4" style="height:97px;padding: 0;">
        <?php echo $this->Html->image('user1.png', array("alt" => "user avatar", "class" => "img-thumbnail img-responsive")); ?>
    </div>
    <div class="col-xs-8">
        <div class="row">
            <div class="col-xs-2"><p><span class="glyphicon glyphicon-cutlery"></span></p></div>
            <div class="col-xs-10"><p><strong>Aida M. Nordstr枚m</strong></p></div>
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
<div class="row">
    <div class="col-xs-4" style="height:97px;padding: 0;">
        <?php echo $this->Html->image('user2.png', array("alt" => "user avatar", "class" => "img-thumbnail img-responsive")); ?>
    </div>
    <div class="col-xs-8">
        <div class="row">
            <div class="col-xs-2"><p><span class="glyphicon glyphicon-cutlery"></span></p></div>
            <div class="col-xs-10"><p><strong>Elena A. Lindholm</strong></p></div>
        </div>
        <div class="row">
            <div class="col-xs-2"><p><span class="glyphicon glyphicon-home"></span></p></div>
            <div class="col-xs-10">
                <p>
                    <small>From Sweden</small>
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
<div class="row">
    <div class="col-xs-4" style="height:97px;padding: 0;">
        <?php echo $this->Html->image('user3.png', array("alt" => "user avatar", "class" => "img-thumbnail img-responsive")); ?>
    </div>
    <div class="col-xs-8">
        <div class="row">
            <div class="col-xs-2"><p><span class="glyphicon glyphicon-cutlery"></span></p></div>
            <div class="col-xs-10"><p><strong>Leonida Palermo</strong></p></div>
        </div>
        <div class="row">
            <div class="col-xs-2"><p><span class="glyphicon glyphicon-home"></span></p></div>
            <div class="col-xs-10">
                <p>
                    <small>From Italy</small>
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
            <div class="col-xs-10"><h4>Rating: 9.0</h4></div>
        </div>
    </div>
</div>

<hr>
<div class="row">
    <div class="col-xs-4" style="height:97px;padding: 0;">
        <?php echo $this->Html->image('user4.png', array("alt" => "user avatar", "class" => "img-thumbnail img-responsive")); ?>
    </div>
    <div class="col-xs-8">
        <div class="row">
            <div class="col-xs-2"><p><span class="glyphicon glyphicon-cutlery"></span></p></div>
            <div class="col-xs-10"><p><strong>Aida M. Nordstr枚m</strong></p></div>
        </div>
        <div class="row">
            <div class="col-xs-2"><p><span class="glyphicon glyphicon-home"></span></p></div>
            <div class="col-xs-10">
                <p>
                    <small>From Sweden</small>
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
            <div class="col-xs-10"><h4>Rating: 8.9</h4></div>
        </div>
    </div>
</div>

<hr>
<div class="row">
    <div class="col-xs-4" style="height:97px;padding: 0;">
        <?php echo $this->Html->image('user5.png', array("alt" => "user avatar", "class" => "img-thumbnail img-responsive")); ?>
    </div>
    <div class="col-xs-8">
        <div class="row">
            <div class="col-xs-2"><p><span class="glyphicon glyphicon-cutlery"></span></p></div>
            <div class="col-xs-10"><p><strong>Aida M. Nordstr枚m</strong></p></div>
        </div>
        <div class="row">
            <div class="col-xs-2"><p><span class="glyphicon glyphicon-home"></span></p></div>
            <div class="col-xs-10">
                <p>
                    <small>From Sweden</small>
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
            <div class="col-xs-10"><h4>Rating: 8.7</h4></div>
        </div>
    </div>
</div>

<hr>
<div class="row">
    <div class="col-xs-4" style="height:97px;padding: 0;">
        <?php echo $this->Html->image('user6.png', array("alt" => "user avatar", "class" => "img-thumbnail img-responsive")); ?>
    </div>
    <div class="col-xs-8">
        <div class="row">
            <div class="col-xs-2"><p><span class="glyphicon glyphicon-cutlery"></span></p></div>
            <div class="col-xs-10"><p><strong>Aida M. Nordstr枚m</strong></p></div>
        </div>
        <div class="row">
            <div class="col-xs-2"><p><span class="glyphicon glyphicon-home"></span></p></div>
            <div class="col-xs-10">
                <p>
                    <small>From Sweden</small>
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
            <div class="col-xs-10"><h4>Rating: 8.6</h4></div>
        </div>
    </div>
</div>

<hr>
<div class="row">
    <div class="col-xs-4" style="height:97px;padding: 0;">
        <?php echo $this->Html->image('user7.png', array("alt" => "user avatar", "class" => "img-thumbnail img-responsive")); ?>
    </div>
    <div class="col-xs-8">
        <div class="row">
            <div class="col-xs-2"><p><span class="glyphicon glyphicon-cutlery"></span></p></div>
            <div class="col-xs-10"><p><strong>Aida M. Nordstr枚m</strong></p></div>
        </div>
        <div class="row">
            <div class="col-xs-2"><p><span class="glyphicon glyphicon-home"></span></p></div>
            <div class="col-xs-10">
                <p>
                    <small>From Sweden</small>
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
            <div class="col-xs-10"><h4>Rating: 8.3</h4></div>
        </div>
    </div>
</div>

<hr>
<div class="row">
    <div class="col-xs-4" style="height:97px;padding: 0;">
        <?php echo $this->Html->image('user8.png', array("alt" => "user avatar", "class" => "img-thumbnail img-responsive")); ?>
    </div>
    <div class="col-xs-8">
        <div class="row">
            <div class="col-xs-2"><p><span class="glyphicon glyphicon-cutlery"></span></p></div>
            <div class="col-xs-10"><p><strong>Aida M. Nordstr枚m</strong></p></div>
        </div>
        <div class="row">
            <div class="col-xs-2"><p><span class="glyphicon glyphicon-home"></span></p></div>
            <div class="col-xs-10">
                <p>
                    <small>From Sweden</small>
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
            <div class="col-xs-10"><h4>Rating: 8.3</h4></div>
        </div>
    </div>
</div>
</div>
<!-- /Users -->

<!-- Events -->
<div class="col-xs-9" style="border-left: 1px solid #e2e2e2;height: 900px;">
<div class="row">
    <div class="col-xs-4">
        <div style="position: relative;">
            <div class="event-namebar"><h5>Hello Event</h5></div>
            <?php echo $this->Html->image('dinner1.png', array("alt" => "dinner picture", "class" => "img-responsive")); ?>
        </div>
        <div>
            <h4>
                <small>17 May 2014 | 8:00 PM</small>
            </h4>
        </div>
        <div class="col-xs-12" style="border-top: 1px solid #e2e2e2;padding-bottom: 5px;"></div>
        <div class="row">
            <div class="col-xs-2" style="padding-right: 0;">
                <?php echo $this->Html->image('user1.png', array("alt" => "user avatar", "class" => "img-responsive")); ?>
            </div>
            <div class="col-xs-10">
                <p>
                    <strong>By</strong><a href="#"> Aida M. Nordstr枚m</a><br>
                    <em>Uppsala, Sweden</em>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div style="position: relative;">
            <div class="event-namebar"><h5>Traditional home-made italian food</h5></div>
            <?php echo $this->Html->image('dinner2.png', array("alt" => "dinner picture", "class" => "img-responsive")); ?>
        </div>
        <div>
            <h4>
                <small>22 May 2014 | 7:00 PM</small>
            </h4>
        </div>
        <div class="col-xs-12" style="border-top: 1px solid #e2e2e2;padding-bottom: 5px;"></div>
        <div class="row">
            <div class="col-xs-2" style="padding-right: 0;">
                <?php echo $this->Html->image('user3.png', array("alt" => "user avatar", "class" => "img-responsive")); ?>
            </div>
            <div class="col-xs-10">
                <p>
                    <strong>By</strong><a href="#"> Leonida Palermo</a><br>
                    <em>Roma, Italy</em>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div style="position: relative;">
            <div class="event-namebar"><h5>Svenska mat!</h5></div>
            <?php echo $this->Html->image('dinner3.png', array("alt" => "dinner picture", "class" => "img-responsive")); ?>
        </div>
        <div>
            <h4>
                <small>18 May 2014 | 9:00 PM</small>
            </h4>
        </div>
        <div class="col-xs-12" style="border-top: 1px solid #e2e2e2;padding-bottom: 5px;"></div>
        <div class="row">
            <div class="col-xs-2" style="padding-right: 0;">
                <?php echo $this->Html->image('user2.png', array("alt" => "user avatar", "class" => "img-responsive")); ?>
            </div>
            <div class="col-xs-10">
                <p>
                    <strong>By</strong><a href="#"> Elena A. Lindholm</a><br>
                    <em>Stockholm, Sweden</em>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 30px;">
    <div class="col-xs-4">
        <div style="position: relative;">
            <div class="event-namebar"><h5>Hello Event</h5></div>
            <?php echo $this->Html->image('dinner4.png', array("alt" => "dinner picture", "class" => "img-responsive")); ?>
        </div>
        <div>
            <h4>
                <small>17 May 2014 | 8:00 PM</small>
            </h4>
        </div>
        <div class="col-xs-12" style="border-top: 1px solid #e2e2e2;padding-bottom: 5px;"></div>
        <div class="row">
            <div class="col-xs-2" style="padding-right: 0;">
                <?php echo $this->Html->image('user1.png', array("alt" => "user avatar", "class" => "img-responsive")); ?>
            </div>
            <div class="col-xs-10">
                <p>
                    <strong>By</strong><a href="#"> Aida M. Nordstr枚m</a><br>
                    <em>Uppsala, Sweden</em>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div style="position: relative;">
            <div class="event-namebar"><h5>Traditional home-made italian food</h5></div>
            <?php echo $this->Html->image('dinner5.png', array("alt" => "dinner picture", "class" => "img-responsive")); ?>
        </div>
        <div>
            <h4>
                <small>22 May 2014 | 7:00 PM</small>
            </h4>
        </div>
        <div class="col-xs-12" style="border-top: 1px solid #e2e2e2;padding-bottom: 5px;"></div>
        <div class="row">
            <div class="col-xs-2" style="padding-right: 0;">
                <?php echo $this->Html->image('user5.png', array("alt" => "user avatar", "class" => "img-responsive")); ?>
            </div>
            <div class="col-xs-10">
                <p>
                    <strong>By</strong><a href="#"> Leonida Palermo</a><br>
                    <em>Roma, Italy</em>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div style="position: relative;">
            <div class="event-namebar"><h5>Svenska mat!</h5></div>
            <?php echo $this->Html->image('dinner6.png', array("alt" => "dinner picture", "class" => "img-responsive")); ?>
        </div>
        <div>
            <h4>
                <small>18 May 2014 | 9:00 PM</small>
            </h4>
        </div>
        <div class="col-xs-12" style="border-top: 1px solid #e2e2e2;padding-bottom: 5px;"></div>
        <div class="row">
            <div class="col-xs-2" style="padding-right: 0;">
                <?php echo $this->Html->image('user2.png', array("alt" => "user avatar", "class" => "img-responsive")); ?>
            </div>
            <div class="col-xs-10">
                <p>
                    <strong>By</strong><a href="#"> Elena A. Lindholm</a><br>
                    <em>Stockholm, Sweden</em>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 30px;">
    <div class="col-xs-4">
        <div style="position: relative;">
            <div class="event-namebar"><h5>Hello Event</h5></div>
            <?php echo $this->Html->image('dinner7.png', array("alt" => "dinner picture", "class" => "img-responsive")); ?>
        </div>
        <div>
            <h4>
                <small>17 May 2014 | 8:00 PM</small>
            </h4>
        </div>
        <div class="col-xs-12" style="border-top: 1px solid #e2e2e2;padding-bottom: 5px;"></div>
        <div class="row">
            <div class="col-xs-2" style="padding-right: 0;">
                <?php echo $this->Html->image('user1.png', array("alt" => "user avatar", "class" => "img-responsive")); ?>
            </div>
            <div class="col-xs-10">
                <p>
                    <strong>By</strong><a href="#"> Aida M. Nordstr枚m</a><br>
                    <em>Uppsala, Sweden</em>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div style="position: relative;">
            <div class="event-namebar"><h5>Traditional home-made italian food</h5></div>
            <?php echo $this->Html->image('dinner8.png', array("alt" => "dinner picture", "class" => "img-responsive")); ?>
        </div>
        <div>
            <h4>
                <small>22 May 2014 | 7:00 PM</small>
            </h4>
        </div>
        <div class="col-xs-12" style="border-top: 1px solid #e2e2e2;padding-bottom: 5px;"></div>
        <div class="row">
            <div class="col-xs-2" style="padding-right: 0;">
                <?php echo $this->Html->image('user3.png', array("alt" => "user avatar", "class" => "img-responsive")); ?>
            </div>
            <div class="col-xs-10">
                <p>
                    <strong>By</strong><a href="#"> Leonida Palermo</a><br>
                    <em>Roma, Italy</em>
                </p>
            </div>
        </div>
    </div>
    <div class="col-xs-4">
        <div style="position: relative;">
            <div class="event-namebar"><h5>Svenska mat!</h5></div>
            <?php echo $this->Html->image('dinner9.png', array("alt" => "dinner picture", "class" => "img-responsive")); ?>
        </div>
        <div>
            <h4>
                <small>18 May 2014 | 9:00 PM</small>
            </h4>
        </div>
        <div class="col-xs-12" style="border-top: 1px solid #e2e2e2;padding-bottom: 5px;"></div>
        <div class="row">
            <div class="col-xs-2" style="padding-right: 0;">
                <?php echo $this->Html->image('user2.png', array("alt" => "user avatar", "class" => "img-responsive")); ?>
            </div>
            <div class="col-xs-10">
                <p>
                    <strong>By</strong><a href="#"> Elena A. Lindholm</a><br>
                    <em>Stockholm, Sweden</em>
                </p>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /Events -->
</div>

</div>
<!-- / Users and Events Area-->
