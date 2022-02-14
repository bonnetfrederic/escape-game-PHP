<?php

declare(strict_types = 1);

require('helper.php');

var_dump($_GET);
var_dump($_POST);

$firstname = $_POST['customerFirstname'];
$lastname = $_POST['customerLastname'];
$email = $_POST['customerEmail'];
//$customer = new Customer(firstname, lastname, email);
//$customer_id = $customer->insert();
$schedule_id = $_POST['bookingTime'];
$date = $_POST['bookingDate'];
$nb_player = $_POST['playersNumber'];

//$price = getPriceFromNbPlayer($nb_player);
//$booking = new Booking($room_id, $customer_id, $schedule_id, $date, $nb_player, $price);

//$booking->insert();
die;