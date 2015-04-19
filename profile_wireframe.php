<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Wireframe</title>

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
          <a class="navbar-brand" href="index.php">Stock Forecast</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
		<div id="navbar" class="navbar-collapse">
		<ul class="nav navbar-nav navbar-left">
            <li><a href="index.php">Game</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="faqs.php">FAQS</a></li>
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
          <li><a href = "signup.php">Sign Up</a></li>
          <li><a href = "login.php">Login</a></li>
        </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
	<br></br>
    <!-- NAVBAR CODE END -->


    <div class="container">
        <section style="padding-bottom: 50px; padding-top: 50px;">
            <div class="row">
                <div class="col-md-4">
                    <img src="profile_placeholder.jpg" class="img-rounded img-responsive" />
				</div>
				<div class="col-md-8">
					<div class="alert alert-success">
                        <h2>Username</h2>
                        <h4>Account Details</h4>
                        <p>Name: name</p>
						<p>Email : email.gmail.com</p>
						<p>Date joined : 4/5/2015</p>
						<p>Password: *******</p>
                    </div>
				</div>
			</div>
			<form method = "link" action = "portfolio_wireframe.php"><button type="submit" class="btn btn-default">Go to Portfolio</button> </form>
			<h3>Update User Details</h3>
            <label>Username</label>
             <input type="text" class="form-control" placeholder="Username">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Name">
            <label>Email</label>
            <input type="text" class="form-control" placeholder="email@gmail.com">
            <br></br>
            <a href="#" class="btn btn-success">Update Details</a>
            <br></br>
            <h3>Change YOur Password</h3>
            <br></br>
            <label>Enter Old Password</label>
            <input type="password" class="form-control">
            <label>Enter New Password</label>
            <input type="password" class="form-control">
            <label>Confirm New Password</label>
            <input type="password" class="form-control" />
            <br></br>
            <a href="#" class="btn btn-warning">Change Password</a>
            
            <!-- ROW END -->
        </section>
        <!-- SECTION END -->
    </div>
    <!-- CONATINER END -->

    <!-- REQUIRED SCRIPTS FILES -->
    <!-- CORE JQUERY FILE -->
	    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

</body>

</html>
