<?php 

function getAccessTokenFromIsams(){
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://developerdemo.isams.cloud/auth/connect/token',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10, 
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => 'client_id=86D5CC72-AFF1-42D0-BABF-6642B641A2BE&client_secret=DC6438EF-DF8E-449F-928E-E45C5849EF53&grant_type=client_credentials&scope=restapi',
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/x-www-form-urlencoded'
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl);  
  return $response;
}


$response = json_decode(getAccessTokenFromIsams());
$access_token = $response->access_token;
echo $access_token;
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://developerdemo.isams.cloud/api/students/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10, 
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_POSTFIELDS => 'key=adad',
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json',
      'Authorization: Bearer '.$access_token
    ),
  ));

  $response = curl_exec($curl);

  curl_close($curl); 
  //$response = json_decode($response);
  echo "<pre>";
  print_r(json_decode($response));
 ?>
