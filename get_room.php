<?php
declare(strict_types = 1);

require('Models/Room.php');
require('helper.php');

$room_id = (int)($_GET['room_id'] ?? 0);
$room = findRoomById($room_id);

if($room === null){
	header("Location: 404.html");
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <link rel="stylesheet" href="https://domenc-m.github.io/hackaton_team_1/src/assets/css/reset.css">
  <link rel="stylesheet" href="https://domenc-m.github.io/hackaton_team_1/src/assets/css/style.css">
  <link rel="stylesheet" href="https://domenc-m.github.io/hackaton_team_1/src/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://domenc-m.github.io/hackaton_team_1/src/assets/lib/fontawesome-free-5.15.4-web/css/all.min.css">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>Le Hangar Game</title>
</head>

<body>

      <div class="burgerMenue" id="menuBurger">
        <div></div>
        <div></div>
        <div></div>
      </div>

      <!-- here we got the nav -->

      <nav>

        <div class="logo">
          <a href="index.html"><img src="https://domenc-m.github.io/hackaton_team_1/src/assets/img/logo_png.png" alt="Logo Hangar Game"></a>
        </div>

        <!-- this is for the burger menu for close the nav -->

        <div class="navContainer">
          <div id="close">
            <div class="closeContainer">
              <div class="left"></div>
              <div class="right"></div>
            </div>
          </div>

          <ul class="nav">
            <li><a class="relative" href="./squid-game.html" class="newRoom">Squid Game <div class="new">New</div></a></li>
            <li id="rooms"> Rooms 
              <ul class="under">
                <li><a href="./chateau-ambulant.html">Le château ambulant</a></li>
                <li><a href="./sousterrains.html">Les sous terrains de Bordeaux</a></li>
                <li><a href="./chucky.html">Chucky</a></li>
                <li><a href="./squid-game.html">Squid Game</a></li>
              </ul>
            </li>

            <li><a href="reservation.html">Reservations</a></li>
            <li><a href="contact.html">Contact</a></li>
            <!-- thats differents thinks are only with the slide nave bare -->

            <li class="bigHide"><a href="contact.html">Nous trouver :</a></li>
            <li class="bigHide">
              <div class="facebook"><i class="fab fa-facebook-f"></i></div>
            </li>
            <li class="bigHide">
              <div class="twitch"><a target="_blank" href="https://www.twitch.tv/hangar_game"><i class="fab fa-twitch"></i></a></div>
            </li>
          </ul>

        </div>
      </nav>
    

  <main class="rooms">
    <h1><?= $room->getName(); ?></h1>
    <p class="roomDescription">Mince, Hauru s’est fait capturer par l’armée.
      Vous devez le libérer mais malheureusement la porte est fermée. Trouver la clé pour utiliser la porte magique afin de libérer Hauru. Faite vous aider par Calcifer et épouvantail enchanté. Mais attention de ne pas vous tromper car chaque erreur commise rapproche la Sorcière des Landes du château.
    </p>
    <div class="roomMainFlex">
      <div class="video">
        <iframe src="https://www.youtube.com/embed/XDzvVBk2PIg" title="YouTube video player" frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen></iframe>
      </div>

        <div class="infosSalles">
          <div class=" infoPeople">
            <div class="littleImage">
              <img src="assets/img/icone_groupe.svg" alt="">
            </div>
            <p>4-12 joueurs</p>
          </div>
          <div class=" infoTime">
            <div class="littleImage">
              <img src="assets/img/icone_horloge.svg" alt="">
            </div>
            <p>70 minutes</p>
          </div>
        </div>
    </div>
    <button class="btn-reserv">
      <a class="">Reserver</a>
    </button>

  </main>

  <footer>
    <div class="navFooterContainer">
      <ul id="navFooter">
        <li><a href="squid-game.html">Rooms</a></li>
        <li><a href="reservation.html">Réservation</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="#">CGV-CGU</a></li>
        <li><a href="contact.html">Nous trouver</a></li>
      </ul>
    </div>
    <div class="logoFooterContainer">
      <img
        src="./assets/img/logo-png.png"
        id="logoFooter"
        alt="logo Hangar game"
      />
    </div>
    <ul id="logoReseau">
      <li>
        <a target="_blank" href="https://www.twitch.tv/hangar_game">
          <img src="https://domenc-m.github.io/hackaton_team_1/src/assets/img/logo_twitch.svg" alt="logo twitch" />
        </a>
      </li>
      <li>
        <img src="https://domenc-m.github.io/hackaton_team_1/src/assets/img/logo_facebook.svg" alt="logo facebook" />
      </li>
    </ul>
  </footer>
</body>
<script src="https://domenc-m.github.io/hackaton_team_1/src/assets/js/Nav.js">
</script>
<script src="https://domenc-m.github.io/hackaton_team_1/src/assets/js/bootstrap.min.js"></script>

</html>