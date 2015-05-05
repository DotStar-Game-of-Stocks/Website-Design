<?php
	include(portfolio_wireframe);
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');    // DB username
	define('DB_PASSWORD', 'stockforcast');    // DB password
	define('DB_DATABASE', 'forecast');      // DB name
	$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( "Unable to connect");
	$database = mysql_select_db(DB_DATABASE) or die( "Unable to select database");
	session_start();
	
	$username = addslashes ($_SESSION['FULLNAME']);
	$buy = addslashes ("buy");
	$sql = "SELECT Stock,Amount,Price FROM portfolio WHERE Username = '$username' AND Action = '$buy';";
	mysql_select_db('forecast');
	$retval = mysql_query( $sql, $connection );
	if(! $retval )
	{
		die('Could not retrive data: ' . mysql_error());
	}
	echo "It worked!\n";

$htmlTable = '';
$totalValue = 0;
$cashUsed = 0;
	while ($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
			$reqsturl = "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%3D%22".$row["Stock"]."%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
			$str = file_get_contents($reqsturl);
			$json = json_decode($str, true);
			$price = $json['query']['results']['quote']['Ask'];

			if(!$price)
			{
				echo 'ERROR';
			}
			else{
				$cashUsed += $row["Price"]* $row["Amount"];
				$totalValue += $price * $row["Amount"];
			}
		}

	mysql_free_result($retval);
	mysql_close($conn);
?>
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
          <a class="navbar-brand" href="index">Stock Forecast</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
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
			<li class="active"><a href = "profile_wireframe">Profile</a></li>
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
	<br></br>
    <!-- NAVBAR CODE END -->


    <div class="container">
        <section style="padding-bottom: 50px; padding-top: 50px;">
            <div class="row">
                <div class="col-md-4">
                    <img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture?type=large" height = "300" width="300" class="img-rounded img-responsive" />
				</div>
				<div class="col-md-8">
					<div class="alert alert-success">
                        <h1><?php echo $_SESSION['FULLNAME']; ?></h1>
                        <h3>Account Details: </h3>
                        <h4>Email : <?php echo $_SESSION['EMAIL']; ?></h4>
                        <h4>Date joined : 05/01/2015</h4>
                        <h4>Portfolio Value : $<?php echo $totalValue; ?></h4>
						<h4>Available Cash : $<?php echo 1000000 - $cashUsed; ?></h4>
                    </div>
				</div>
			</div>
			<form method = "link" action = "portfolio_wireframe"><button type="submit" class="btn btn-success">Go to Portfolio</button> </form>
			<form method = "link" action = "newtrade"><button type="submit" class="btn btn-success">Make New Trade</button> </form>
			<form method = "link" action = "scripted"><button type="submit" class="btn btn-success">Set Up Scripted Trading</button> </form>

      <!--<h3>Update User Details</h3>
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
            <input type="password" class="form-control" placeholder="********">
            <label>Enter New Password</label>
            <input type="password" class="form-control" placeholder="********">
            <label>Confirm New Password</label>
            <input type="password" class="form-control" placeholder="********">
            <br></br>
            <a href="#" class="btn btn-warning">Change Password</a>
			-->

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
