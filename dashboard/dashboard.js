window.onload = getData;


function getData() {
	var deckName = document.getElementById("deckSelect").value;

	let deckInfo = new FormData();
	deckInfo.append("deck", "{\"name\":\"" + deckName + "\"}");

	let cardAdd = new XMLHttpRequest();
	cardAdd.open("post", "getDeckCount.php", true);
	cardAdd.send(deckInfo);

	cardAdd.onload = function() {
		let flashcardData = JSON.parse(this.responseText);

		document.getElementById("reviewButton").innerHTML = 
		"Review Daily Flashcards(" + flashcardData.reviewCount + ")"; 
	};

	
}
function doReviews(){
	window.location.href = "../flashcards/flashcards.php?deck=" 
                         + document.getElementById("deckSelect").value;
}

function deleteCard(cardID) {

	let cardInfo = new FormData();
	cardInfo.append("card", "{\"cardid\":\"" + cardID + "\"}");

	let dataUpdate = new XMLHttpRequest();
	dataUpdate.open("post", "../flashcards/deleteCard.php", true);
	dataUpdate.send(cardInfo);
	window.location.reload(true);
}