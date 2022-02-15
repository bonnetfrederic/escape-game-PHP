<?php

declare(strict_types = 1);

require('Models/Customer.php');
require('Models/Booking.php');
require('helper.php');

var_dump($_GET);
var_dump($_POST);

$firstname = $_POST['customerFirstname'];
$lastname = $_POST['customerLastname'];
$email = $_POST['customerEmail'];
$customer = new Customer($firstname, $lastname, $email);
var_dump($customer);

//$customer_id = $customer->insert();
$schedule_id = $_POST['bookingTime'];
$date = $_POST['bookingDate'];
$nb_player = $_POST['playersNumber'];

$price = getPriceFromNbPlayer($nb_player);
var_dump($price);
$booking = new Booking(
  1,
  2,
  $_POST['bookingDate'],
  (int)$_POST['playersNumber'],
  200,
);
var_dump($booking);

//$booking->insert();
die;