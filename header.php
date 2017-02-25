<?php
/**
 * Header of web pages
 *
 * @package   Ajskelton\LocalTimings
 * @since     1.0.0
 * @author    ajskelton
 * @link      anthonyskelton.com
 * @license   GNU General Public License 2.0+
 */
namespace Ajskelton\LocalTimings;

?>
<!doctype html>
<html class="no-js" lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Local Break Times for Movies! and MeTV</title>
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
			<span class="navbar-brand">KCRA | Local Break Times Application</span>
		</div> <!-- .navbar-header -->
		<div class="navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href=<?php echo "http://" . $_SERVER['HTTP_HOST'] . "/local-timings/index.php"?> >Home</a>
				</li>
                <?php if ($_FILES) : ?>
                <li>
                    <a href="javascript:window.print()">Print Page</a>
                </li>
                <?php endif; ?>
			</ul>
		</div> <!-- .navbar-collapse -->
	</div> <!-- .container -->
</nav>