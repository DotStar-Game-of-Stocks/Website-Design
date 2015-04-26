<?php
	if(isset($_POST['submit']))
	{
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'stockforcast';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
	{
	die('Could not connect: ' . mysql_error());
	}

	if(! get_magic_quotes_gpc() )
	{
		$name = addslashes ($_POST['name']);
		$username = addslashes ($_POST['username']);
		$password = addslashes ($_POST['password']);
		$email = addslashes ($_POST['email']);
}
	else
	{
		$name = addslashes ($_POST['name']);
		$username = addslashes ($_POST['username']);
		$password = addslashes ($_POST['password']);
		$email = addslashes ($_POST['email']);
	}
	// Check if name has been entered
    if (!$_POST['name']) {
        $errName = 'Please enter your name';
    }
		// Check if username has been entered
        if (!$_POST['username']) {
            $errUsername = 'Please enter your username';
        }
        
        // Check if email has been entered and is valid
        if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Please enter a valid email address';
        }
        
        //Check if password has been entered
        if (!$_POST['password']) {
            $errPassword = 'Please enter your password';
        }
		//Check if password has been entered
        if (!$_POST['password_confirm']) {
            $errConfirm = 'Please enter confirm your password';
        }
        //Check if passwords match
		if ($_POST['password'] != $_POST['password_confirm']){
			$errMatch = 'Your passwords do not match';
		}
	if (!$errName && !$errEmail && !$errPassword && !$errConfirm && !$errUsername && !$errMatch) {
		
		$sql = "INSERT INTO users ".
		"(name, login, password, email) ".
       "VALUES('$name','$username','$password','$email')";
		mysql_select_db('forecast');
		$retval = mysql_query( $sql, $conn );
		if(! $retval )
		{
			die('Could not enter data: ' . mysql_error());
		}
		echo "Entered data successfully\n";
		mysql_close($conn);
		header('Location: portfolio_wireframe');
	}		
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>

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
			<li class="active"><a href = "signup">Sign Up</a></li>
			<li><a href = "username">username</a></li>
        </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!--sign up page-->
	<br></br>
	<br></br>
	<div class="container">
	<div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
	<form class="form-horizontal" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="POST">
	<fieldset>
    <div id="legend">
      <legend class="">Sign Up</legend>
    </div>
	
	<div class="control-group">
      <!--Name -->
      <label class="control-label"  for="first_name">Name</label>
      <div class="controls">
        <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
        <p class="help-block">Please provide your name</p>
		<?php echo "<p class='text-danger'>$errName</p>";?>
      </div>
    </div>
	
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username">Username</label>
      <div class="controls">
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="<?php echo htmlspecialchars($_POST['username']); ?>">
        <p class="help-block">Username can contain any letters or numbers, without spaces</p>
		<?php echo "<p class='text-danger'>$errUsername</p>";?>
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
		<input type="text" id="email" name="email" class="form-control" placeholder="email@gmail.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
        <p class="help-block">Please provide your E-mail</p>
		<?php echo "<p class='text-danger'>$errEmail</p>";?>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Password-->
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" class="form-control" placeholder="********">
        <p class="help-block">Password should be at least 4 characters</p>
      </div>
	  <?php echo "<p class='text-danger'>$errPassword</p>";?>
    </div>
 
    <div class="control-group">
      <!-- Password -->
      <label class="control-label"  for="password_confirm">Confirm Password</label>
      <div class="controls">
        <input type="password" id="password_confirm" name="password_confirm" class="form-control" placeholder="********">
        <p class="help-block">Please confirm password</p>
		<?php 
			echo "<p class='text-danger'>$errConfirm</p>";
			echo "<p class='text-danger'>$errMatch</p>";
		?>
      </div>
    </div>
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <input id="submit" name="submit" type="submit" value="Send" class="btn btn-success pull-right">
      </div>
    </div>
  </fieldset>
</form>
</div>
</div>
<!-- /container -->


	    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  

</body>
</html>