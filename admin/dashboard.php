<?php 
session_start();

if (!isset($_SESSION['isAdmin'])) {
	header("Location: index.php?error_code=1");
	exit;
}
?>
<html>
	<head>
	</head>
	<body>
		<h1>Nous sommes dans le dashboard</h1>
		
		<a href="customers/list.php">Clients</a>
		<a href="rooms/list.php">Salles</a>
		<a href="bookings/list.php">Réservations</a>
		<a href="index.php?logout">Déconnexion</a>
	</body>
</html>