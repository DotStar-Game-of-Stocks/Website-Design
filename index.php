<?php
	session_start();
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
            <li class="active"><a href="index">Game</a></li>
            <li><a href="about">About Us</a></li>
            <li><a href="faqs">FAQS</a></li>
			<li><a href="dashboard">Dashboard</a></li>
			<li>

				<form class="navbar-form navbar-left" role="search" action="stock_page_wireframe.php?stock">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default"><a href="stock_page_wireframe.php?stock">Submit</a></button>
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
        <h1>Stock Forecast</h1>
        <p>Here, you can trade real life stocks without actually losing money! Learn how to trade and get ready for the real market.</p>
        <p>
		<?php if ($_SESSION['FBID']): ?>
			<a class="btn btn-primary btn-lg" role="button" href = "portfolio_wireframe"> Get Started &raquo;</a>
		<?php else: ?>
			<a class="btn btn-primary btn-lg"  role="button" href = "login">Get Started &raquo;</a>
		<?php endif ?>
		</p>
      </div>
    </div>

    <div class="container">
      <!-- Rows of News -->
      <div class="row">
        <div class="col-md-4">
          <h2>CNN MONEY</h2>
          <p><?php
$rss = new DOMDocument();
$rss->load('http://rss.cnn.com/rss/money_topstories.rss');
$feed = array();
foreach ($rss->getElementsByTagName('item') as $node) {
$item = array (
'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
);
array_push($feed, $item);
}
$limit = 5;
for($x=0;$x<$limit;$x++) {
$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
$link = $feed[$x]['link'];
$description = $feed[$x]['desc'];
$date = date('l F d, Y', strtotime($feed[$x]['date']));
echo '<p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br />';
echo '<small><em>Posted on '.$date.'</em></small></p>';
echo '<p>'.$description.'</p>';
}
?></p>

        </div>
        <div class="col-md-4">
          <h2>CNBC</h2>
          <p><?php
$rss = new DOMDocument();
$rss->load('http://www.cnbc.com/id/15839069/device/rss/rss');
$feed = array();
foreach ($rss->getElementsByTagName('item') as $node) {
$item = array (
'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
);
array_push($feed, $item);
}
$limit = 5;
for($x=0;$x<$limit;$x++) {
$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
$link = $feed[$x]['link'];
$description = $feed[$x]['desc'];
$date = date('l F d, Y', strtotime($feed[$x]['date']));
echo '<p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br />';
echo '<small><em>Posted on '.$date.'</em></small></p>';
echo '<p>'.$description.'</p>';
}
?></p>

       </div>
        <div class="col-md-4">
          <h2>Yahoo News</h2>
          <p><?php
$rss = new DOMDocument();
$rss->load('http://www.wsj.com/xml/rss/3_7031.xml');
$feed = array();
foreach ($rss->getElementsByTagName('item') as $node) {
$item = array (
'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
);
array_push($feed, $item);
}
$limit = 5;
for($x=0;$x<$limit;$x++) {
$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
$link = $feed[$x]['link'];
$description = $feed[$x]['desc'];
$date = date('l F d, Y', strtotime($feed[$x]['date']));
echo '<p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br />';
echo '<small><em>Posted on '.$date.'</em></small></p>';
echo '<p>'.$description.'</p>';
}
?></p>

        </div>
      </div>

      <hr>

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
