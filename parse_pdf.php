<?php
/**
 * Parsing the form from index.php
 *
 * @package   Ajskelton\LocalTimings
 * @since     1.0.0
 * @author    ajskelton
 * @link      anthonyskelton.com
 * @license   GNU General Public License 2.0+
 */
namespace Ajskelton\LocalTimings;

include 'header.php';
include 'src/autoload.php';
include 'functions.php';

$uploaddir = 'uploads/';
open_container_div();
check_upload_status( $uploaddir );
$pdf_file = $uploaddir.basename($_FILES['userfile']['name']);
$pdf_text = parse_pdf( $pdf_file );
print_times( $pdf_text );
close_container_div();
include_once('footer.php');
