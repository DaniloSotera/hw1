<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        exit;
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel='shortcut icon' href='https://enjoytroina.it/wp-content/uploads/2017/04/favicon-enjoy-troina.png' />
    <link rel="stylesheet" href="comune.css">
    <script src="comune.js?ts=<?=time()?>&quot" defer></script>
    <script src="user.js?ts=<?=time()?>&quot" defer></script>
    <link rel="stylesheet" href="user.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header id= "header_mio">
            <div id="overlay"></div>
            <nav>
                    <div id="links"><!--  gli href devono puntare a nuove pagine HTML -->
                        <a href="https://www.facebook.com/enjoytroina/"><img  src="../hw1/imgm/enjoy_logo.png" alt=""></a>
                        <div id="container_button">
                            <button id="nav_button_home"><img src="../hw1/imgm/fi-rr-home.svg" alt=""></button>
                            <button id="nav_button_phone"><img src="../hw1/imgm/fi-rr-phone-call.svg" alt=""></button>           
                            <!-- rimuovere bottone marker su css -->
                            <button id="nav_button_user"><img src="../hw1/imgm/fi-rr-user.svg" alt=""></button>
                            <button id="nav_button_logout"><img src="../hw1/imgm/fi-rr-sign-out-alt.svg" alt=""></button> 
                        </div>
                        <div id="menu">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>     
            </nav>
            <div>
                <h1>Profilo di <?php echo $_SESSION['username']; ?></h1>
                
            </div>
    </header>
    <h1>Preferiti</h1>
    <label>
      Titolo festa:
      <input type="text" autocomplete="off" id="keyword" name="keyword" required > 
    </label>
    <label>
      </select>
    </label>
    <button id ="ricerca">Cerca</button>
    <div id="box_grande"></div>
</body>
<footer id="footer_mio">
    <div class="container">
        <a href="http://localhost/hw1/home.php#presentazione_eventi">Esplora le Feste del Nostro Incantevole Paese</a>
    <ul class="festivals">
    </ul>
    <div class="social-media">
        <a href="https://www.facebook.com/enjoytroina/"><img src="../hw1/imgm/facebook.png" alt=""></a>
        <a href="https://www.instagram.com/enjoytroina/"><img src="../hw1/imgm/instagram.png" alt=""></a>
        <a href="https://www.youtube.com/channel/UCo6Rz8q5qQXq1hFLNpYQb-A"><img src="../hw1/imgm/youtube.png" alt=""></a>
    </div>
  </div>
    </footer>
</html>