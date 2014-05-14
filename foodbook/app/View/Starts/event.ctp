<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Bootstrap</title>
<link href="./css/bootstrap.css" rel="stylesheet">
<style type='text/css'>
      body {
        background-color: #CCC;
      }
</style>
</head>

<body>
<!-- Navigation ================================================== -->	
	<div class="container">
		<div class="navbar navbar-default" role="navigation">
		        <div class="container-fluid">
		          <div class="navbar-header">
		            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		              <span class="sr-only">Toggle navigation</span>
		              <span class="icon-bar"></span>
		              <span class="icon-bar"></span>
		              <span class="icon-bar"></span>		            </button>
		            <a class="navbar-brand" href="#">Project name</a>		          </div>
		          <div class="navbar-collapse collapse">
		            <ul class="nav navbar-nav">
		              <li class="active"><a href="#">Link</a></li>
		              <li><a href="#">Link</a></li>
		              <li><a href="#">Link</a></li>
		              <li class="dropdown">
		                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
		                <ul class="dropdown-menu">
		                  <li><a href="#">Action</a></li>
		                  <li><a href="#">Another action</a></li>
		                  <li><a href="#">Something else here</a></li>
		                  <li class="divider"></li>
		                  <li class="dropdown-header">Nav header</li>
		                  <li><a href="#">Separated link</a></li>
		                  <li><a href="#">One more separated link</a></li>
		                </ul>
		              </li>
		            </ul>
		            <ul class="nav navbar-nav navbar-right">
		              <li class="active"><a href="./">Default</a></li>
		              <li><a href="../navbar-static-top/">Static top</a></li>
		              <li><a href="../navbar-fixed-top/">Fixed top</a></li>
		            </ul>
		          </div><!--/.nav-collapse -->
		        </div><!--/.container-fluid -->
      </div>
      <!-- Static navbar -->
    </div> <!-- /container -->
	
