<?php 

declare(strict_types = 1);


function error_response(string $message, int $code = 422): void
{
	http_response_code($code);
	echo json_encode(['error' => $message]);
	die;
}

function getRoomsFromDB(): array
{
	$dsn = 'mysql:dbname=escape_game;host=localhost;port=3307';
	$user = 'escape_game';
	$password = 'Escape33!';
	$conn = new PDO($dsn, $user , $password);
	$conn->exec("set names utf8mb4");
	
	$array_rooms = [];
	$sql = "SELECT * 
	        FROM `rooms`";
	
	foreach($conn->query($sql) as $row) {

		$room = new Room($row['name'], 
		$row['description'], 
		(int)$row['duration'],
		(bool)$row['forbidden18yearOld'],
		$row['niveau'],
		(int)$row['min_player'],
		(int)$row['max_player'],
		(int)$row['age'],
		$row['img_css'],
		(bool)$row['new'],
		);
		
		$array_rooms[$row['id']] = $room->toArray();
		//array_push($array_rooms, $room->toArray());
	}
	return $array_rooms;
}

function findRoomById(int $id): ?Room
{
	$dsn = 'mysql:dbname=escape_game;host=localhost;port=3307';
	$user = 'escape_game';
	$password = 'Escape33!';
	$conn = new PDO($dsn, $user , $password);
	$conn->exec("set names utf8mb4");
	
	$query = $conn->prepare("SELECT * 
	        FROM `rooms`
			WHERE id= :id");
	
	$query->execute([':id' => $id]);
	if($row = $query->fetch()) {

		$room = new Room($row['name'], 
		$row['description'], 
		(int)$row['duration'],
		(bool)$row['forbidden18yearOld'],
		$row['niveau'],
		(int)$row['min_player'],
		(int)$row['max_player'],
		(int)$row['age'],
		$row['img_css'],
		(bool)$row['new'],
		);
		return $room;
	} else {
		return null;
	}
}
	