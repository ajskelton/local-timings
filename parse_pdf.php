<?php

include 'src/autoload.php';

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

	echo '<table>';
	echo '<tr>';
	echo '<th>Break Time</th>';
	echo '<th>Break Length</th>';
	echo '<tr>';
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
		echo '<td>';
		echo '<tr>';
	}
	echo '</table>';
}

$pdf_text = parse_pdf( $file );
print_times( $pdf_text );

?>