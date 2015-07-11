<?php
function search($from, $to) {
	global $tmp;
	global $offset;

	$posfrom = strpos($tmp, $from, $offset);
	$posto = strpos($tmp, $to, $posfrom);

	

	$found= substr($tmp, $posfrom + strlen($from), $posto - $posfrom - strlen($from));
	$offset = $posto;

	return $found;
}


$files = glob("ausstattung*");


$rets = array();

foreach ($files as $file) {

	$ret=array();

	$filename=$file; //"ausstattung2015-07-03-16-20-01.html"

	$date = substr($filename, strlen("ausstattung"), strlen("2015-07-03")) . " " . str_replace("-", ":", substr($filename, strlen("ausstattung2015-07-03-"), strlen("16-20-01")));
	$ret["date"] = (date("Y-m-d H:i:s", strtotime($date)));

	$lines= file_get_contents($filename);

	$tmp = $lines;

	$offset = 0;


	$model = search("Modell: <b>", "</b>");
	$state = search("Aktueller Gerätestatus: <b>", "</b>");
	$ret["wien"][$model] = $state;
	 
	$model = search("Modell: <b>", "</b>");
	$state = search("Aktueller Gerätestatus: <b>", "</b>");
	$ret["salzburg"][$model] = $state;
	 
	$model = search("Modell: <b>", "</b>");
	$state = search("Aktueller Gerätestatus: <b>", "</b>");
	$ret["wien"][$model] = $state;
	 
	$model = search("Modell: <b>", "</b>");
	$state = search("Aktueller Gerätestatus: <b>", "</b>");
	$ret["wien"][$model] = $state;
	 
	$model = search("Modell: <b>", "</b>");
	$state = search("Aktueller Gerätestatus: <b>", "</b>");
	$ret["wien"][$model] = $state;
	 
	$model = search("Modell: <b>", "</b>");
	$state = search("Aktueller Gerätestatus: <b>", "</b>");
	$ret["salzburg"][$model] = $state;
	 
	$model = search("Modell: <b>", "</b>");
	$state = search("Aktueller Gerätestatus: <b>", "</b>");
	$ret["wien"][$model] = $state;
	 
	$model = search("Modell: <b>", "</b>");
	$state = search("Aktueller Gerätestatus: <b>", "</b>");
	$ret["salzburg"][$model] = $state;
	 

	$model = search("Modell: <b>", "</b>");
	$state = search("Aktueller Gerätestatus: <b>", "</b>");
	$ret["wien"][$model] = $state;

	$model = search("Modell: <b>", "</b>");
	$state = search("Aktueller Gerätestatus: <b>", "</b>");
	$ret["salzburg"][$model] = $state;

	$rets[]=$ret;
	}

	file_put_contents("auswertung.json", json_encode($rets));

?>
