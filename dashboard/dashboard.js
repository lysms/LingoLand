window.onload = getData;
var languageToKey = {}

/* 
	function called to populate our selection input with all languages available to the user through our webpage, based on all languages listed in our 
	identifiableLanguages.json.
*/
$(document).ready(function(){
	$.getJSON("./identifiableLanguages.json", function (data) {
        var languages = []
        $.each(data.languages, function (key, language) {
            languages.push('<option value="' + language.name + '">' + language.name + '</option>')
            languageToKey[language.name] = language.language;
        })

        $(languages.join("")).appendTo("#deckSelect");

    })
})

/*function grabs all flashcards associated with a given card deck within the user's list of flashcards.*/
function getData() {
	var deckName = document.getElementById("deckSelect").value;
	if(deckName == ""){
		deckName = "Afrikaans"
	}
	let deckInfo = new FormData();
	deckInfo.append("deck", "{\"name\":\"" + deckName + "\"}");

	let cardAdd = new XMLHttpRequest();
	cardAdd.open("post", "getDeckCount.php", true);
	cardAdd.send(deckInfo);

	cardAdd.onload = function () {
		let flashcardData = JSON.parse(this.responseText);

		document.getElementById("reviewButton").innerHTML =
			"Review Daily Flashcards (" + flashcardData.reviewCount + ") <i class='far fa-lightbulb'></i>";
	};


}

/*Redirects the user to flashcard workflow, where it will show the user all flashcards due for that day of the specified flashcard deck*/
function doReviews() {
	window.location.href = "../flashcards/flashcards.php?deck=" +
		document.getElementById("deckSelect").value;
}

/*Deletes a flashcard, if the user clicks on the delete button in the table associated with each flashcard.*/ 
function deleteCard(cardID) {

	let cardInfo = new FormData();
	cardInfo.append("card", "{\"cardid\":\"" + cardID + "\"}");

	let dataUpdate = new XMLHttpRequest();
	dataUpdate.open("post", "../flashcards/deleteCard.php", true);
	dataUpdate.send(cardInfo);
	window.location.reload(true);
}