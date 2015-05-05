<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Frequently Asked Questions</title>

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
            <li class="active"><a href="faqs">FAQS</a></li>
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

    <div class="container">
      <!-- Example row of columns -->
		<h3><a href = "#stocks">Stocks</a></h3>
		<ol>
			<li>What are stocks?</li>
			<li>What is a stockholder?</li>
			<li>How do stocks work?</li>
			<li>Types of Stocks</li>
		</ol>
		<h3><a href="#setup">Set Up</a></h3>
		<ol>
			<li>Facebook Login</li>
			<li>Account Setup</li>
			<li>Setting up Scripted Trading</li>
		</ol>
        <h3><a href="#howto">How to Play</a></h3>
        <ol>
			<li>The Basics</li>
			<li>Adding Money</li>
		</ol>

		<hr>
		<h2><a name = "stocks"></a>Stocks</h2>
		<strong>1. What are stocks? </strong>
		<p>Stocks are one of the most popular financial instruments in the world. It is the share of the ownership of the company.</p>
		<strong>2. What is a stockholder? </strong>
		<p>The stockholder is the owner of a stock</p>
		<strong>3. How do stocks work?</strong>
		<p>Most stocks are traded on exchanges, places where buyers and sellers meet and decide on a price. Some exchanges are physical locations where transactions are carried out on a trading floor. The other type of exchange is virtual, trades are made electronically</p>
		<strong>4. Types of Stocks</strong>
		<p><strong>Common Stock</strong></p>
		<p>When people talk about stocks they are usually referring to common stock. The majority of stock is issued in this form. Common shares represent ownership in a company and a claim (dividends) on a portion of profits.</p>
		<p><strong>Preferred Stock</strong></p>
		<p>Preferred stock represents some degree of ownership in a company but usually doesn't come with the same voting rights. With this type of stock, investors re usually guaranteed a fixed dividend forever while common stock has variable dividends that are never guaranteed. Preferred shareholders are paid off before the common shareholder in case of liquidation. Preferred stocks may also be callable (the company has the option to purchase the shares from shareholders at any time for any reason).</p>
		<a href="#top">To the top</a>
		<hr>
		<h2><a name="setup"></a>Set Up</h2>
    <strong>1. Facebook Login </strong>
		<p>To start trading, login with your Facebook. Don't worry, Stock Forecast won't post to or look at your profile.</p>
    <strong>2. Account Setup </strong>
		<p>After logging in for the first time, you are given $100,000,000 to trade with.</p>
    <strong>3. Setting up Scripted Trading </strong>
		<p>To set up scripted, or automated, trading - go to your account profile and click on the 'Set up Scripted Trading' button. Then select the stock you wish to buy or sell, and the price you wish to buy or sell at.</p>
		<a href="#top">To the top</a>
		<hr>
		<h2><a name = "howto"></a>How to Play</h2>
    <strong>1. The Basics </strong>
		<p>From your portfolio, you can make trades.</p>
    <strong>1. Adding Money </strong>
		<p> Unfortunately, you cannot add more money to your account. $100,000,000 should be enough to keep you trading.</p>
		<a href="#top">To the top</a>
		<hr>

		<p> If you still have questions, <a href="contact">Contact Us</a/>. <a href="#top">To the top</a></p>
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
