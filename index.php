<?php

$host = $_SERVER['HTTP_HOST'];
$home_link = $host . '/movie-timings/index.php';

?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Movies! Affiliates Local Break Times</title>
        <meta name="description" content="Parsing Movies! Affiliates Timings PDF into Local Breaks List">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    </head>
    <body>
    	<nav class="navbar navbar-inverse">
    	<div class="container">
	    		<div class="navbar-header">
	    			<span class="navbar-brand">KCRA | Movies! Affiliate Local Timings</span>
	    		</div> <!-- .navbar-header -->
	    		<div class="navbar-collapse">
	    			<ul class="nav navbar-nav navbar-right">
	    				<li>
	    					<a href=<?php echo $host . "/movie-timings/index.php"?> >Home</a>
	    				</li>
	    			</ul>
	    		</div> <!-- .navbar-collapse -->
    		</div> <!-- .container -->
    	</nav>
    	<div class="container">
    		<h2>Movies! Affiliates Local Timings</h2>
    		<h3>Step 1: Get PDF of Days Final Timing</h3>
    		<a href="http://affiliates.moviestvnetwork.com/" target="_blank">Movies! Affiliates Dashboard</a>
    		<hr>
    		<h3>Step 2: Choose file and hit Send</h3>

			<form enctype="multipart/form-data" action="parse_pdf.php" method="POST">
			    <!-- MAX_FILE_SIZE must precede the file input field -->
			    <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
			    <!-- Name of input element determines name in $_FILES array -->
			    <div class="form-group">
				    <input name="userfile" type="file" id="moviesInputFile"/>    	
			    </div>
			    <button type="submit" class="btn btn-default"/>Send</button>
			</form>
		</div>
	</body>
</html>