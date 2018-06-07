<?php

$id = isset($_GET['propinsi']) ? $_GET['propinsi'] : '-';
$url = "https://api.rajaongkir.com/starter/city?province=$id";
$api_key 	= "f6545682e50327c124a022af77c4319d";
$method 	= "GET";

$curl 	= curl_init();
curl_setopt_array($curl, array(
	CURLOPT_URL 			=> $url, //berubah
	CURLOPT_RETURNTRANSFER 	=> true,
	CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST 	=> $method, //berubah
	CURLOPT_HTTPHEADER 		=> array("key: $api_key")
	)
);

$response 	= curl_exec($curl);
$err 		= curl_error($curl);

curl_close($curl);

if ($err) {
	exit("cURL Error #:" . $err);
}

?>

	<?php 
		$kota = json_decode($response); 	//object
		$rajaongkir = $kota->rajaongkir; 	//object
		$status = $rajaongkir->status;			//object
		
		if($status->code == 200){
			$results = $rajaongkir->results; 	//array
			for($i=0;$i<count($results);$i++){
				$itemKota = $results[$i];	//object
				
				echo '
					<option value="'.$itemKota->city_id.'">
						'.$itemKota->city_name.'</option>
				';
			}
		}
		else{
			echo '<option value="'.$status->description.'</option>';
		}
	?>














