<?php
	require('db.php');
	$res = array();

	if(isset($_POST['user_id']) and isset($_POST['country_id'])){

		$checkIfExist = "SELECT * FROM favorites WHERE user_id='".$_POST['user_id']."' AND country_id='".$_POST['country_id']."'";

        $result = mysqli_query($con, $checkIfExist) or die(mysql_error());
        $rows = mysqli_num_rows($result);

        if ($rows > 0) {
			$res['message'] = 'This country is already added' ;
		}else{
			$query = "INSERT into favorites (user_id, country_id,created_at) VALUES ('".$_POST['user_id']."', '" . $_POST['country_id'] . "','".date("Y-m-d")."')";
			$result = mysqli_query($con, $query);
			$last_id = mysqli_insert_id($con);

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://restcountries.com/v3.1/alpha/".$_POST['country_id'],
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
				"cache-control: no-cache"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
				$response = json_decode($response,1);
			
				$res['id'] = $last_id;
				$res['name'] = $response[0]['name']['official'];
				$res['region'] = $response[0]['region'];
				$res['population'] = $response[0]['population'];
				$res['ccn3'] = $response[0]['ccn3'];
				$res['created_at'] = date('Y-m-d');
				$res['description'] = "";
				$res['message'] = 'Successfull added '.$res['name'].' in favorites countries';

			}
		}
		echo json_encode($res);
	}


?>