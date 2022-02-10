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
	$array_rooms = [];
	$sql = "SELECT * 
	        FROM `rooms`";
	
	foreach($conn->query($sql) as $row) {
		$array_rooms[] = new Room();
	}
	
	return array_rooms;
}