<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Movies! Affiliates Local Break Times</title>
        <meta name="description" content="Parsing Movies! Affiliates Timings PDF into Local Breaks List">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/main.css">
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
	    					<a href="http://10.151.4.115/movie-timings/index.php">Home</a>
	    				</li>
	    				<li>
							<a href="javascript:window.print()">Print Page</a>
						</li>
	    			</ul>
	    		</div> <!-- .navbar-collapse -->
    		</div> <!-- .container -->
    	</nav>
    	<div class="container">

<?php
include 'src/autoload.php';

$uploaddir = '';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

function parse_pdf( $file ) {
	$parser = new \Smalot\PdfParser\Parser();
	$pdf = $parser->parseFile($file);
	$array = [];
	$text = $pdf->getText();

	$regex = "/LOCAL AFFILIATE BREAK.*?([0-9]{1,2}:[0-9]{2}).*?[\*]{3}\s{0,50}([0-9]{1,2}:[0-9]{2}:[0-9]{2})\s(AM|PM|XM)/";
	$return_value = preg_match_all($regex, $text, $array );
	return $array;
}

function print_times( $array ) {
	echo '<h2>' . $_FILES['userfile']['name'] . '</h2>';
	echo '<div class="wrap">';
	echo '<table>';
	echo '<thead>';
	echo '<tr>';
	echo '<th>Break Time</th>';
	echo '<th>Break Length</th>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';
	for($i = 0; $i < count($array[0]); $i++){
		echo '<tr>';
		echo '<td>';
		if($array[3][$i] == 'XM' ){
			$array[3][$i] = 'AM';
		}
		$time = DateTime::createFromFormat('H:i:s A', $array[2][$i] . ' ' . $array[3][$i]);
		$time->sub(new DateInterval('PT3H'));
		$newTime = $time->format('G:i:s');
		echo ($newTime);
		echo '</td>';
		echo '<td>';
		echo ($array[1][$i]);
		echo '</td>';
		echo '</tr>';
	}
	echo '</tbody>';
	echo '</table>';
	echo '</div>';
}

$pdf_text = parse_pdf( $uploadfile );
print_times( $pdf_text );

?>