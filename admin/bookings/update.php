<?php
session_start();
require_once("../../helper.php");
require_once("../../Models/Booking.php");
require_once("../../Models/Schedule.php");
require_once("../../Models/Room.php");

$booking_id = (int)$_GET['booking_id'];
$booking = getBookingById($booking_id);
$rooms = getRoomsFromDB();
$schedules = getSchedulesFromDB(); # list of all the schedules of a day
// var_dump($schedules);
$schedules_array = []; # transform th list into an array of schedules
foreach($schedules as $sched_key => $sched_info) {
  $schedules_array[] = (string)$sched_info->getId();
}
// var_dump($schedules_array);
$unavailableSchedules = getBookingsByDateAndRoom($booking->getRoomId(), $booking->getDate()); # array of the booked schedules for this room at this date
// var_dump($unavailableSchedules);
$availablaSchedules = array_diff($schedules_array, $unavailableSchedules); # array of still available schedules for this room at this date
// var_dump($availablaSchedules);
// die;

// if no booking selected, redirects to te default bookings list
if ($booking == null) {
  header('Location: list.php');
}
// gets the form inputs data, launches the database update, and redirects to the updated bookings list
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

  <?php include('../includes/menu.php'); ?><br><br>

  <form action="update.php?booking_id=<?= $booking_id ?>" method="POST">
    <label for="roomname">Salle</label>
    <select name="roomname" id="roomname">
      <!-- loop for displaying Room names, and sets the current room as 'selected' -->
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
    <input type="date" name="date" id="date" value=<?= $booking->getDate(); ?>>
    <label for="schedule">Heure</label>
    <!-- <input type="text" name="schedule" id="schedule" value=<?= '';# findScheduleById($booking->getscheduleId())->getHeure(); ?>> -->
    <select name="schedule" id="schedule">
      <!-- loop for displaying available schedules in <option> form tags -->
      <?php
        foreach ($availablaSchedules as $key => $value) {
          if ((string)$booking->getScheduleId() != $value) {
            echo '<option value="">' . findScheduleById((int)$value)->getHeure() . '</option>';
          } else  {
            echo '<option value="" selected="selected">' . findScheduleById((int)$value)->getHeure() . '</option>';
          }
        }
      ?>
    </select>
    <label for="nbplayer">Nb joueurs</label>
    <input type="text" name="nbplayer" id="nbplayer" value=<?= $booking->getNbPlayer(); ?>>
    <label for="totalprice">Montant</label>
    <input type="text" name="totalprice" id="totalprice" value=<?= $booking->getTotalPrice(); ?>>

    <input type="submit" value="Mettre à jour">
  </form>
</body>

</html>