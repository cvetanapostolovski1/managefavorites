<?php
	require('db.php');

		$query = "SELECT * FROM favorites WHERE user_id=1";

        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
		
		
		$allCountryCodes = array();

		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
			$allCountryCodes[$row['country_id']]['id'] = $row['id'];
			$allCountryCodes[$row['country_id']]['created_at'] = $row['created_at'];
			$allCountryCodes[$row['country_id']]['description'] = $row['description'];
			$allCountryCodes[$row['country_id']]['name'] = " ";
			$allCountryCodes[$row['country_id']]['region'] = " ";
			$allCountryCodes[$row['country_id']]['population'] = " ";
		  }
		}

		if(!empty($allCountryCodes)){
			
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://restcountries.com/v3.1/alpha?codes=".implode(",",array_keys($allCountryCodes)),
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

			$response = json_decode($response,1);
			
			foreach ($response as $res){
				if(array_key_exists($res['ccn3'],$allCountryCodes)){
					$allCountryCodes[$res['ccn3']]['name'] = $res['name']['official'];
					$allCountryCodes[$res['ccn3']]['region'] = $res['region'];
					$allCountryCodes[$res['ccn3']]['population'] = $res['population'];
				}
			}

			echo json_encode(array_values($allCountryCodes));
		}
?>