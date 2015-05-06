<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index"><img src="lgsmall.png" hight=40 width=160></a>
        </div>
        <div id="navbar" class="navbar-collapse">
		<ul class="nav navbar-nav navbar-left">
            <li><a href="index">Game</a></li>
            <li class="active"><a href="about">About Us</a></li>
            <li><a href="faqs">FAQS</a></li>
			<li><a href="dashboard">Dashboard</a></li>
            <li><a href="portfolio_wireframe">Portfolio</a></li>
			<li>
				<form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</li>
         </ul>
		 <ul class="nav navbar-nav navbar-right">
			<li><a href = "profile_wireframe">Profile</a></li>
			<li>
				<?php if ($_SESSION['FBID']): ?>
					<a href = "logout"> Logout</a>
				<?php else: ?>
					<a href = "login">Login</a>
				<?php endif ?>
			</li>
        </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>About Us</h1>
        <p>Stock Forecast is created by a group of students from the University of Illinois.</p>
      </div>
    </div>

    <div class="container">
        <!-- Team Members Row -->
        <div class="row">
            <div class="col-lg-9">
                <h2 class="page-header">Our Team</h2>
            </div>
            <div class="col-lg-4 col-sm-6 text-center">
                <img class="img-circle img-center " src="http://graph.facebook.com/david.fey.18/picture?width=200&height=200" alt="">
                <h3>David Fey
                    <small>Backend Developer</small>
                </h3>
                <p></p>
            </div>
            <div class="col-lg-4 col-sm-6 text-center">
                <img class="img-circle img-center " src="http://graph.facebook.com/boldnc/picture?width=200&height=200" alt="">
                <h3>Nathan Cho
                    <small>Frontend Developer</small>
                </h3>
                <p></p>
            </div>
            <div class="col-lg-4 col-sm-6 text-center">
                <img class="img-circle img-center " src="http://graph.facebook.com/lawortsmann/picture?width=200&height=200" alt="">
                <h3>Luke Wortsmann
                    <small>Backend Developer</small>
                </h3>
                <p></p>
            </div>
            <div class="col-lg-4 col-sm-6 text-center">
                <img class="img-circle img-center " src="http://graph.facebook.com/thomas.varghese.92102/picture?width=200&height=200" alt="">
                <h3>Thomas Varghese
                    <small>Backend Developer</small>
                </h3>
                <p></p>
            </div>
            <div class="col-lg-4 col-sm-6 text-center">
                <img class="img-circle img-center" src="http://graph.facebook.com/alice.lee.9047506/picture?width=200&height=200" alt="">
                <h3>Alice Li
                    <small>Backend Developer</small>
                </h3>
                <p></p>
            </div>
            <div class="col-lg-4 col-sm-6 text-center">
                <img class="img-circle img-center " src="http://graph.facebook.com/nate.harroun.9/picture?width=200&height=200" alt="">
                <h3>Nate Harroun
                    <small>Backend Developer</small>
                </h3>
                <p></p>
            </div>
			<div class="col-lg-4 col-sm-6 text-center">
                <img class="img-circle img-center" src="http://graph.facebook.com/alison.wen/picture?width=200&height=200" alt="">
                <h3>Alison Wen
                    <small>Frontend Developer</small>
                </h3>
                <p></p>
            </div>
						<div class="col-lg-4 col-sm-6 text-center">
                <img class="img-circle img-center " src="http://graph.facebook.com/100005120959448/picture?width=200&height=200" alt="">
                <h3>Yu Wu
                    <small>Backend Developer</small>
                </h3>
                <p></p>
            </div>
						<div class="col-lg-4 col-sm-6 text-center">
                <img class="img-circle img-center " src="http://graph.facebook.com/adashuang/picture?width=200&height=200" alt="">
                <h3>Shuang Qu
                    <small>Backend Developer</small>
                </h3>
                <p></p>
            </div>
        </div>

      <hr>

      <footer>
        <p>&copy; Stock Forecast 2015</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
