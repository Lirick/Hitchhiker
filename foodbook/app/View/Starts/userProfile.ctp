<div class="container">
<div class="row">
<div class="col-xs-2" style="height:97px;padding: 0;">
    <ul class="nav nav-pills nav-stacked" >
        <li class=""><a href="#home" data-toggle="tab"><img src="img/p1.jpg" alt="..."></a> Name</li>
        <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
        <li class=""><a href="#profile" data-toggle="tab">Profile</a></li>
        <li class=""><a href="#edit" data-toggle="tab">Edit</a></li>
        <li class=""><a href="#events" data-toggle="tab">Events</a></li>
        <li class=""><a href="#rating" data-toggle="tab">Rating</a></li>
        <li class=""><a href="#comment" data-toggle="tab">Comment</a></li>
        <li class=""><a href="#contact" data-toggle="tab">Contact</a></li>
    </ul>
</div>
<div class="col-xs-10" style="height:97px;padding: 0;">
<div class="tab-content">
<!--Home-->
<div class="tab-pane active" id="home">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 align="center" class="panel-title">INFORMATION</h3>
        </div>
        <div class="panel-body">
            <p class="text-primary">
            <h3>Name</h3>
            </p>
            <p class="text-primary">someone</p>
            <p class="text-primary">
            <h3>Email</h3>
            </p>
            <p class="text-primary">someone</p>
            <p class="text-primary">
            <h3>Phone</h3>
            </p>
            <p class="text-primary">someone</p>
        </div>
    </div>
</div>
<!--End home-->
<!--Profile-->
<div class="tab-pane" id="profile">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 align="center" class="panel-title">PROFILE</h3>
        </div>
        <div class="panel-body">
            <p class="text-primary">
            <h3>Name</h3>
            </p>
            <p class="text-primary">someone</p>
            <p class="text-primary">
            <h3>Email</h3>
            </p>
            <p class="text-primary">someone</p>
            <p class="text-primary">
            <h3>Phone</h3>
            </p>
            <p class="text-primary">someone</p>
        </div>
    </div>
</div>
<!--End profile-->
<!--Edit-->
<div class="tab-pane" id="edit">
    <form class="form-horizontal">
        <fieldset>
            <legend>Edit</legend>
            <div class="form-group">
                <label for="inputEmail" class="col-xs-2 control-label">Name</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-xs-2 control-label">Password</label>
                <div class="col-lg-10">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Alexander">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-xs-2 control-label">Email</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputEmail" placeholder="abelldandy@homtial.com">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPhone" class="col-xs-2 control-label">Phone</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputPhone" placeholder="12345678">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">Photo</label>
                <div class="col-lg-10"> <img src="img/p1.jpg" alt="..."></a>
                    <div class="input-append">
                        <input id="photoCover" class="input-large" type="text" style="height:30px;">
                        <a class="btn" onclick="$('input[id=lefile]').click();">Upload</a> </div>
                    <script type="text/javascript">
                        $('input[id=lefile]').change(function() {
                            $('#photoCover').val($(this).val());
                        });
                    </script>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <button class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>
<!--End edit-->
<!--Events-->
<div class="tab-pane" id="events">
    </section>
    <img src="img/3.jpg" alt="...">
    <div class="caption">
        <h3>Food Names</h3>
        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
        <p> <a href="#" class="btn btn-primary" role="button">VIEW</a> </p>
    </div>
    </section>
    </section>
    <img src="img/7.jpg" alt="...">
    <div class="caption">
        <h3>Food Names</h3>
        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
        <p> <a href="#" class="btn btn-primary" role="button">VIEW</a> </p>
    </div>
    </section>
    </section>
    <img src="img/9.jpg" alt="...">
    <div class="caption">
        <h3>Food Names</h3>
        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
        <p> <a href="#" class="btn btn-primary" role="button">VIEW</a> </p>
    </div>
    </section>
