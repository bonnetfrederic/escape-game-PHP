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
	
	$array_rooms = [];
	$sql = "SELECT * 
	        FROM `rooms`";
	
	foreach($conn->query($sql) as $row) {

		$room = new Room($row['name'], 
		utf8_encode($row['description']), 
		(int)$row['duration'],
		
		);
		
		$array_rooms[] = $room->toArray();
		//array_push($array_rooms, $room->toArray());
	}
	return $array_rooms;
}