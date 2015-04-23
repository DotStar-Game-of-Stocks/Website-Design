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
    if (mail ($to, $subject, $body, $from)) {
        $result='Thank You! I will be in touch';
    } else {
        $result='Sorry there was an error sending your message. Please try again later';
    }
}
    }
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
	<br>
	<br>
	<br>
Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?><br>
<?php echo $result ?>

</body>
</html>