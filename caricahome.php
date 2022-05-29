<?php
include "config.php";
$conn=connetti();
 $g=$_GET["genere"];
$q="Select * from tblibro where genere=$g ";
$dati=mysqli_query($conn,$q);

$eventi=array();
while($row = mysqli_fetch_assoc($dati))
{
    
      $eventi[] = $row;
}

mysqli_free_result($dati);
mysqli_close($conn);


//echo json_encode(array('h1'=>$js));
echo json_encode($eventi);


?>