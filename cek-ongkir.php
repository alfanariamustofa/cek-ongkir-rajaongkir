<?php

$berat = isset($_GET['berat']) ? $_GET['berat'] : '-';
$asal = isset($_GET['asal']) ? $_GET['asal'] : '-';
$tujuan = isset($_GET['tujuan']) ? $_GET['tujuan'] : '-';


$url 		= "https://api.rajaongkir.com/starter/cost";
$api_key 	= "f6545682e50327c124a022af77c4319d";
$method 	= "POST";

$curl 	= curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL 			=> $url, //berubah
	CURLOPT_RETURNTRANSFER 	=> true,
	CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST 	=> $method, //berubah
	CURLOPT_POSTFIELDS => "origin=$asal&destination=$tujuan&weight=$berat&courier=pos",
	CURLOPT_HTTPHEADER 		=> array(
		"key: $api_key",
		"content-type: application/x-www-form-urlencoded"
		)
	)
);

$response 	= curl_exec($curl);
$err 		= curl_error($curl);

curl_close($curl);

if ($err) {
	exit("kosong");
}

echo $response;
echo '<br>
	<button onclick="kembali()">KEMBALI</button>';

?>












