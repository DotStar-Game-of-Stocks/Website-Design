<?php
	if ($_POST["submit"]) {
        $stocks = $_POST['symbol'];
        $lowPrice = intval($_POST['buy']);
        $hiPrice = intval($_POST['sell']);

        // Check if symbol has been entered
        if (!$_POST['symbol']) {
            $errSymbol = '{Please enter your stock symbol}';
        }
        
        // Check if email has been entered and is valid
        if (!$_POST['buy']) {
            $errBuy = 'Please enter a valid price';
        }
        
        //Check if sell price has been posted has been entered
        if (!$_POST['sell']) {
            $errSell = 'Please enter a valid price';
        }
  
 
// If there are no errors, send the script
if ($lowPrice > $hiPrice) {
	$result='Please change the selling and purchasing price so selling price is higher than purchasing';
}
else if (!$errSymbol && !$errSell && !$errBuy) {
	//scripted trading code belongs here but that wasn't sent to me
    $result='Your changes have been made';
    
}
else {
    $result='Sorry there was an error saving your price choices. Please try again later';
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
          <a class="navbar-brand" href="/">Stock Forecast</a>
        </div>
        <div id="navbar" class="navbar-collapse">
		<ul class="nav navbar-nav navbar-left">
            <li><a href="/">Game</a></li>
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
			<li><a href = "login">Login</a></li>
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
						<?php echo "<p class='text-danger'>$errSyymbol</p>";?>
					</div>
				</div>
	
				<div class="control-group">
				<!-- When to sell -->
					<label class="control-label"  for="Sell">When to Sell Stocks</label>
					<div class="controls">
						<input type="text" id="sell" name="sell" class="form-control" placeholder="Decreases by $10" value="<?php echo htmlspecialchars($_POST['sell']);?>">
						<p class="help-block">Input the price you want to sell stock at.</p>
						<?php echo "<p class='text-danger'>$errSell</p>";?>
					</div>
				</div>
				<div class="control-group">
				<!-- When to buy -->
					<label class="control-label"  for="buy">When to Buy Stocks</label>
					<div class="controls">
						<input type="text" id="buy" name="buy" class="form-control" placeholder="Increases to $10" value="<?php echo htmlspecialchars($_POST['buy']); ?>">
						<p class="help-block">Input a price you want to buy stock at.</p>
						<?php echo "<p class='text-danger'>$errBuy</p>";?>
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
