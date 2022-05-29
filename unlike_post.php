<?php 
    /*******************************************************
        Aggiunge un like dall'utente loggato
    ********************************************************/
    include "config.php";
    $conn=connetti();
    session_start();
    if(!isset($_SESSION['username'])) exit;
    
   
    $user=$_SESSION["idutente"];
    $idlibro = mysqli_real_escape_string($conn, $_POST["idlibro"]);

    // Aggiungo un'entry ai like
    $in_query = "DELETE FROM tblike WHERE iduser='$user' AND idlibro =' $idlibro'";
    // Si attiva il trigger che aggiorna il numero di likes
    // Prendo il nuovo numero di like
    $out_query = "SELECT id,likes FROM tblibro WHERE id = $idlibro ";

    $ris = mysqli_query($conn, $in_query) or die ('Unable to execute query. '. mysqli_error($conn));

    if ($ris) {

        $res = mysqli_query($conn, $out_query);

        if (mysqli_num_rows($res) > 0) {

            $entry = mysqli_fetch_assoc($res);

            $returndata = array('ok' => true, 'nlikes' => $entry['likes'],'id' => $entry['id']);

            echo json_encode($returndata);

            mysqli_close($conn);

            exit;

        }
    }

    mysqli_close($conn);
    echo json_encode(array('ok' => false));
?>