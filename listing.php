<?php

$item_id = filter_var($_POST['item_id'], FILTER_VALIDATE_INT);
$home_server = $_POST['home_server'];
$initial_days = filter_var($_POST['initial_days'], FILTER_VALIDATE_INT);
$end_days = filter_var($_POST['end_days'], FILTER_VALIDATE_INT);

$days_range = [$initial_days, $end_days];
	
$url = "http://api.saddlebag.exchange:5000/api/listing/";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
	"Accept: application/json",
    "Content-Type: application/json"
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

// The data to send to the API
$data = array(
    'item_id' => $item_id,
    'home_server' => $home_server,
    'days_range' => $days_range
);

curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

$resp = curl_exec($curl);
curl_close($curl);

echo $resp;

?>