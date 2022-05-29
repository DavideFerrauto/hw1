<?php 
    /*******************************************************
        Ritorna i like relativi a un post
    ********************************************************/
   
    include "config.php";
    $conn=connetti();
    session_start();
    if(isset($_SESSION['username']))
    {
   
        header('Content-Type: application/json');
       // $idlibro = mysqli_real_escape_string($conn, $_POST["idlibro"]);
    // Prendo tutti gli utenti che hanno messo like a quel post
    $query = " SELECT idlibro FROM tblike WHERE iduser= $_SESSION[idutente]  ";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
    // Creo l'array che conterrà i miei risultati
    $likesArray = array();
    $likesArray[] = array('connesso' =>true);
    if (mysqli_num_rows($res) > 0) {
        // Se ci sono risultati, li scorro e riempio l'array che ritornerò al frontend
        while($entry = mysqli_fetch_assoc($res)) {
                $likesArray[] = array('connesso' =>true ,'libro' => $entry['idlibro'] );
        }
    }
    mysqli_close($conn);
    echo json_encode($likesArray);
    }else
    echo json_encode("{}");
    
    exit;
?>