<?php
/**
 * Functions to use throughout the site
 *
 * @package   Ajskelton\LocalTimings
 * @since     1.0.0
 * @author    ajskelton
 * @link      anthonyskelton.com
 * @license   GNU General Public License 2.0+
 */
namespace Ajskelton\LocalTimings;

// Check for upload attempt
function check_upload_status( $uploaddir) {

	if ( isset( $_FILES['userfile'] ) ) {
		$newfile = $uploaddir . basename( $_FILES['userfile']['name'] );

		// If no error
		if ( $_FILES['userfile']['error'] == 0 ) {
			//Attempt to move
			if ( move_uploaded_file( $_FILES['userfile']['tmp_name'], $newfile ) ) {
				echo "<div class='alert alert-success hidden-print' role='alert'>File was successfully uploaded.</div>";
			} else {
				echo "<div class='alert alert-danger hidden-print' role='alert'>Error moving file.</div>";
			}
		} else {
			// Has error
			$errors = array(
				0 => "There is no error, the file uploaded with success",
				1 => "The uploaded file exceeds the upload_max_filesize directive in php.ini",
				2 => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
				3 => "The uploaded file was only partially uploaded",
				4 => "No file was uploaded",
				6 => "Missing a temporary folder"
			);
			echo "<div class='alert alert-danger hidden-print' role='alert'>Error: " . $errors[ $_FILES['userfile']['error'] ] . "</div>";
		}
	}
}

function parse_pdf( $file ) {
	$parser = new \Smalot\PdfParser\Parser();
	$pdf = $parser->parseFile($file);
	$array = [];
	$text = $pdf->getText();
	$regex = "/([0-9]{1,2}:[0-9]{2}:[0-9]{2})\s(AM|PM|XM)\s{0,1}\*{3}.*?LOCAL.*?([0-9]{1,2}:[0-9]{2})/";
	preg_match_all($regex, $text, $array );
	return $array;
}

function print_times( $array ) {
	echo '<h2>' . $_FILES['userfile']['name'] . '</h2>';
	if($_POST['channel'] == 'movies') {
		echo '<h3>Movies! Local Break Times</h3>';
	} elseif($_POST['channel'] == 'me') {
		echo '<h3>MeTV Local Break Times</h3>';
	}
	echo '<section class="wrap">';
	echo '<header>';
	echo '<h3>Time</h3>';
	echo '<h4>Length</h4>';
	echo '</header>';
	echo '<article>';
	for($i = 0; $i < count($array[0]); $i++){
		echo '<div class="break-row">';
		echo '<div class="break-time">';
		if($array[2][$i] == 'XM' ){
			$array[2][$i] = 'AM';
		}
		$time = \DateTime::createFromFormat('H:i:s A', $array[1][$i] . ' ' . $array[2][$i]);
		if($_POST['channel'] == 'movies' ) {
			$time->modify("-3 hour");
		} elseif($_POST['channel'] == 'me') {
			$time->modify("+9 second");
		}
		$newTime = $time->format('G:i:s');
		echo ($newTime);
		echo '</div>';
		echo '<div class="break-length">';
		echo ($array[3][$i]);
		echo '</div>';
		echo '</div>';
	}
	echo '</article>';
	echo '</section>';
	echo '</div>';
}

function open_container_div() {
	echo '<div class="container">';
}

function close_container_div() {
	echo '</div>';
}