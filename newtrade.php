<?php
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');    // DB username
	define('DB_PASSWORD', 'stockforcast');    // DB password
	define('DB_DATABASE', 'forecast');      // DB name
	$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( "Unable to connect");
	$database = mysql_select_db(DB_DATABASE) or die( "Unable to select database");
	session_start();
	if(isset($_POST['submit']))
	{
		if(! get_magic_quotes_gpc() )
		{
			$option = addslashes ($_POST['optradio']);
			$username = addslashes ($_SESSION['FULLNAME']);
			$stock = addslashes ($_POST['symbol']);

			$shares = addslashes (intval($_POST['shares']));
		}
		else
		{
			$option = addslashes ($_POST['optradio']);
			$username = addslashes ($_SESSION['FULLNAME']);
			$stock = addslashes ($_POST['symbol']);

			$shares = addslashes (intval($_POST['shares']));
		}
		if (!$_POST['optradio']) {
            $errOption = 'Pick an option';
        }
		if (!$_POST['symbol']) {
            $errSymbol = 'Pick an option';
        }
		if (!$_POST['shares'] || $shares<0) {
            $errShares = 'Please enter a valid number of shares';
        }
		if (!$errOption && !$errSymbol && !$errShares)
		{
			$reqsturl = "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%3D%22".$_POST['symbol']."%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
			$str = file_get_contents($reqsturl);
			$json = json_decode($str, true);
			$price = $json['query']['results']['quote']['Ask'];
			if ($price==0) {
	            $errStock = 'Please try a differnt stock.';
	        }
			if ($option=='buy' && !$errStock)
			{
				$sql = "INSERT INTO portfolio ".
					"(Username, Stock, Price, Amount, Action) ".
					"VALUES('$username','$stock','$price','$shares', '$option')";
				mysql_select_db('forecast');
				$retval = mysql_query( $sql, $connection );
				if(! $retval )
				{
					die('Could not enter data: ' . mysql_error());
				}
				echo "Entered data successfully\n";
				mysql_close($conn);
				$resultTrade = 'Stock bought';
				header('Location: portfolio_wireframe');
			}
			else if ($option=='sell' && !$errStock)
			{
				$reqsturl = "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%3D%22".$_POST['symbol']."%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
				$str = file_get_contents($reqsturl);
				$json = json_decode($str, true);
				$price = $json['query']['results']['quote']['Ask'];

				$sql = "INSERT INTO portfolio ".
					"(Username, Stock, Price, Amount, Action) ".
					"VALUES('$username','$stock','$price','$shares', '$option')";
				mysql_select_db('forecast');
				$retval = mysql_query( $sql, $connection );
				if(! $retval )
				{
					die('Could not enter data: ' . mysql_error());
				}
				echo "Entered data successfully\n";
				mysql_close($conn);
				$resultTrade = 'Stock sold';
				header('Location: portfolio_wireframe');
			}
			else{
				$resultTrade = 'Please try a differnt stock.';
			}
		}


	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stock Forecast</title>

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
        <h1>Make New Trade</h1>
        <p><b>Buy or Sell your choice of Stock</b>
</div>
</p>
      </div>
    </div>
<div class="container">
	<section style="padding-bottom: 50px; padding-top: 50px;">
		<div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
    <h3><?php echo $resultTrade; ?></h3>
      <!-- Example row of columns -->

What do you want to do?
<form class="form-horizontal" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="POST">
<div class="radio">
  <label><input type="radio" name="optradio" value = "buy">Buy</label>
  <label><input type="radio" name="optradio" value = "sell">Sell</label>
  <p></p>
  <?php echo "<p class='text-danger'>$errOption</p>";?>
</div>
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Stock Symbol</span>
  <input type="text" class="form-control" name = "symbol" placeholder="(GOOG)" aria-describedby="basic-addon1" value="<?php echo htmlspecialchars($_POST['symbol']); ?>">
  <p></p>
  <?php echo "<p class='text-danger'>$errSymbol</p>";?>
</div>
<div class="input-group">
  <input type="text" name = "shares" class="form-control" placeholder="Number of Shares" aria-describedby="basic-addon2" value="<?php echo htmlspecialchars($_POST['shares']); ?>">
  <p></p>
  <?php echo "<p class='text-danger'>$errShares</p>";?>
</div>
<div class="controls">
<input id="submit" name="submit" type="submit" value="Make New Trade" class="btn btn-success pull-right">
</div>
</form>
        </div>
		</section>

	</div> <!-- /container -->
	<hr>

	<footer>
        <p>&copy; Stock Forecast 2015</p>
      </footer>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
