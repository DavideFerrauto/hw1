<html>

  <head>
    <meta charset="utf-8">
    <title>Libronline</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <link rel="stylesheet" href="style.css"/>
    <link rel="shortcut icon" href="#">
    <script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js "></script>
    <script src="script.js" defer></script>
    
    
  </head>

  <body>
      <?php
      session_start();
        if(!isset($_SESSION['username']))
        {
    ?>

    <nav>
        <div id="links">
        <a href="index.php"><img src="images/home.png" /></a>
        <a href="registrazione.php">Profilo</a>
        <a href="error.php">Carrello</a>
        <a href="error.php">Ricerca</a>
        <div id="login">
            <a href="login.php"><img src="images/omino.png" /> </a>
           <a href="login.php">Login</a>
           <a href="registrazione.php">Registrati qui</a>   
        </div>
        </div>
        
    </nav>

    <?php
        }else{
        

        
    ?>
  
     <nav>
        <div id="links">
        <a href="index.php"><img src="images/home.png" /></a>
        <a href="profilo.php">Profilo</a>
        <a href="carrello.php">Carrello</a>
        <a href="ricerca.php">Ricerca</a>
        <div id="login">
            
           <a id="saluto">Benvenuto <?php echo $_SESSION['username']; echo "<br>";  echo date('d-m-y'); ?> </a>
           <a href="logout.php">Logout</a>   
        </div>
        </div>
        
    </nav>

            <?php

            }
            ?>
    <article>

      <div id="logo">
        <span><img src="images/logo.jpg"/></span>
        <span><h1>LIBRONLINE</h1></span>
      </div>
      <section class="intro">

        
        <div>
          <button id="gen1">Genere 1</button>
          <button id="gen2">Genere 2</button>
          <button id="gen3">Genere 3</button>

        </div>
        
      </section>

     
      <section class="container">

        


      </section>

    </article>
    

    <footer>
        <div id="info">
            <div>Davide Ferrauto</div>
            <div>1000002819</div>
            <div>Università degli studi di Catania</div>
            <div><img src="images/unict.png"   /></div>
        </div>
       
    </footer>   
  </body>
 
</html>


