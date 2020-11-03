<?php  
$dbOk = false;
@ $db = new mysqli('localhost', 'root', '', 'lingoland');
if($db->connect_error){
	echo json_encode("error");
} 
else{
	$dbOk = true; 
}

if($dbOk){
	$card = json_decode("$_POST[card]", true);

	// creates and executes the update query
	$query = 'update flashcards set `front` = "' . $card['front'] . '", `back` = "'. $card['back'] .'" where cardid = ' . $card['cardid'];
	$db->query($query);
}
?>