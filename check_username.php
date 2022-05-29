<?php
require_once "config.php";

$conn=connetti();

$username=mysqli_real_escape_string($conn,$_GET['q']);
$query="SELECT username FROM tbutente WHERE username='$username'";

$res= mysqli_query($conn,$query);
if(mysqli_num_rows($res) > 0){
    $response= array('exists'=> true);

}else
$response= array('exists'=> false);

echo json_encode($response);

//echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));


mysqli_close($conn);

?>