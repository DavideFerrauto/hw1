<?php 
    /*******************************************************
        Aggiunge un libro al carrello
    ********************************************************/
    include "config.php";
    $conn=connetti();
    session_start();
    if(!isset($_SESSION['username'])) exit;
    
   

    $idlibro = mysqli_real_escape_string($conn, $_POST["idlibro"]);

    
    $in_query = "INSERT INTO tbordine (id,iduser, idlibro) VALUES(null,$_SESSION[idutente] , $idlibro)";
   

    $res = mysqli_query($conn, $in_query) or die ('Unable to execute query. '. mysqli_error($conn));

    if ($res) {
            $returndata = array('ok' => true);

            echo json_encode($returndata);

            mysqli_close($conn);

            exit;

        
    }

    mysqli_close($conn);
    echo json_encode(array('ok' => false));
?>