<?php
/*
session_start();
if(isset($_SESSION['username']))
{ 
    echo "ciaooo";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL , "localhost/hw1/elaborapreferiti.php");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    
    if($result ===false)
    echo "errore".curl_error($result);
    
    $risultato=json_decode($result,true);
    
    curl_close($curl);
}else{
    $newpage="error.php";
    header('Refresh: 2	; url=' . $newpage);
}
/*/

  // App key
  $client_id =     "d4c860fba30d49e5ad6cce24a046379b";
  $client_secret = "5174c572bd624d8588ce342797b766a4";
  
    $test=$_GET["testo"];
  // Richiesta token
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, "https://accounts.spotify.com/api/token");
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
  $headers = array("Authorization: Basic ".base64_encode($client_id.":".$client_secret));
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  //echo $result."<br>";
  //echo "<pre>";
  //print_r(json_decode($result));
  //echo "</pre>";
  curl_close($curl);
  
  // Utilizzo
  $token = json_decode($result)->access_token;
  $data = http_build_query(array("q" => "$test", "type" => "album"));
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, "https://api.spotify.com/v1/search?".$data);
  $headers = array("Authorization: Bearer ".$token);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $resulta = curl_exec($curl);
 //$json= json_encode ($resulta,true);
 //print_r($json) ; 
  echo $resulta;
  curl_close($curl);

?>