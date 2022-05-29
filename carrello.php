

 <?php
      session_start();
        if(isset($_SESSION['username']))
        {
    ?>




<html>

<head>
  <meta charset="utf-8">
  <title>Preferiti</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Pangolin:400,700|Proxima+Nova" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="provided-style.css"/>
  <script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js "></script>
  <script src="scriptcarrello.js" defer></script>   
  

</head>

<body>
  <article>
    <header>
        <h1>LIBRONLINE</h1>
        <div>
        <a href="index.php"><img src="images/home.png" /></a>
          
        </div>
    </header>
    <h1>Il carrello di  <?php echo $_SESSION["username"]; ?>    </h1>

    <section class="container">

        


  </section>

   

    

    <!--  -------------------------------->

  </article>
</body>
</html>

<?php
}
else{
    $newpage="error.php";
 header('Refresh: 2	; url=' . $newpage);
}
?>