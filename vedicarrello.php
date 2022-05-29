<?php 
    /*******************************************************
        Ritorna i like relativi a un post
    ********************************************************/
   
    include "config.php";
    $conn=connetti();
    session_start();
    if(isset($_SESSION['username']))
    {
   
        
    $query = " select tbordine.id as idordine,tblibro.* from tblibro inner join tbordine on tblibro.id=tbordine.idlibro where tbordine.iduser= $_SESSION[idutente]  ";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
    // Creo l'array che conterrà i miei risultati
    $likesArray = array();
    if (mysqli_num_rows($res) > 0) {
        // Se ci sono risultati, li scorro e riempio l'array che ritornerò al frontend
        while($entry = mysqli_fetch_assoc($res)) {
                $likesArray[] = $entry;
        }
    }
    mysqli_close($conn);
    echo json_encode($likesArray);
    }else
    echo json_encode("{}");
    
    exit;
?>