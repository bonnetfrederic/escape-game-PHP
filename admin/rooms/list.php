<?php
session_start();
require_once("../../helper.php");
require_once("../../Models/Room.php");

$rooms = getRoomsFromDB();
?>
<html>

<head>
</head>

<body>
  <h1>Nous sommes sur la liste des Salles</h1>

  <?php
  include('../includes/menu.php');
  ?>

  <br />
  <table border="1">
    <tr>
      <th>Nom</th>
      <th>Description</th>
      <th>Durée</th>
      <th>Age</th>
      <th>Niveau</th>
      <th>Min</th>
      <th>Max</th>
      <th>Nouveauté</th>
      <th>Actions/th>
    </tr>

    <?php
    foreach ($rooms as $room_key => $room_info) {
    ?>

      <tr>
        <td><?= $room_info['name'] ?></td>
        <td><?= $room_info['description'] ?></td>
        <td><?= $room_info['duration'] ?></td>
        <td><?= $room_info['age'] ?></td>
        <td><?= $room_info['niveau'] ?></td>
        <td><?= $room_info['min_player'] ?></td>
        <td><?= $room_info['max_player'] ?></td>
        <td><?= $new = ($room_info['new'] ? 'Nouveauté' : '') ?></td>
        <td>
          <a href="#">Voir les réservations</a>
          <a href="#">Modifier</a>
          <a href="#">Supprimer</a>
        </td>
      </tr>

    <?php
    }
    ?>

  </table>


</body>

</html>