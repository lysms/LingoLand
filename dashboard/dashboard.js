function deleteCard(cardID) {

	let cardInfo = new FormData();
	cardInfo.append("card", "{\"cardid\":\"" + cardID + "\"}");

	let dataUpdate = new XMLHttpRequest();
	dataUpdate.open("post", "../flashcards/deleteCard.php", true);
	dataUpdate.send(cardInfo);
	window.location.reload(true);
}