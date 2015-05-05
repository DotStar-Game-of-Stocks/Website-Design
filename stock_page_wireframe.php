<?php
	session_start();
	//$sql = "SELECT symbol, current, cl FROM stock";
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $_GET["stock"]; ?></title>

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
	<br></br>
    <!-- NAVBAR CODE END -->

		<?php
		$reqsturl = "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%3D%22".$_GET["stock"]."%22&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
		$str = file_get_contents($reqsturl);
		$json = json_decode($str, true);

		$pclose = $json['query']['results']['quote']['PreviousClose'];
		$open = $json['query']['results']['quote']['Open'];
		$bid = $json['query']['results']['quote']['Bid'];
		$ask = $json['query']['results']['quote']['Ask'];
		$pchange = $json['query']['results']['quote']['PercentChange'];
		$name = $json['query']['results']['quote']['Name'];
		?>

    <div class="container">
        <section style="padding-bottom: 50px; padding-top: 50px;">
			<h2><?php echo $name; ?></h2>
			<h3><font color= <?php if ($pchange > 0) echo "green"; else echo "red";?> ><?php echo $pchange; ?></font></h3>

			<img src=<?php echo "http://chart.finance.yahoo.com/t?s=".$_GET["stock"]."&lang=en-US&region=US&width=600&height=300";?> class="img-rounded img-responsive""/>
			<form method = "link" action = "newtrade"><button type="submit" class="btn btn-success">Make new trade</button> </form>

			<h4>Today's Trading</h4>
			<table class="table table-stribed table-content table-condensed table-striped">
				<tr>
					<td>Previous Close</td>
					<td class="statistic-values text-right"> $<?php echo $pclose; ?>  </td>
				</tr>
				<tr>
					<td>Open</td>
					<td class="statistic-values text-right"> $<?php echo $open; ?> </td>
				</tr>
				<tr>
					<td>Bid</td>
					<td class="statistic-values text-right"> $<?php echo $bid; ?> </td>
				</tr>
				<tr>
					<td>Ask</td>
					<td class="statistic-values text-right"> $<?php echo $ask; ?> </td>
				</tr>

			</table>
			<a href="#top">To the top</a>
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
