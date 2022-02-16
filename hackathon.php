<?php

declare(strict_types=1);

require('Models/Room.php');
require('Models/Schedule.php');

require('helper.php');

$rooms = getRoomsFromDB();

$schedules = getSchedulesFromDB();

$selected_room = 1;
$date = '2022-01-28';
$bookings = getBookingsByDateAndRoom($selected_room, $date);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Oserez-vous relever les mystères de Mysterio? De l’ambiance angoissante des sous-terrains de Bordeaux, à la frénésie meurtrière de Chucky en passant par la féérie du chateau ambulant, vous trouverez forcément l'escape room qui vous correspond! Découvrer notre nouvelle salle Star Wars, serez-vous capable de vous échapper des prisons de l'étoile noire?">
  <script src="https://kit.fontawesome.com/cedba16994.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://bonnetfrederic.github.io/hackaton-1/styles/style.css">
  <title>Mysterio Escape Game</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <header>
    <nav class="navbar">
      <div class="logo">
        <a href="#"><img class="icon" src="https://bonnetfrederic.github.io/hackaton-1/assets/img/logo-mysterio-bleu.svg" alt="Logo Mysterio bleu"></a>
      </div>
      <ul class="nav-list" id="navv">
        <li class="list-item"><a href="#apropos" class="underline">A propos</a></li>
        <li class="list-item"><a href="#roomsSection" class="underline">Nos rooms</a></li>
        <li class="list-item"><a href="#resaSection" class="underline">Réservations</a></li>
        <li class="list-item"><a href="#contact" class="underline">Contact</a></li>
      </ul>
      <button id="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </nav>
    <section id="apropos">
      <h1 class="title"> Oserez-vous relever les défis de <strong>MYSTERIO ?</strong></h1>
    </section>
  </header>
  <section id="star-wars">
    <div class="video-container">
      <iframe width="560" height="315" id="video" src="https://www.youtube.com/embed/OMh3cxaR9pg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </section>

  <section id="presentation" class="three-col">
    <div class="prez">
      <div class="card">
        <div class="circle">
          <img src="https://bonnetfrederic.github.io/hackaton-1/assets/img/mysterio-interrogation.svg" alt="POint d'interrogation">
        </div>
        <h2>Qui sommes nous ?</h2>
        <p>Nous sommes MYSTERIO, créateurs d'énigmes et d'aventures au travers d'<strong>ESCAPE GAME.</strong></p>
        <p>Arrivés sur Bordeaux près de la Cité des sciences depuis peu, nous vous offrons des expériences et des sensations uniques</p>
        <p>Nous sommes également certifiés <strong>ISO 27001.</strong></p>
      </div>
      <div class="card">
        <div class="circle">
          <img src="https://bonnetfrederic.github.io/hackaton-1/assets/img/mysterio-loupe.svg" alt="Loupe">
        </div>
        <h2>Quest-ce qu'un escape game ?</h2>
        <p>Un <strong>ESCAPE GAME </strong> est un jeu d'énigmes</p>
        <p> qui se vit en équipe.</p>
        <p>Les joueurs évoluent généralement dans un lieu clos et thématisé. Ils doivent résoudre une série de casses-têtes </p>
        <p>dans un temps imparti pour réussir à s'échapper ou à accomplir une mission.</p>
      </div>
      <div class="card">
        <div class="circle">
          <img src="https://bonnetfrederic.github.io/hackaton-1/assets/img/mysterio-raccon-family.svg" alt="Famille de raccoon">
        </div>
        <h2>A combien peut-on jouer ?</h2>
        <p>Nos salles sont prévues et optimisées pour des équipes de <strong>2</strong> à <strong>6 personnes</strong>, </p>
        <p> et <strong>12 en simultané.</strong></p>
        <p>Les enfants ayant moins de 18 ans </p>
        <p>doivent être accompagnées par un adulte.</p>
      </div>
    </div>
  </section>
  <main>
    <!-- <div class="macaron">
      <img src="https://bonnetfrederic.github.io/hackaton-1/assets/img/starwars.png" alt="image starwars">
    </div>   -->

    <section id="roomsSection">
      <div id="roomsContainer">
        <h2>Nos salles</h2>

        <?php

        foreach ($rooms as $room_key => $infos_room) {
        ?>
          <div id="roomCard4" class="roomCard">
            <div class="cardContent">
              <div class="cardTitle">
                <h3 class="roomTitle"><?= $infos_room['name']; ?></h3>
                <?= $infos_room['new'] ? '<span class="newRoom">Nouveauté !!!</span>' : ''; ?>
              </div>
              <p class="roomSynopsis">
                <span><?= $infos_room['description']; ?></span>
                <br><br>
                <span class="hiddenText">
                  Cette épreuve s'adresse aux Jedi aguerris et aux joueurs expérimentés.<br>
                  Toutefois libre à vous de tenter de défier l'Empire, la force saura vous guider !<br>
                  Accessible à tous.
                </span>
              </p>
              <div class="roomResaButton hiddenButton">réserver</div>
              <div class="cardInfos">
                <div class="gameTime">
                  <i class="fa-regular fa-clock"></i>
                  <span><?= $infos_room['duration']; ?> min</span>
                </div>
                <div class="gamePlayers">
                  <img src="https://bonnetfrederic.github.io/hackaton-1/assets/img/mysterio-raccon-family.svg" alt="icône mysterio raccoon family" width="20px" height="20px">
                  <span><?= $infos_room['min_player'] . ' - ' . $infos_room['max_player']; ?></span>
                </div>
                <div class="gameAge">
                  <span><?= $infos_room['age']; ?> ans</span>
                </div>
                <div class="gameLevel">
                  <span><?= $infos_room['niveau']; ?></span>
                </div>
              </div>
            </div>
            <div id="<?= $infos_room['img_css']; ?>" class="cardImage">
            </div>
          </div>

        <?php
        }
        ?>

      </div>
    </section>

    <section id="resaSection">
      <form action="booking.php" method="POST">
        <div id="resaContainer">
          <h2 id="resaTitle">Réservation</h2>
          <div id="resaInputs">
            <div class="flexColCenter" id="resaInputsRoom">
              <label for="room-select">Quelle salle ?</label>
              <select class="roundedInput" name="roomSelect" id="roomSelect">
                <?php
                foreach ($rooms as $room_key => $infos_room) {
                  echo '<option value="' . $room_key . '">' . $infos_room['name'] . '</option>';
                }
                ?>
              </select>
            </div>
            <div class="flexColCenter" id="resaInputsPlayers">
              <label for="players-number">Combien de personnes ?</label>
              <select class="roundedInput" name="playersNumber" id="playersNumber">
                <!-- <option value="">-- Nombre de joueurs --</option> -->
                <option value="2">2 -- 26€/pers</option>
                <option value="3">3 -- 26€/pers</option>
                <option value="4" selected>4 -- 26€/pers</option>
                <option value="5">5 -- 22€/pers</option>
                <option value="6">6 -- 22€/pers</option>
                <option value="7">7 -- 22€/pers</option>
                <option value="8">8 -- 22€/pers</option>
                <option value="9">9 -- 22€/pers</option>
                <option value="10">10 - 20€/pers</option>
                <option value="11">11 - 20€/pers</option>
                <option value="12">12 - 20€/pers</option>
              </select>
            </div>
            <div class="flexColCenter" id="resaInputsDate">
              <label for="game-date">Quand ?</label>
              <input class="roundedInput" type="date" name="bookingDate" id="resaGameDate" value="2022-01-28" min="2022-01-28" max="2022-12-31">
            </div>
          </div>
          <div id="resaAvailabilitiesAndNext">
            <div id="resaAvailabilities">
              <div id="resaAvailabilitiesTitle">Disponibilités</div>
              <div class="resaHourContainer">
                <input type="hidden" value="" name="bookingTime" id="bookingTime" />
                <div id="resaHoursContainer1">
                  <?php

                  for ($i = 0; $i < count($schedules); $i++) {
                  ?>
                    <div class="resaHourLine" id="resaHour<?= $schedules[$i]->getId(); ?>">
                      <span class="resaHour"><?= $schedules[$i]->getHeure(); ?></span>

                      <?php
                      if (in_array($schedules[$i]->getId(), $bookings)) {
                        echo '<span class="resaUnavailable">Complet</span>';
                      } else {
                        echo '<span class="resaAvailable" data-schedule-id="' . $schedules[$i]->getId() . '">Réserver</span>';
                      }
                      ?>


                    </div>
                  <?php

                    if ($i == 5) {
                      echo '</div>
						<div id="resaHoursContainer2">';
                    }
                  }
                  ?>
                  <div id="resaPreviousNextButtons">
                    <button id="resaPrev" class="resaPreviousDay">&#10094; Jour précedent</button>
                    <button id="resaNext" class="resaNextDay">Jour suivant &#10095;</button>
                  </div>

                </div>
              </div>
            </div>
            <div id="resaNextButton">SUIVANT &#10095;</div>

            <!-- The Resa-Recap Modal -->
            <div id="myModal" class="modal">
              <!-- Modal content -->
              <div class="modal-content">
                <span class="close">&times;</span>

                <div id="recapModalContainer">
                  <button id="btnReturnToResa">&#10094; Réservation</button>
                  <div id="recapModalContent">
                    <h3>Descriptif de la commande</h3>
                    <div id="resaRecapContent">
                      <p id="recapRoom"></p>
                      <p id="recapPlayers"></p>
                      <p id="recapDate"></p>
                    </div>
                    <h4>Quelques informations</h4>
                    <div id="name" class="flexColLeft">
                      <label for="recapFormName">Firstname</label>
                      <input type="text" name="customerFirstname" id="recapFormFirstname">
                    </div>
                    <div id="phone" class="flexColLeft">
                      <label for="recapFormPhone">Lastname</label>
                      <input type="text" name="customerLastname" id="recapFormLastname">
                    </div>
                    <div id="email" class="flexColLeft">
                      <label for="recapFormEmail">Mail</label>
                      <input type="email" name="customerEmail" id="recapFormEmail">
                    </div>
                  </div>

                  <input type="submit" value="Réserver" />
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
      </form>
    </section>
    <section id="contact">
      <h2>CONTACT</h2>
      <div class="contact-info">
        <div class="info">
          <img src="https://bonnetfrederic.github.io/hackaton-1/assets/img/map.png" alt="Google Map">
        </div>
        <div class="info">
          <h3>MYSTERIO ESCAPE GAME BORDEAUX</h3>
          <p>59 rue Lucien Faure Building </p>
          <p>33000 Bordeaux</p>
          <p>01 48 37 64 24</p>
          <p>contact@mysterioescapegame.com</p>
          <p>Du mardi au dimanche 10H00-23H00</p>
        </div>
      </div>
    </section>
  </main>
  </main>
  <script src="https://bonnetfrederic.github.io/hackaton-1/js/toggle.js"></script>
  <script src="js/index.js"></script>
  <footer>
    <div class="foot-nav">
      <div class="logo">
        <img class="secondary-icon" src="https://bonnetfrederic.github.io/hackaton-1/assets/img/logo blanc mysterio footer.svg" alt="Logo Mysterio blanc">
      </div>
      <div class="ft-c">
        <h4>COMMENT-NOUS TROUVER ?</h4>
        <p>59 rue Lucien Faure Building 33000 Bordeaux</p>
        <p>Tram B Cité du Vin</p>
        <p>Bus 7, 32 : Faure Balguerie</p>
      </div>
      <div class="ft-c">
        <h4>CONTACTEZ-NOUS :</h4>
        <p>01 48 37 64 24 </p>
        <p>contact@mysteriousescapegame.com</p>
        <p>Du Mardi au Dimanche : 10H00-23H00 </p>
      </div>
      <div class="ft-c">
        <h4 class="accent">SUIVEZ-NOUS : </h4>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="https://www.youtube.com/channel/UCLhK4WZ4DHh-gn-LsNf4JLA"><i class="fab fa-youtube"></i></a>
      </div>
    </div>
    <div class="mentions">
      <ul>
        <li>&copy;Mysterio Escape Game Bordeaux 2022</p>
        </li>
        <li><a href="#">Mentions légales</a></li>
        <li><a href="#">CGV-CGU</a></li>
      </ul>
    </div>
  </footer>
</body>

</html>