<?php
	session_start(); 
	if ($_POST["submit"]) {
        $stocks = $_POST['symbol'];
		$action = $_POST['action'];
        $number = intval($_POST['number']);
        $price = intval($_POST['price']);

        // Check if symbol has been entered
        if (!$_POST['symbol']) {
            $errSymbol = 'Please enter your stock symbol';
        }
        
        // Check if an action has been entered and is valid
        if (!$_POST['action']) {
            $errAction = 'Please enter a valid action';
        }
		// Check if an action has been entered and is valid
        if ($number < 0 || !$_POST['number']) {
            $errNumber = 'Please enter a valid number of Stocks';
        }
        
        //Check if price has been entered
        if ($price < 0 || !$_POST['price']) {
            $errPrice = 'Please enter a valid price';
        }
  
// If there are no errors, send the script
if (!$errSymbol && !$errNumber && !$errPrice && !$errAction) {
	$input = "$stocks $action $number $ $price";
	exec("python StockScreener.py $input");
    $result='Your changes have been made';
    
}
else {
    $result='Sorry there was an error. Please try again later';
    }
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scripted trading</title>

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
            <li><a href="about">About Us</a></li>
            <li><a href="faqs">FAQS</a></li>
			<li><a href="dashboard">Dashboard</a></li>
            <li><a href="portfolio_wireframe">Portfolio</a><li>
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


    <div class="container">
        <section style="padding-bottom: 50px; padding-top: 50px;">
			<div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
				<?php echo $result ?>
				<form class="form-horizontal" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="POST">
				<fieldset>
				<div id="legend">
					<legend class="">Scripted Trading</legend>
				</div>
	
				<div class="control-group">
				<!--Stock Symbols-->
					<label class="control-label"  for="symbol">Stock Symbols</label>
					<div class="controls">
						<input type="text" id="symbol" name="symbol" class="form-control" placeholder="GOOG, AMZN, AAPL" value="<?php echo htmlspecialchars($_POST['symbol']); ?>">
						<p class="help-block">Separate stocks with a comma and space</p>
						<?php echo "<p class='text-danger'>$errSymbol</p>";?>
					</div>
				</div>
	
				<div class="control-group">
				<!-- Buy or Sell -->
					<label class="control-label"  for="action">Buy or Sell</label>
					<div class="controls">
						<input type="text" id="action" name="action" class="form-control" placeholder="Buy" value="<?php echo htmlspecialchars($_POST['action']); ?>">
						<p class="help-block">Choose whether to Buy or Sell.</p>
						<?php echo "<p class='text-danger'>$errAction</p>";?>
					</div>
				</div>
				<!-- Amount of Stocks bought or sold -->
				<div class="control-group">
					<label class="control-label"  for="number">Number of Stocks</label>
					<div class="controls">
						<input type="text" id="number" name="number" class="form-control" placeholder="200" value="<?php echo htmlspecialchars($_POST['number']);?>">
						<p class="help-block">Input the number of Stocks to be bought or sold.</p>
						<?php echo "<p class='text-danger'>$errNumber</p>";?>
					</div>
				</div>
				<div class="control-group">
				<!-- Price to buy or sell at -->
					<label class="control-label"  for="price">Price to Buy or Sell Stocks</label>
					<div class="controls">
						<input type="text" id="price" name="price" class="form-control" placeholder="$100" value="<?php echo htmlspecialchars($_POST['price']); ?>">
						<p class="help-block">Input a price you want to buy or sell a stock at.</p>
						<?php echo "<p class='text-danger'>$errPrice</p>";?>
					</div>
				</div>
				<div class="control-group">
				<!-- Button -->
					<div class="controls">
					<input id="submit" name="submit" type="submit" value="Submit" class="btn btn-success">
					</div>
				</div>
				</fieldset>
				</form>
			</div>
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