<!-- layout ================================================== -->	
	<div class="container">
		<div class="row">
			<div class="col-lg-2">
				<a href="person.html"><img src="img/1.jpg" alt="..." class="img-rounded"/></a>
				<a href="person.html"><p>Person Name</p></a>
				<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-envelope"></span><small> Contact me</small></button>
				<p>I'm in my 20's </p>
				<p>Profession Cook </p>
				<p>I Speak English & Hungarian</p>
				<img src="img/verfication.jpg" alt="..." class="img-rounded"/>
				<p><span class="glyphicon glyphicon-phone-alt"> 07656543536</p>
				<table class="table">
					<p>Some links from database</p>
					<a href="person.html"><img src="img/5.jpg" alt="..." class="img-rounded"/></a>
				</table>
				<a href="event.html">See all</a>
			</div>
			
			
			<div class="col-lg-8">
				<h3 class="page-header"><strong>Title-dish name</strong></h3>
				<a href="#follows">5 follows</a>
				</br>
				<a href="place.html">Place</a>
				<p><class="page-header"><strong>Title-dish name</strong></p>
				<form role="form">
  					<div class="form-group">
					    <label for="Meal Composition">Meal Composition:</label>
					    <textarea">Tasting Menu, Main Course & Dessert</textarea>
					 </div>
					 <div class="form-group">
    					<label for="Cuisine Type">Cuisine Type:</label>
    					<textarea">Brazilian</textarea>
  					</div>
  					<div class="form-group">
    					<label for="Meal Type">Meal Type:</label>
    					<textarea">Lunch & Dinner</textarea>
  					</div>
					<div class="form-group">
    					<label for="Alcohol Served">Alcohol Served:</label>
    					<textarea">Wine, Beer, Digestif, Sparkling Wine & No Alcohol, but also feel free to bring your own</textarea>
  					</div>
					<div class="form-group">
    					<label for="Menu">Menu:</label>
    					<textarea">
									Our menu consists in 2 different types: Lunch- the "feijoada" (classic brazilian stew, made of black beans, pork and seasonings) with 6 classic 				                    sides. Dinner- a tasting menu composed by 5 dishes, being 2 starters, 2 main courses and 1 dessert. The dishes vary during the year due to the                                    seasonality, but we try to keep a dish to every region of Brazil, being a very big country we have...
						</textarea>
  					</div>
					<a href="index.html">Read More</a>
				</form>
				
				<h4 class="page-header">GUESTS WHO WILL ATTEND THIS EVENT</h4>
				<div class="row">
					<div class="col-lg-2">
				  		<a href="#" class="thumbnail">
				    		<img src="img/p1.jpg" alt="...">
							<p>people name</p>
						</a>
  					</div>
					<div class="col-lg-2">
				  		<a href="#" class="thumbnail">
				    		<img src="img/p2.jpg" alt="...">
							<p>people name</p>
						</a>  					
					</div>
					<div class="col-lg-2">
				  		<a href="#" class="thumbnail">
				    		<img src="img/p3.jpg" alt="...">
							<p>people name</p>
						</a>
					</div>
					<div class="col-lg-2">
				  		<a href="#" class="thumbnail">
				    		<img src="img/p4.jpg" alt="...">
							<p>people name</p>
						</a>
  					</div>

				</div>
				
				
				<!-- carousel	-->
				<h4 class="page-header"><strong>PHOTOS FROM PREVIOUS MEALS</strong></h4>
				<div id="carousel" class="carousel slide" data-ride="carousel">
  				<!-- Indicators -->
  					<ol class="carousel-indicators">
    					<li data-target="#carousel" data-slide-to="0" class="active"></li>
						<li data-target="#carousel" data-slide-to="1"></li>
						<li data-target="#carousel" data-slide-to="2"></li>
					</ol>

			  	<!-- Wrapper for slides -->
			  	<div class="carousel-inner">
					<div class="item active">
				  		<img src="img/6.jpg" alt=""/>
				  		<div class="carousel-caption">
							<p>information</p>
				  		</div>
					</div>
					<div class="item">
				  		<img src="img/7.jpg" alt=""/>
				  		<div class="carousel-caption">
							<p>information</p>
				  		</div>
					</div>
					<div class="item">
				  		<img src="img/8.jpg" alt=""/>
				  		<div class="carousel-caption">
							<p>information</p>
				  		</div>
					</div>
					<div class="item">
				  		<img src="img/9.jpg" alt=""/>
				  		<div class="carousel-caption">
							<p>information</p>
				  		</div>
					</div>
			  	</div>

				<!-- Controls -->
				<a class="left carousel-control" href="#carousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>
				<a class="right carousel-control" href="#carousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a>
				</div>
				
				<div class="row">
					<div class="col-lg-6">
						<h5 class="page-header">OFFERING DETAILS</h5>
						<form role="form">
  							<div class="form-group">
					    		<label for="Host Style">Host Style:</label>
					    		<textarea">I host with a friend & When I host I sit with the guests upon their request</textarea>
							</div>
							<div class="form-group">
					    		<label for="Minimum guests">Minimum guests:</label>
					    		<textarea">2</textarea>
							</div>
							<div class="form-group">
					    		<label for="Maximum guests">Maximum guests:</label>
					    		<textarea">6</textarea>
							</div>
							<div class="form-group">
					    		<label for="Event Duration">Event Duration:</label>
					    		<textarea">2 hours</textarea>
							</div>	
					</div>
					<div class="col-lg-6">
						<h5 class="page-header">LOCATION AMENITIES</h5>
						<p>Add google map here</p>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<h4 class="page-header">GUESTS WHO ALREADY ATE WITH THIS HOST</h4>
						<a href="#" class="thumbnail">
				    		<img src="img/p1.jpg" alt="..." align="top">
							<p>people name</p>
					  </a>
					</div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<h4 class="page-header">COMMENTS</h4>
						<P>This part is used for comment</P>
					</div>
				</div>
			
			
			</div>
			
			
			<div class="col-lg-2">
				<h3 class="page-header"<strong>Suggest Date</strong></h3>
				<p>Request your host for a date and you will receive a confirmation within 24 hours if it's available.</p>
				<p><strong>€33per guest</strong></p>
				<button type="button" class="btn btn-info"><small>Book Now</small></button>
			</div>
		</div>
	</div>
	
</body>

<!-- Bootstrap core JavaScript================================================== -->
<script language="JavaScript" type="text/javascript" src="./js/jquery-2.1.1.js"></script>
<script language="JavaScript" type="text/javascript" src="./js/bootstrap.js"></script>
</html>
