<?php
session_start();

require_once("../../helper.php");
require_once("../../Models/Booking.php");
require_once("../../Models/Customer.php");
require_once("../../Models/Room.php");
require_once("../../Models/Schedule.php");

redirectIfNotAdmin();
$customer_id = (int)($_GET['customer_id'] ?? 0);
$bookings = ($customer_id == 0) ? getBookingsFromDB() : getBookingsByCustomerId($customer_id);

// $bookings = getBookingsByCustomerId($customer_id);
// var_dump($bookings);
// die;

?>
<html>

<head>
</head>

<body>
  <h1>Nous sommes sur la liste des Réservations</h1>

  <?php
  include('../includes/menu.php');
  ?>

  <br />
  <table border="1">
    <tr>
      <th>Salle</th>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Date</th>
      <th>Heure</th>
      <th>Nb joueurs</th>
      <th>Montant</th>
      <th>Actions</th>
    </tr>

    <?php
    foreach ($bookings as $booking_key => $booking_info) {
    ?>

      <tr>
        <td><?= findRoomById($booking_info->getRoomId())->getName(); ?></td>
        <td><?= getCustomerById($booking_info->getCustomerId())->getLastname(); ?></td>
        <td><?= getCustomerById($booking_info->getCustomerId())->getFirstname(); ?></td>
        <td><?= $booking_info->getDate(); ?></td>
        <td><?= findScheduleById($booking_info->getScheduleId())->getHeure(); ?></td>
        <td><?= $booking_info->getNbPlayer(); ?></td>
        <td><?= $booking_info->getTotalPrice(); ?></td>
        <td>
          <a href="#">Modifier</a>
          <a href="#">Annuler</a>
        </td>
      </tr>

    <?php
    }
    ?>

  </table>


</body>

</html>