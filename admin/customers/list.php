<?php
session_start();

require_once("../../helper.php");
require_once("../../Models/Customer.php");

$customers = getCustomersFromDB();
$customer_id = (int)(($_GET['customer_id']) ?? 0);
?>

<html>

<head>
</head>

<body>
  <h1>Nous sommes sur la liste des Clients</h1>

  <?php
  include('../includes/menu.php');
  ?>

  <br />
  <table border="1">
    <tr>
      <th>Prénom</th>
      <th>Nom</th>
      <th>Email</th>
      <th>Actions</th>
    </tr>

    <?php
    foreach ($customers as $customer_key => $customer_info) {
    ?>

      <tr>
        <td><?= $customer_info->getFirstname(); ?></td>
        <td><?= $customer_info->getLastname(); ?></td>
        <td><?= $customer_info->getEmail(); ?></td>
        <td>
          <a href="../bookings/list.php?customer_id=<?= $customer_info->getId(); ?>">Voir les réservations</a>
          <a href="../customers/update.php?customer_id=<?= $customer_info->getId(); ?>">Modifier</a>
          <a href="../customers/delete.php?customer_id=<?= $customer_info->getId(); ?>">Supprimer</a>
        </td>
      </tr>

    <?php
    }

    if ($customer_id != 0) {echo '<p style="color: red">L\'utilisateur "' . getCustomerById($customer_id)->getFirstname() . ' ' . getCustomerById($customer_id)->getLastname() . '" a bien été mis à jour. </p>';}
    ?>

  </table>
</body>

</html>