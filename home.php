<?php 
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        exit;
    }
?>

<html>
<head>
    <title>Festino di San Silvestro Troina</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel='shortcut icon' href='https://enjoytroina.it/wp-content/uploads/2017/04/favicon-enjoy-troina.png' />
    <title>Festino di San Silvestro Troina &#8211; Enjoy Troina &#8211; Sito Turistico Ufficiale della Città di Troina</title>
    <link rel="stylesheet" type="text/css"  href="home.css">
    <script src="hw1.js?ts=<?=time()?>&quot" defer></script>
    <script src="comune.js?ts=<?=time()?>&quot" defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body id="body_mio">
    <header id="header_mio">
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
        <div id="header_2">
            <div> <img id = "header_foto_santo" src="../hw1/imgm/San-Silvestro-without-bg.png" alt=""></div>
            <div id="container_logo"> <img id="header_foto_scritta" src="../hw1/imgm/logo.png" alt="">
                <div class="container_info">
                    <img src="../hw1/imgm/fi-rr-calendar.png" alt="">
                    <p>dal 19/05 al 12/06</p>
                </div>
                <div class="container_info">
                    <img src="../hw1/imgm/fi-rr-smile.png" alt="">
                    <p>Ingresso libero</p>
                </div>
                
            </div>
        </div>
    </header>
    </div>
    <section id="section_mio">
        <div id="presentazione">
            <div>
                <h1>Il cammino dell'alloro</h1>
                <p>l'esperienza votiva fra i sentieri del bosco, alla scoperta delle tradizioni e di sé stessi. </p>
            </div>
            <div>
                <h1>Un tuffo nella vita arcaica</h1>
                <p>in simbiosi con i simboli della vita e della rinascita, rinnovando il rito che da secoli si ripete.</p>
            </div>
            <div>
                <h1>Percorrendo le orme di Silvestro</h1>
                <p>che abbandona la vita conventuale per ritirarsi in eremitaggio nel bosco.</p>
            </div>
        </div>
        <div id="div_nero">
            <div id="contenitore_scritte">
                <div><p>
                    Il culto del Santo, ben tramandato dalle tradizioni orali è ricco di miti che sconfinano ben oltre la storia cristiana chiamando in causa il “bosco” e i riti pagani sacri alle divinità. In questo contesto di selve selvagge trova spazio la leggenda aurea del Monaco, della luce divina che attira due giovani cacciatori alla scoperta della salma ancora intatta in una grotta.
                    </p></div>
                <div><p class="scritta_giallo_speciale">
                    Livata balata di ddu statu: un monucu già mortu accumparìa, chistu è Silvestru trapassatu gridaru, di l’oduri ca facia! (Intrallazzata di San Silvestro)
                </p></div>
                <div><p>
                    Con il ritrovamento del corpo si compie il Mistero che ogni anno, in primavera, si manifesta con il Festino a lui dedicato, una terna simbolica volta a stupire fedeli e visitatori.
                </p></div>
            </div>
            <div>
                <div id="blocco_rosso"></div>
                <div id="foto_b_n"> <img src="../hw1/imgm/b_n.jpg" alt="">
                 <audio id="myAudio">
                    <source src="../hw1/imgm/tamburi.mp3" type="audio/mpeg">
                </audio>
                </div>
                <div id="blocco_giallo">
                <button id="tamburi"><img src="../hw1/imgm/drum.png" alt=""></button>
               
                </div>
            </div>
        </div>
        <div id="presentazione_premi">
                <div>
                    <h1>Tra i "Borghi più Belli d'Italia"</h1>
                    <img src="../hw1/imgm/1.png" alt="">
                    <p>Antico borgo medievale di montagna da cui è possibile ammirare l'Etna e i Nebrodi </p>
                </div>
                <div>
                    <h1>Alle pendici del Parco dei Nebrodi </h1>
                    <img src="../hw1/imgm/2.png" alt="">
                    <p>nei cui boschi si recano i pellegrini di San Silvestro per raccogliere ramoscelli di alloro ed onorare il Santo </p>
                </div>
                <div>
                    <h1>Ricca di storia e di cultura </h1>
                    <img src="../hw1/imgm/3.png" alt="">
                    <p>che narra dei primi insediamenti preistorici, della dominazione normanna, della drammaticità della guerra </p>
                </div>
        </div>
        <div id="presentazione_eventi">
                <section id="modal-view" class="hidden">
                    <div id="window"></div>
                </section>
        </div>
    </section>
    <footer id="footer_mio">
    <div class="container">
    <p>Esplora le Feste del Nostro Incantevole Paese</p>
    <ul class="festivals">
    </ul>
    <div class="social-media">
        <a href="https://www.facebook.com/enjoytroina/"><img src="../hw1/imgm/facebook.png" alt=""></a>
        <a href="https://www.instagram.com/enjoytroina/"><img src="../hw1/imgm/instagram.png" alt=""></a>
        <a href="https://www.youtube.com/channel/UCo6Rz8q5qQXq1hFLNpYQb-A"><img src="../hw1/imgm/youtube.png" alt=""></a>
    </div>
  </div>
    </footer>
</body>
</html>
