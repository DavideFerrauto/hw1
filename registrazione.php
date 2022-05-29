<?php
include "config.php";

if(!empty($_POST['username']) && !empty($_POST['nome']) && !empty($_POST['cognome']) && !empty($_POST['password']) &&
!empty($_POST['confermapassword']) && !empty($_POST['email']) && !empty($_POST['genere']) && !empty($_POST['autorizzo']))
{
  $conn=connetti();  
  $error=array();
  if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/',$_POST['username']))
  {
      $error[]="Username non valido";
  }else{
      //validazione lato server username
      //username non presente sul database
      $username=mysqli_real_escape_string($conn,$_POST["username"]);
      $query="SELECT username FROM tbutente WHERE username='". $username."' ";
      $res=mysqli_query($conn,$query);
      if(mysqli_num_rows($res)>0)
      {
          $error[]="Username già esistente"; 
      }
      
    }
    if(strlen($_POST['password']) < 8 )
{
    $error[]="Caratteri password non sufficienti";
}

if (strcmp($_POST["password"], $_POST["confermapassword"]) != 0) {
  $error[] = "Le password non coincidono";
}

// validazione email tramite filtri(@ , .)
if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)  )
{
    $error[]="Email non valida";
}else {
  $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
  $res = mysqli_query($conn, "SELECT email FROM tbutente WHERE email = '$email'");
  if (mysqli_num_rows($res) > 0) {
      $error[] = "Email già utilizzata";
  }
}

//print_r($error);


if(count($error) == 0)
{
    //echo "dentro";
    $name=mysqli_real_escape_string($conn,$_POST['nome']);
    $cognome=mysqli_real_escape_string($conn,$_POST['cognome']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $password = password_hash($password, PASSWORD_BCRYPT);
    
    $sesso=$_POST['genere'];


    //inserimento database
    $query="INSERT INTO tbutente(id, nome, cognome, username, email, password, sesso) 
    VALUES(NULL,'$name','$cognome','$username','$email','$password','$sesso' )";
    //echo "fuori query";
    if( mysqli_query($conn,$query))
    {
      //  echo "registrato";
        //utente registrato
        //variabile di sessione perche rimane loggato
        session_start();
        $_SESSION['username']= $username;
        $_SESSION["idutente"] = mysqli_insert_id($conn);
        //reindirizzare verso la home
        header('Location: index.php'); 
        mysqli_close($conn);
        exit;
    }

}


}







?>





<html>

  <head>
    <meta charset="utf-8">
    <title>Registrazione</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <link rel="stylesheet" href="reg.css"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="shortcut icon" href="#">
    <script src="regi.js" defer></script>

  </head>

    <body>
    <article>
    <section id="container">
    <div id="logo">
    <span><img src="images/logo.jpg" /></span>
    <span><h1>LIBRONLINE</h1></span>
    </div>
   <h2>Presentati</h2>

   <span class="error"></span>
    <main>
        
    <form action="registrazione.php" method="post">
    
<label for="nome">Nome<input type="text" name="nome" ></label>
      
<label for="cognome">Cognome<input type="text" name="cognome" ></label>
<label for="username">Username<input type="text" name="username" ></label>
<label for="email">Email<input type="text" name="email" ></label>
<label for="password">Password<input type="password" name="password" ></label>
<label for="confermapassword">Conferma Password<input type="password" name="confermapassword" ></label>

<input type="radio" name="genere" value="maschio">maschio
<input type="radio" name="genere" value="femmina">femmina

<br>
<input type="checkbox" name="autorizzo" value="1" >Acconsento all'utilizzo dei dati

<br><br>
<input id="btn" type="submit" name="invio" value="Registrati" disabled>
<br>
<a href="login.php" class="login">Hai già un account?Accedi</a>
<br>
<a href="index.php" class="login">Torna alla home</a>

</form>

</main>
    </section>


    </article>
    </body>


</html>