</div>
<!--End Events-->
<!--Rating-->
<div class="tab-pane" id="rating">
    <table class="table table-striped table-hover ">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mark</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>lucy</td>
            <td>lucy@gmail.com</td>
            <td>3 <span class="glyphicon glyphicon-star-empty"></span></td>
        </tr>
        <tr>
            <td>2</td>
            <td>David</td>
            <td>david@gmail.com</td>
            <td>4 <span class="glyphicon glyphicon-star-empty"></span></td>
        </tr>
        <tr class="info">
            <td>3</td>
            <td>Nancy</td>
            <td>nacy@gmail.com</td>
            <td>5 <span class="glyphicon glyphicon-star-empty"></span></td>
        </tr>
        <tr class="success">
            <td>4</td>
            <td>Lan</td>
            <td>lan@hotmail.com</td>
            <td>3 <span class="glyphicon glyphicon-star-empty"></span></td>
        </tr>
        </tbody>
    </table>
    <h2>Rating</h2>
    <div class="progress">
        <div class="progress-bar progress-bar-danger" style="width: 40%">3.5 <span class="glyphicon glyphicon-star-empty"></span></div>
    </div>
</div>
<!--End Rating-->

<!--Conments-->
<div class="tab-pane" id="comment">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"> <a data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> People's Name </a> </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"> <a data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> People's Name </a> </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse in">
                <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"> <a data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> People's Name </a> </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse in">
                <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
            </div>
        </div>
    </div>
</div>
<!--End Conments-->
<!--Contact-->
<div class="tab-pane" id="contact">
    <div id="right_container" class="col col-xs-9 col-xs-12">
        <div class="row">
            <div class="col col-xs-12">
                <h3>Contact <a href="#"  class="right_container_title"  target="_blank"> Us</a></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <p>You may leave us a message for any kind of business matter or personal greeting. Nam nec tellus a odio tincidunt auctor a ornare odio. Validate. </p>
            </div>
        </div>
        <form role="form" action="#" method="post">
            <div class="row">
                <div class="col-xs-5">
                    <div class="form-group left-inner-addon"> <span class="glyphicon glyphicon-user"></span>
                        <input name="fullname" type="text" class="form-control" id="input_name" placeholder="Name">
                    </div>
                    <div class="form-group left-inner-addon"> <span class="glyphicon glyphicon-envelope"></span>
                        <input name="email" type="email" class="form-control" id="input_email" placeholder="Email">
                    </div>
                    <div class="form-group left-inner-addon"> <span class="glyphicon glyphicon-earphone"></span>
                        <input name="phone" type="tel" class="form-control" id="input_tel" placeholder="Phone">
                    </div>
                </div>
                <div class="col-xs-7">
                    <div class="form-group left-inner-addon"> <span class="glyphicon glyphicon-comment"></span>
                        <textarea name="message" rows="6" class="form-control" id="input_message" placeholder="Message..."></textarea>
                        <br>
                        <button type="submit" class="btn btn-primary">Send</button>
                        <button type="reset" class="btn btn-default float_r">Reset</button>
                    </div>
                </div>
            </div>
            <!-- row -->
        </form>
        <div class="row">
            <div class="col col-xs-12">
                <h3>Our Location</h3>
            </div>
        </div>
        <div class="row">
            <section class="col-xs-12">
                <iframe height="320" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Central+Park,+New+York,+NY,+USA&amp;aq=0&amp;sll=14.093957,1.318359&amp;sspn=69.699334,135.263672&amp;vpsrc=6&amp;ie=UTF8&amp;hq=Central+Park,+New+York,+NY,+USA&amp;ll=40.778265,-73.96988&amp;spn=0.033797,0.06403&amp;t=m&amp;output=embed"> </iframe>
            </section>
        </div>
    </div>
</div>
<!--End Contact-->
</div>
<!--End tab-content-->
</div>
<!--End col-xs-10-->
</div>
</div>
</div>

