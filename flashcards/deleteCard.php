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

	// creates and executes the delete query
	$query = 'delete from flashcards where cardid = ' . $card['cardid'];
	$db->query($query);
}
?>