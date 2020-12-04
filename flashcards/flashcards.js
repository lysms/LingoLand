var sessionStatus = 0;
var reviewCount;
var missCount = 0;
var missIndices = [];
var currentCard = 0;
var flashcardData;

$(document).ready(function(){
	$(".flashcard").click(function(){
		if(sessionStatus != 2 && sessionStatus != -1){
			showAnswer()
		} else if(sessionStatus != -1) {
			$(this).toggleClass('flipped');
		}
	})
})

// sets up and sends the inital request for flashcard data
const params = new URLSearchParams(location.search);

let deckInfo = new FormData();
deckInfo.append("deck", "{\"name\":\"" + params.get('deck') + "\"}");
var dataReq = new XMLHttpRequest();
dataReq.open("post", "getData.php", true);
dataReq.send(deckInfo);

dataReq.onload = function () {
	flashcardData = JSON.parse(this.responseText);
	reviewCount = flashcardData.reviewCount;
	if (reviewCount == "0") {
		document.getElementById("review_count").innerHTML = "0 cards left";
		document.getElementById("question").innerHTML = "No new reviews";
		document.getElementById("user_input").innerHTML = "";
		setTimeout(toDashboard, 3000);
		return;
	}
	sessionStatus = 1;
	if (reviewCount == "1")
		document.getElementById("review_count").innerHTML = reviewCount + " card left";
	else
		document.getElementById("review_count").innerHTML = reviewCount + " cards left";

	document.getElementById("question").innerHTML = flashcardData.cards[0].front;
	document.getElementById("answer").innerHTML = flashcardData.cards[0].back;
};

// redirects user to the dashboard
function toDashboard() {
	window.location.href = "../dashboard/dashboard.php";
}

function showQuestion(){
	sessionStatus = 1;
	$(".flashcard").removeClass("flipped");
	
	document.getElementById("user_input").innerHTML =
		"<button type=\"button\" class=\"btn btn-danger answer_button\" id=\"wrong_button\" onclick=\"answer(false)\">Again</button>" +
		"<button type=\"button\" class=\"btn btn-success answer_button\" id=\"right_button\" onclick=\"answer(true)\">Correct</button>" +
		"<button type=\"button\" class=\"btn btn-outline-danger\" id=\"edit_button\" onclick=\"enterEditMode()\">Edit Card</button>";
}

function showAnswer() {
	sessionStatus = 2;
	document.getElementById("answer").style.visibility = "visible";
	$(".flashcard").addClass("flipped");
	
	document.getElementById("user_input").innerHTML =
		"<button type=\"button\" class=\"btn btn-danger answer_button\" id=\"wrong_button\" onclick=\"answer(false)\">Again</button>" +
		"<button type=\"button\" class=\"btn btn-success answer_button\" id=\"right_button\" onclick=\"answer(true)\">Correct</button>" +
		"<button type=\"button\" class=\"btn btn-outline-danger\" id=\"edit_button\" onclick=\"enterEditMode()\">Edit Card</button>";
}

function enterEditMode() {
	sessionStatus = -1;
	// gets the current card
	$('.flashcard').removeClass('flipped');
	var cardIndex;
	if (currentCard == reviewCount)
		cardIndex = missIndices[0];
	else
		cardIndex = currentCard;

	// makes the card text editable
	document.querySelector(".front").innerHTML =
		"<textarea id=\"question_box\" name=\"fname\">" + flashcardData.cards[cardIndex]["front"] + "</textarea>";
		
	document.querySelector(".back").innerHTML =
		"<textarea id=\"answer_box\" name=\"fname\">" + flashcardData.cards[cardIndex]["back"] + "</textarea>";
	// gives the user edit buttons
	document.getElementById("user_input").innerHTML =
		"<button type=\"button\" class=\"edit_button btn btn-secondary\" id=\"cancel_button\" onclick=\"exitEditMode(false)\">Cancel</button>" +
		"<button type=\"button\" class=\"edit_button btn btn-success\" id=\"save_button\" onclick=\"sendChanges()\">Save</button>" +
		"<button type=\"button\" id=\"edit_button\" class=\"btn btn-danger\" onclick=\"confirm()\">Delete Card</button>";
}

