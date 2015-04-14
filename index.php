<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GameOfStocks</title>

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
          <a class="navbar-brand" href="./index.html">GameOfStocks</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
		<ul class="nav navbar-nav">
            <li class="active"><a href="./index.html">Game</a></li>
            <li><a href="./about.html">About Us</a></li>
            <li><a href="./faqs.html">Contact/FAQS</a></li>
         </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>GameOfStocks</h1>
        <p>This is a temporary page because we have no idea what is going on at the backend. It includes 3 tabs on top and 3 stuff on the bottom for whatever purposes.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
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
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>CNBC</h2>
          <p><?php
$rss = new DOMDocument();
$rss->load('http://www.cnbc.com/id/15839069/device/rss/rss.html');
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
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
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
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
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