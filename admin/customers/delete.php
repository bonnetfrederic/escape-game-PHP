<?php
session_start();
require_once("../../helper.php");
require_once("../../Models/Customer.php");
require_once("../../Models/Booking.php");

$customer_id = (int)$_GET['customer_id'];
$bookings_array = getBookingsByCustomerId($customer_id);
var_dump($bookings_array);

?>

<script type="text/javascript">

function testConfirmDialog()  {

     var result = confirm("Attention, cet utilisateur a des réservations. Voulez-vous vraiment le supprimer?");

     if(result)  {
         alert("fonction delete customer");
     } else {
         alert("on annule tout");
     }
}
testConfirmDialog();
</script>