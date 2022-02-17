<?php
session_start();
require_once("../../helper.php");
require_once("../../Models/Customer.php");
require_once("../../Models/Booking.php");

$customer_id = (int)$_GET['customer_id'];
$bookings_array = getBookingsByCustomerId($customer_id);
var_dump($bookings_array);
$customer = '' . getCustomerById($customer_id)->getFirstname() . ' ' . getCustomerById($customer_id)->getLastname() . '';
echo $customer . (empty($bookings_array) ? ' n\'a aucune réservation !' : ' a ' . sizeof($bookings_array) . ' réservation(s).');
?>

<script type="text/javascript">
  function confirmCustomerDeletion() {
    var result = confirm("Attention, cet utilisateur a des réservations. Voulez-vous vraiment supprimer cet utilisateur ainsi que l'ensemble de ses réservations associées?");
    if (result) {
      alert("fonction delete customer");
    } else {
      alert("on annule tout");
    }
  }
  // confirmCustomerDeletion();
</script>
