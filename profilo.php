<?php
include "config.php";
$conn=connetti();
session_start();
if(!isset($_SESSION['username']))
{
 header('Location:registrazione.php');
}else{
$final="SELECT * FROM tbutente where username='".$_SESSION['username']."'";
$tot=mysqli_query($conn,$final);
$ris=mysqli_fetch_array($tot);


//chiudere parentesi else**************************
?>





<html>

  <head>
    <meta charset="utf-8">
    <title>Profilo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <link rel="stylesheet" href="reg.css"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="shortcut icon" href="#">
    <script src="profil.js" defer></script>

  </head>

    <body>
    <article>
    <section id="container">
    <div id="logo">
    <span><img src="images/logo.jpg" /></span>
    <span><h1>LIBRONLINE</h1></span>
    </div>
   <h2>Informazioni personali</h2>
    <main id="profilo">
        
    
    
<label>Nome<input type="text" name="nome" value= <?php echo $ris['nome']; ?>   disabled></label>
<label>Cognome<input type="text" name="cognome"  value=<?php echo $ris['cognome']; ?> disabled></label>
<label>Username<input type="text" name="username"  value=<?php echo $ris['username']; ?> disabled></label>
<label>Email<input type="text" name="email"  value=<?php echo $ris['email']; ?> disabled></label>
<label>sesso<input type="text" name="sesso"  value=<?php echo $ris['sesso']; } ?> disabled></label>
<label>Password<input type="password" id="password"  value=<?php echo $ris['password']; ?> disabled></label>
<button id="mostra">Mostra password</button>

<br><br>
<a href="index.php" class="login">Torna alla home</a>



</main>
    </section>


    </article>
    </body>


</html>

