<?php
session_start();
require_once("../../helper.php");
require_once("../../Models/Booking.php");
require_once("../../Models/Schedule.php");
require_once("../../Models/Room.php");

$booking_id = (int)$_GET['booking_id'];
$booking = getBookingById($booking_id);

if ($booking == null) {
  header('Location: list.php');
}
if ($_POST != null) {
  $booking->setDate($_POST['date']);
  $booking->setScheduleID((int)$_POST['schedule_id']);
  $booking->setNbPlayer((int)$_POST['nb_player']);
  $booking->setTotalPrice((int)$_POST['total_price']);
  $booking->update();
  header('Location: list.php?booking_id=' . $booking_id);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mise à jour de la réservation</title>
</head>

<body>

  <h1>Mise à jour de la réservation</h1>

  <?php
  include('../includes/menu.php');
  ?>
  <br><br>

  <?php
  $rooms = getRoomsFromDB();
  ?>

  <form action="update.php?booking_id=<?= $booking_id ?>" method="POST">
    <label for="roomname">Salle</label>
    <select name="roomname" id="roomname">
      <!-- boucle pour afficher les autres Room names -->
      <?php
      foreach ($rooms as $room_key => $room_info) {
        if ((int)$room_key != (int)$booking->getRoomId()) {
          echo '<option value="">' . $room_info['name'] . '</option>';
        } else {
          echo '<option value="" selected="selected">' . $room_info['name'] . '</option>';
        }
      }
      ?>
    </select>
    <label for="date">Date</label>
    <input type="text" name="date" id="date" value=<?= $booking->getDate(); ?>>
    <label for="schedule">Heure</label>
    <input type="text" name="schedule" id="schedule" value=<?= findScheduleById($booking->getscheduleId())->getHeure(); ?>>
    <label for="nbplayer">Nb joueurs</label>
    <input type="text" name="nbplayer" id="nbplayer" value=<?= $booking->getNbPlayer(); ?>>
    <label for="totalprice">Montant</label>
    <input type="text" name="totalprice" id="totalprice" value=<?= $booking->getTotalPrice(); ?>>
    <input type="submit" value="Mettre à jour">
  </form>
</body>

</html>