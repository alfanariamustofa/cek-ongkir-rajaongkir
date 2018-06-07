<?php

$url 	= "https://api.rajaongkir.com/starter/province";
$api_key = "f6545682e50327c124a022af77c4319d";
$method = "GET";

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
		$propinsi = json_decode($response); 	//object
		$rajaongkir = $propinsi->rajaongkir; 	//object
		$status = $rajaongkir->status;			//object
		
		if($status->code == 200){
			$results = $rajaongkir->results; 	//array
			for($i=0;$i<count($results);$i++){
				$itemPropinsi = $results[$i];	//object
				
				echo '
					<option value="'.$itemPropinsi->province_id.'">'.$itemPropinsi->province.'</option>
				';
			}
		}
		else{
			echo '<option value="">'.$status->description.'</option>';
		}
	?>















