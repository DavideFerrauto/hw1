<?php 
   
    include "config.php";
    $conn=connetti();
    session_start();
    if(!isset($_SESSION['username'])) exit;
    
   

    $idutente =  $_SESSION["idutente"];

    
   $query = "SELECT tblibro.* FROM tblibro inner join tblike on tblibro.id=tblike.idlibro where tblike.iduser=$idutente ";
    
    $res = mysqli_query($conn, $query) or die ('Unable to execute query. '. mysqli_error($conn));


        if (mysqli_num_rows($res) > 0) {

                $eventi=array();
                while($row = mysqli_fetch_assoc($res))
                {
                    
                    $eventi[] = $row;
                }

               


                //echo json_encode(array('h1'=>$js));
                echo json_encode($eventi);

                mysqli_free_result($res);
                mysqli_close($conn);

        }else
         echo json_encode(array('ok' => false));
?>