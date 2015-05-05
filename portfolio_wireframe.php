<?php
	include(newtrade.php);

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
		die('Could not retrieve data: ' . mysql_error());
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
				$gain = $price-$row["Price"];
				$percent = $gain *100 / $row["Price"];
				$table = '<tr>' . "\n";
				$table .= '<td><a href="stock_page_wireframe?stock=' . htmlspecialchars($row["Stock"]) . '">' . htmlspecialchars($row["Stock"]) . '</a></td>' . "\n";
				$table .= '<td>' . htmlspecialchars($row["Amount"]) . '</td>' . "\n";
				$table .= '<td>$' . htmlspecialchars($row["Price"]) . '</td>' . "\n";
				$table .= '<td>$' . htmlspecialchars($price) . '</td>' . "\n";
				if($gain > 0)
				{
					$table .= '<td><font color = "green">$' . htmlspecialchars($gain) . '</font></td>' . "\n";
					$table .= '<td><font color = "green">' . htmlspecialchars($percent) . '%</font></td>' . "\n";
				}
				else
				{
					$table .= '<td><font color = "red">$' . htmlspecialchars($gain) . '</font></td>' . "\n";
					$table .= '<td><font color = "red">' . htmlspecialchars($percent) . '%</font></td>' . "\n";
				}

				$table .= '</tr>' . "\n";
				$htmlTable .= $table;
			}
		}
	
	mysql_free_result($retval);	
	$sql2 = "SELECT Stock,Amount,Price,Action FROM portfolio WHERE Username ='$username';";
	mysql_select_db('forecast');
	$retval2 = mysql_query( $sql2, $connection );
	if(! $retval2 )
	{
		die('Could not retrieve data: ' . mysql_error());
	}
	echo "It worked!\n";

$tradeTable = '';
	while ($row2 = mysql_fetch_array($retval2, MYSQL_ASSOC)) {
			$reqsturl = "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%3D%22".$row2["Stock"]."%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
			$str = file_get_contents($reqsturl);
			$json = json_decode($str, true);
			$price = $json['query']['results']['quote']['Ask'];

			if(!$price)
			{
				echo 'ERROR';
			}
			else{
				$table2 = '<tr>' . "\n";
				$table2 .= '<td>' . htmlspecialchars($row2["Action"]) . '</td>' . "\n";
				$table2 .= '<td><a href="stock_page_wireframe?stock=' . htmlspecialchars($row2["Stock"]) . '">' . htmlspecialchars($row2["Stock"]) . '</a></td>' . "\n";
				$table2 .= '<td>' . htmlspecialchars($row2["Amount"]) . '</td>' . "\n";
				$table2 .= '<td>$' . htmlspecialchars($row2["Price"]) . '</td>' . "\n";
				$table2 .= '</tr>' . "\n";
				$tradeTable .= $table2;
			}
		}

	mysql_free_result($retval2);
	mysql_close($conn);
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $_SESSION['FULLNAME']; ?>'s Portfolio</title>

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
				<form class="navbar-form navbar-left" action="stock_page_wireframe.php" method="get">
				<div class="form-group">
					<input type="text" class="form-control" name="stock"><br>
				</div>
				  <input type="submit" class="btn btn-default" value="Submit">
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
	<br></br>
    <!-- NAVBAR CODE END -->



    <div class="container">
        <section style="padding-bottom: 50px; padding-top: 50px;">
			<p><?php echo $_GET[$resultTrade]?></p>
			<h2><?php echo $_SESSION['FULLNAME']; ?>'s Portfolio</h2>
			<h4>Portfolio Value</h4>
			<h4>$<?php echo $totalValue; ?></h4>
			<h4><font color="green">GAIN  50.00%  </font><font color="red">LOSS  10.00%</font></h4>
			<p></p>
			<p></p>
			<h4><strong>Available Cash</strong></h4>
			<h4>$<?php echo 1000000 - $cashUsed; ?></h4>
			<form method = "Link" action="newtrade"><button type="submit" class="btn btn-success">Make new trade</button></form>
			<form method = "Link" action="scripted"><button type="submit" class="btn btn-success">Setting Scripted Trading</button></form>
			<h4>Stocks owned</h4>
			<table class="table table-stribed table-content table-condensed table-striped">
				<tr>
					<td><strong>Symbol</strong></td>
					<td><strong>Shares</strong></td>
					<td><strong>Purchase Price</strong></td>
					<td><strong>Market Price</strong></td>
					<td><strong>Gain/Loss</strong></td>
					<td><strong>Gain/Loss %</strong></td>
				</tr>
				<?php echo $htmlTable; ?>
			</table>

			<h4>Trade History</h4>
			<table class="table table-stribed table-content table-condensed table-striped">
				<tr>
					<td><strong>Buy or Sell</strong></td>
					<td><strong>Symbol</strong></td>
					<td><strong>Shares</strong></td>
					<td><strong>Price</strong></td>
				</tr>
				<?php echo $tradeTable; ?>
				</tr>
			</table> 

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
