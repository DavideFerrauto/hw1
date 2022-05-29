<?php
include "config.php";
if(isset($_POST['username']) && isset($_POST['password']))
{
    $conn=connetti();
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $query="SELECT id,username,password FROM tbutente WHERE username='$username'" ;
    $res=mysqli_query($conn,$query);
    
    if(mysqli_num_rows($res) > 0 )//uguale a 1
    {
     
        $entry= mysqli_fetch_assoc($res);
        //adesso verifica della password
        
       // if($password == $entry['password']) //per le password in chiaro
        if(password_verify($_POST['password'],$entry['password']))
        {
        //    echo "pass";
        session_start();
        $_SESSION['username']= $username;
        $_SESSION["idutente"] = $entry['id'];
        //reindirizzare verso la home
        header('Location: index.php'); 
        

        mysqli_free_result($res);
        mysqli_close($conn);
        exit; 
        }
    }
    $error = "Username e/o password errati.";
  }
  else if (isset($_POST["username"]) || isset($_POST["password"])) {
      // Se solo uno dei due è impostato
      $error = "Inserisci username e password.";
  }


?>



<html>

  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <link rel="stylesheet" href="reg.css"/>
    <link rel="stylesheet" href="style.css"/>
    <link rel="shortcut icon" href="#">
    

  </head>

    <body>
    <article>
    <section id="container">
    <div id="logo">
    <span><img src="images/logo.jpg" /></span>
    <span><h1>LIBRONLINE</h1></span>
    </div>
   <h2>Login</h2>
             <?php
                // Verifica la presenza di errori
                if (isset($error)) {
                    echo "<span class='error'>$error</span>";
                }
                
              ?>
    <main>
    <form action="login.php" method="post">
    

<label>Username<input type="text" name="username" ></label>

<label>Password<input type="password" name="password" ></label>

<input type="submit" name="invio" value="Accedi">
<br>
<a href="registrazione.php" class="login">Registrati</a>
<br>
<a href="index.php" class="login">Torna alla home</a>

</form>

</main>
    </section>


    </article>
    </body>


</html>

