<?php
	$query = $_GET['search'];
	$key = "AIzaSyB5y1hQzacJB0GnhGc8udgPKNiPd434KuA";
	$cx = "003049107446002617233:qsw352odsxb";
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/customsearch/v1?key='.$key.'&cx='.$cx.'&q='.$query);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, True);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
	$result = curl_exec($curl);

	$p = "$query.json";
	if (!file_exists($p)){
		file_put_contents($p, $result);
		$json = file_get_contents($p);
		print $json;
	}else {
		$myfile = fopen($p,"r");
		echo fread($myfile, filesize($p));
	}
  ?>
