window.onload = getData;
var languageToKey = {}

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

function doReviews() {
	window.location.href = "../flashcards/flashcards.php?deck=" +
		document.getElementById("deckSelect").value;
}

function deleteCard(cardID) {

	let cardInfo = new FormData();
	cardInfo.append("card", "{\"cardid\":\"" + cardID + "\"}");

	let dataUpdate = new XMLHttpRequest();
	dataUpdate.open("post", "../flashcards/deleteCard.php", true);
	dataUpdate.send(cardInfo);
	window.location.reload(true);
}