function sendChanges() {
	// gets the current card
	var cardIndex;
	if (currentCard == reviewCount)
		cardIndex = missIndices[0];
	else
		cardIndex = currentCard;

	// changes the card data with the text box
	flashcardData.cards[cardIndex]["front"] = document.getElementById("question_box").value;
	flashcardData.cards[cardIndex]["back"] = document.getElementById("answer_box").value;



	//sends the update request
	let cardInfo = new FormData();
	cardInfo.append("card", JSON.stringify(flashcardData.cards[cardIndex]));

	let dataUpdate = new XMLHttpRequest();
	dataUpdate.open("post", "editCard.php", true);
	dataUpdate.send(cardInfo);


	exitEditMode(false);
}

function confirm() {
	document.getElementById("user_input").innerHTML =
		"<button type=\"button\" class=\"edit_button btn btn-secondary\" id=\"cancel_button\" onclick=\"exitEditMode()\">Cancel</button>" +
		"<button type=\"button\" class=\"edit_button btn btn-success\" id=\"save_button\" onclick=\"deleteCard()\">Confirm</button>";
}

function deleteCard() {
	var cardIndex;
	if (currentCard == reviewCount)
		cardIndex = missIndices[0];
	else
		cardIndex = currentCard;

	let cardInfo = new FormData();
	cardInfo.append("card", JSON.stringify(flashcardData.cards[cardIndex]));

	let dataUpdate = new XMLHttpRequest();
	dataUpdate.open("post", "deleteCard.php", true);
	dataUpdate.send(cardInfo);

	exitEditMode(true);
}

function exitEditMode(deleted) {
	sessionStatus = 1;
	$('.flashcard').removeClass('flipped');

	document.querySelector(".front").innerHTML = '<h5 id = "question" class="flashcard-content card-title"></h5>'
	document.querySelector(".back").innerHTML = '<h5 id = "answer" class="flashcard-content card-title"></h5>'
	document.getElementById("answer").style.visibility = "hidden";
	document.getElementById("user_input").innerHTML =
		"<button type=\"button\" class=\"btn btn-secondary\" id=\"show_button\" onclick=\"showAnswer()\">Show Answer</button>" +
		"<button type=\"button\" class=\"btn btn-outline-danger\" id=\"edit_button\" onclick=\"enterEditMode()\">Edit Card</button>";
	if (deleted) {
		if (currentCard != reviewCount) {
			currentCard++;
		} else if (missCount > 0) {
			missCount--;
			missIndices.shift();
		}

		// updates number of remaining cards
		var cardsLeft = reviewCount - currentCard + missCount;
		if (cardsLeft == 1)
			document.getElementById("review_count").innerHTML = cardsLeft + " card left";
		else
			document.getElementById("review_count").innerHTML = cardsLeft + " cards left";

	}

	// changes text to the next card
	if (currentCard != reviewCount) {
		document.getElementById("question").innerHTML = flashcardData.cards[currentCard].front;
		document.getElementById("answer").innerHTML = flashcardData.cards[currentCard].back;
	} else if (missCount > 0) {
		document.getElementById("question").innerHTML = flashcardData.cards[missIndices[0]].front;
		document.getElementById("answer").innerHTML = flashcardData.cards[missIndices[0]].back;
	} else {
		endSession();
	}
}

