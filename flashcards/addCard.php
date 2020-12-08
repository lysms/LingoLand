<!-- 
// How to use:

var cardFront = "This is the front of the card";
var cardBack = "This is the back of the card";

let cardInfo = new FormData();
cardInfo.append("card", "{\"front\":\""+cardFront+"\",\"back\":\""+cardBack+"\"}");

let cardAdd = new XMLHttpRequest();
cardAdd.open("post", "addCard.php", true);
cardAdd.send(cardInfo);
 -->


<?php
include('../auth/connection.php');
$dbOk = false;
@$db = new mysqli('localhost', 'root', '', 'lingoland');
if ($db->connect_error) {
	echo json_encode("error");
} else {
	$dbOk = true;
}

if ($dbOk) {
	$card = json_decode("$_POST[card]", true);
	$today = new DateTime('now');

	// creates and executes the add query
	$query = 'insert into flashcards (`duedate`, `interval`, `easefactor`, `front`, `back`, `deck`, `userID`) values ("' .
		$today->format('Y-m-d H:i:s') . '", 0, 250, "' . $card['front'] . '", "' . $card['back'] . '", "' . $card['deck'] . '","' . $_SESSION["id"] . '")';

	$db->query($query);
}
?>