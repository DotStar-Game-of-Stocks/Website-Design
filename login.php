<?php
session_start(); 
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>Login with Facebook</title>
<link href="http://www.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet"> 
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
          <a class="navbar-brand" href="index">Stock Forecast</a>
        </div>
        <div id="navbar" class="navbar-collapse">
		<ul class="nav navbar-nav navbar-left">
            <li><a href="index">Game</a></li>
            <li><a href="about">About Us</a></li>
            <li><a href="faqs">FAQS</a></li>
			<li><a href="dashboard">Dashboard</a></li>
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
			<li><a href = "signup">Sign Up</a></li>
			<li class="active"><a href = "login">Login</a></li>
        </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
	<br></br>
	<br></br>
	<br></br>
	<br></br>
	<div class="container">
  <?php if ($_SESSION['FBID']): ?>      <!--  After user login  -->
<div class="container">
<h2>Hello <?php echo $_SESSION['USERNAME']; ?></h2>
<div class="span4">
 <ul class="nav nav-list">
<li class="nav-header">Image</li>
	<li><img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture"></li>
<li class="nav-header">Facebook ID</li>
<li><?php echo  $_SESSION['FBID']; ?></li>
<li class="nav-header">Facebook fullname</li>
<li><?php echo $_SESSION['FULLNAME']; ?></li>
<li class="nav-header">Facebook Email</li>
<li><?php echo $_SESSION['EMAIL']; ?></li>
<div><a href="logout.php">Logout</a></div>
</ul></div></div>
    <?php else: ?>     <!-- Before login --> 
<div class="container">
<h1>Login with Facebook</h1>
           Not Connected
<div>
      <a href="fbconfig.php">Login with Facebook</a></div>	 
      </div>
    <?php endif ?>
	</div>
  </body>
</html>
