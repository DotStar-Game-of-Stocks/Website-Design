<?php
/*if ($_POST["submit"]) {
$name = $_POST['InputName'];
$email = $_POST['InputEmail'];
$message = $_POST['InputMessage'];
$real = $_POST['InputReal'];
$formcontent="From: $name \n Message: $message";
$recipient = "root@stockforecast.ga";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";

//Check if name has been entered
if (!$_POST['InputName']) {
    $errName = 'Please enter your name';
}	

//Check if email has been entered and is valid
if (!$_POST['InputEmail'] || !filter_var($_POST['InputEmail'], FILTER_VALIDATE_EMAIL)) {
    $errEmail = 'Please enter a valid email address';
}

//Check if message has been entered
if (!$_POST['message']) {
    $errMessage = 'Please enter your message';
}
//Check if simple anti-bot test is correct
if ($human !== 7) {
    $errHuman = 'Your anti-spam is incorrect';
}

// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
    if ($recipient, $subject, $formcontent, $mailheader) {
        $result='<div class="alert alert-success">Thank You! I will be in touch</div>';
    } else {
        $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
    }
}
}*/
	if ($_POST["submit"]) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $human = intval($_POST['human']);
        $from = 'Demo Contact Form'; 
        $to = 'example@bootstrapbay.com'; 
        $subject = 'Message from Contact Demo ';
        
        $body = "From: $name\n E-Mail: $email\n Message:\n $message";
 
        // Check if name has been entered
        if (!$_POST['name']) {
            $errName = 'Please enter your name';
        }
        
        // Check if email has been entered and is valid
        if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Please enter a valid email address';
        }
        
        //Check if message has been entered
        if (!$_POST['message']) {
            $errMessage = 'Please enter your message';
        }
        //Check if simple anti-bot test is correct
        if ($human !== 5) {
            $errHuman = 'Your anti-spam is incorrect';
        }
 
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
    mail ($to, $subject, $body, $from);
    $result='Thank You! We will be in touch';
    
}
else {
        $result='Sorry there was an error sending your message. Please try again later';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us form</title>
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
			<li><a href="dashboard.php">Dashboard</a></li>
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
      </div>
	  </div>
    </nav>
	
<!--This code is for the contact form-->
<br></br>
<br></br>
<br></br>
<div class="container">
<div class = "col-md-6 col-md-offset-3">
<?php echo $result ?>
 <form class = "form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" >
    <h2>Contact Form </h2>
	<div class="form-group">
        <label for="name" class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
            <?php echo "<p class='text-danger'>$errName</p>";?>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
            <?php echo "<p class='text-danger'>$errEmail</p>";?>
        </div>
    </div>
    <div class="form-group">
        <label for="message" class="col-sm-2 control-label">Message</label>
        <div class="col-sm-10">
            <textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
            <?php echo "<p class='text-danger'>$errMessage</p>";?>
        </div>
    </div>
    <div class="form-group">
        <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
            <?php echo "<p class='text-danger'>$errHuman</p>";?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
			 <input id="submit" name="submit" type="submit" value="Send" class="btn btn-success pull-right">
			 
        </div>
    </div>
  </form>
<br></br>
 
  <hr class="featurette-divider hidden-lg">
  <div class="col-lg-5 col-md-push-1">
    <address>
    <h3>Office Location</h3>
    <p class="lead"><a href="https://www.google.com/maps/place/Thomas+M.+Siebel+Center+for+Computer+Science/@40.113803,-88.224905,15z/data=!4m2!3m1!1s0x0:0x4e9f01d40d359630">Siebel Center for Computer Science<br>
Urbana, IL 61801</a><br>
      Phone: 217-333-3426</p>
    </address>
  </div>
   </div>
  </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
</body>
</html>