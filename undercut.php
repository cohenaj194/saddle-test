<?php

	if (!empty($_POST['seller_id'])) {
		$seller_id = $_POST['seller_id'];
	}

	if (!empty($_POST['server'])) {
		$server = $_POST['server'];
	}

	if (!empty($_POST['db'])) {
		$db = filter_var($_POST['db'], FILTER_VALIDATE_BOOLEAN);
	}

$url = "http://api.saddlebag.exchange:5000/api/undercut/";

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
    'seller_id' => $seller_id,
    'server' => $server,
    'db' => $db
);

curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

$resp = curl_exec($curl);
curl_close($curl);

echo $resp;

?>