<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stock Page Wireframe</title>

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
			<li><a href = "profile_wireframe.php">Profile</a></li>
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
			<h2>Company Name - Stock symbol</h2>
			<h3><font color="green">00.00%</font><font color="red">00.00%</font></h3>
			<img src="stock_chart_placeholder.jpg" class="img-rounded img-responsive""/>
			<form method = "link" action = "newtrade.php"><button type="submit" class="btn btn-default">Make new trade</button> </form>
			
			<h4>Today's Trading</h4>
			<table class="table table-stribed table-content table-condensed table-striped">
				<tr>
					<td>Previous Close</td>
					<td class="statistic-values text-right">$00.00</td>
				</tr>
				<tr>
					<td>Open</td>
					<td class="statistic-values text-right">$00.00</td>
				</tr>
				<tr>
					<td>Bid</td>
					<td class="statistic-values text-right">$00.00</td>
				</tr>
				<tr>
					<td>Ask</td>
					<td class="statistic-values text-right">$00.00</td>
				</tr>
				<tr>
					<td>1y Target Estimate</td>
					<td class="statistic-values text-right">$00.00</td>
				</tr>
				<tr>
					<td>Day's Range</td>
					<td class="statistic-values text-right">$00.00</td>
				</tr>
				<tr>
					<td>52 Week Range</td>
					<td class="statistic-values text-right"></td>
				</tr>
				<tr>
					<td>Volume</td>
					<td class="statistic-values text-right">$00.00-00.00</td>
				</tr>
				<tr>
					<td>Average Volume</td>
					<td class="statistic-values text-right">$1,000,000.00</td>
				</tr>
				<tr>
					<td>Market Cap</td>
					<td class="statistic-values text-right">$00.00</td>
				</tr>
				<tr>
					<td>Dividend Yield</td>
					<td class="statistic-values text-right">$00.00</td>
				</tr>
			</table>
			<h4>Growth and Valuation</h4>
			<table class="table table-stribed table-content table-condensed table-striped">
				<tr>
					<td>Earnings growth (last year)</td>
					<td class="statistic-values text-right">00.00%</td>
				</tr>
				<tr>
					<td>Earning growth (this year)</td>
					<td class="statistic-values text-right">00.00%</td>
				</tr>
				<tr>
					<td>Earning growth (next 5 years)</td>
					<td class="statistic-values text-right">00.00%</td>
				</tr>
				<tr>
					<td>Revenue Growth (last year)</td>
					<td class="statistic-values text-right">00.00%</td>
				</tr>
				<tr>
					<td>P/E ratio</td>
					<td class="statistic-values text-right">1.0</td>
				</tr>
			</table>
			<h4>Financials</h4>
			<table class="table table-stribed table-content table-condensed table-striped">
				<tr>
					<td>EPS forecast(this quarter))</td>
					<td class="statistic-values text-right">$0.00</td>
				</tr>
				<tr>
					<td>Annual revenue (last year)</td>
					<td class="statistic-values text-right">$00.00</td>
				</tr>
				<tr>
					<td>Annual profit (last year)</td>
					<td class="statistic-values text-right">$0.00</td>
				</tr>
				<tr>
					<td>Net profit margin</td>
					<td class="statistic-values text-right">00.00%</td>
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