function answer(correct) {
	sessionStatus = 1;
	// updates the cards interval and duedate in the database
	if (currentCard == reviewCount)
		updateDatabase(missIndices[0], correct);
	else
		updateDatabase(currentCard, correct)

	// updates the list of missed cards
	if (currentCard == reviewCount) {
		if (correct) {
			missCount--;
			missIndices.shift();
		} else {
			missIndices.push(missIndices.shift());
		}
	} else if (!correct) {
		missCount++;
		missIndices.push(currentCard);
		flashcardData.cards[currentCard].interval = 0;
	}



	//updates currentCard variable and stats
	if (currentCard != reviewCount) {
		currentCard++;
	}

	updateStats(correct);

	//resets the view to front only
	document.getElementById("answer").style.visibility = "hidden";
	document.getElementById("user_input").innerHTML =
		"<button type=\"button\" class=\"btn btn-secondary\" id=\"show_button\" onclick=\"showAnswer()\">Show Answer</button>" +
		"<button type=\"button\" class=\"btn btn-outline-danger\" id=\"edit_button\" onclick=\"enterEditMode()\">Edit Card</button>";

	$(".flashcard").removeClass('flipped')
	// changes text to the next card
	if (currentCard != reviewCount) {
		document.getElementById("question").innerHTML = flashcardData.cards[currentCard].front;
		document.getElementById("answer").innerHTML = flashcardData.cards[currentCard].back;
	} else if (missCount > 0) {
		document.getElementById("question").innerHTML = flashcardData.cards[missIndices[0]].front;
		document.getElementById("answer").innerHTML = flashcardData.cards[missIndices[0]].back;
	} else {
		endSession();
	}
}

// changes cards front/back text from edit mode
function updateDatabase(cardIndex, correct) {
	let cardInfo = new FormData();
	cardInfo.append("correct", correct);
	cardInfo.append("card", JSON.stringify(flashcardData.cards[cardIndex]));

	let dataUpdate = new XMLHttpRequest();
	dataUpdate.open("post", "updateData.php", true);
	dataUpdate.send(cardInfo);

	dataUpdate.onload = function () {
		if (this.responseText == "error")
			console.log("Update Error: ", this.responseText);
	};
}

var answerCount = 0;
var correctCount = 0;

function updateStats(correct) {
	// updates variables
	answerCount++;
	if (correct) {
		correctCount++;
	}

	// updates number of remaining cards
	var cardsLeft = reviewCount - currentCard + missCount;
	if (cardsLeft == 1)
		document.getElementById("review_count").innerHTML = cardsLeft + " card left";
	else
		document.getElementById("review_count").innerHTML = cardsLeft + " cards left";
	// updates the accuracy score
	document.getElementById("accuracy").innerHTML = Math.floor(100 * correctCount / answerCount) + "% correct";
}

function endSession() {
	// congratulate user 
	document.getElementById("question").innerHTML = "No More Reviews";
	document.getElementById("user_input").innerHTML = "";
	setTimeout(toDashboard, 3000);
}

// prevents space bar from scrolling
window.onkeydown = function(e) {
	// alert(e.target.type);
    return !(e.keyCode == 32 && e.target.type != 'textarea');
};

// hotkeys for bottom buttons
document.onkeyup = function (e) {
	console.log("sessionStatus:", sessionStatus)
	if (sessionStatus == 0)
		return;
	// spacebar flips card in edit mode
	else if (e.which == 32 && sessionStatus == -1 && e.target.type != 'textarea') {
		$('.flashcard').toggleClass('flipped');
	}
	// "1" key marks as wrong
	else if (e.which == 49 && sessionStatus == 2) {
		answer(false);
	} 
	// "2" key marks as right
	else if (e.which == 50 && sessionStatus == 2) {
		answer(true);
	} 
	// "1", "2", or spacebar shows answer
	else if ((e.which == 49 || e.which == 50 || e.which == 32) && sessionStatus == 1) {
		showAnswer();
	} 
	// spacebar flips the card
	else if ((e.which == 49 || e.which == 50 || e.which == 32) && sessionStatus != -1){
		$('.flashcard').toggleClass('flipped');
	}
	else if(e.which == 69 && sessionStatus > 0){
		enterEditMode();
	}
};