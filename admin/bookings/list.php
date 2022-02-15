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
		<h1>Nous sommes sur la liste des Réservations</h1>
		
		<?php
			include('../includes/menu.php');
		?>
	</body>
</html>