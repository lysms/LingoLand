<?php  
include ('../auth/connection.php');
$dbOk = false;
@ $db = new mysqli('localhost', 'root', '', 'lingoland');
if($db->connect_error){
	echo json_encode(array("reviewCount" => "0"));
} 
else{
	$dbOk = true; 
}

if($dbOk){
	// gets the currently logged in user's id
	$userID = $_SESSION["id"];

	// if the user is not logged in, return no cards
	if(false){
		echo "{\"reviewCount\": \"0\"}";
		return;
	}

	$deck = json_decode("$_POST[deck]", true);
	// gets the date and creates the query string
	$today = new DateTime('now');
	$query = 'select * from flashcards where duedate <= "' . $today->format('Y-m-d H:i:s') . '" and userID = '. $userID .' and deck = "'.$deck["name"].'"';
	$result = $db->query($query);
	$reviewCount = $result->num_rows;

	// creates the return data in JSON format
	echo "{\"reviewCount\": \"" . $reviewCount . "\"}";
}