var sessionStatus = 0;
var reviewCount;
var missCount = 0;
var missIndices = [];
var currentCard = 0;
var flashcardData;

var dataReq = new XMLHttpRequest();
dataReq.open("get", "getData.php", true);
dataReq.send();

dataReq.onload = function() {
	flashcardData = JSON.parse(this.responseText);
	reviewCount = flashcardData.reviewCount;
	if(reviewCount == "0"){
		document.getElementById("review_count").innerHTML = "0 cards left";
		document.getElementById("question").innerHTML = "No new reviews";
		document.getElementById("user_input").innerHTML = "";
		return;
	}
	sessionStatus = 1;
	if(reviewCount == "1")
		document.getElementById("review_count").innerHTML = reviewCount + " card left";
	else
		document.getElementById("review_count").innerHTML = reviewCount + " cards left";

	document.getElementById("question").innerHTML = flashcardData.cards[0].front;
	document.getElementById("answer").innerHTML = flashcardData.cards[0].back;
};


function showAnswer(){
	sessionStatus = 2;
	document.getElementById("answer").style.visibility = "visible";
	document.getElementById("user_input").innerHTML = 
	"<button type=\"button\" class=\"answer_button\" id=\"wrong_button\" onclick=\"answer(false)\">Again</button>" +
	"<button type=\"button\" class=\"answer_button\" id=\"right_button\" onclick=\"answer(true)\">Correct</button>" +
	"<button type=\"button\" id=\"edit_button\" onclick=\"enterEditMode()\">Edit Card</button>";
}

function enterEditMode(){
	sessionStatus = -1;
	// gets the current card
	var cardIndex;
	if(currentCard == reviewCount)
		cardIndex = missIndices[0];
	else
		cardIndex = currentCard;

	// makes the card text editable
	document.getElementById("card_area").innerHTML = 
	"<input type=\"text\" id=\"question_box\" value=\""+flashcardData.cards[cardIndex]["front"]+"\"name=\"fname\">" +
	"<input type=\"text\" id=\"answer_box\" value=\""+flashcardData.cards[cardIndex]["back"]+"\"name=\"fname\">";

	// gives the user edit buttons
	document.getElementById("user_input").innerHTML = 
	"<button type=\"button\" class=\"edit_button\" id=\"cancel_button\" onclick=\"exitEditMode(false)\">Cancel</button>" +
	"<button type=\"button\" class=\"edit_button\" id=\"save_button\" onclick=\"sendChanges()\">Save</button>" +
	"<button type=\"button\" id=\"edit_button\" onclick=\"confirm()\">Delete Card</button>";
}

function sendChanges(){
	// gets the current card
	var cardIndex;
	if(currentCard == reviewCount)
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

function confirm(){
	document.getElementById("user_input").innerHTML = 
	"<button type=\"button\" class=\"edit_button\" id=\"cancel_button\" onclick=\"exitEditMode()\">Cancel</button>" +
	"<button type=\"button\" class=\"edit_button\" id=\"save_button\" onclick=\"deleteCard()\">Confirm</button>";
}

function deleteCard(){
	var cardIndex;
	if(currentCard == reviewCount)
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

function exitEditMode(deleted){
	sessionStatus = 1;

	document.getElementById("card_area").innerHTML = 
	"<h2 class=\"flashcard\" id=\"question\"></h2>" +
  "<h2 class=\"flashcard\" id=\"answer\"></h2>";

	document.getElementById("answer").style.visibility = "hidden";
	document.getElementById("user_input").innerHTML = 
	"<button type=\"button\" id=\"show_button\" onclick=\"showAnswer()\">Show Answer</button>" +
	"<button type=\"button\" id=\"edit_button\" onclick=\"enterEditMode()\">Edit Card</button>";
	if(deleted){
		if(currentCard != reviewCount){
			currentCard++;
		}
		else if(missCount > 0){
			missCount--;
			missIndices.shift();
		}

		// updates number of remaining cards
		var cardsLeft = reviewCount - currentCard + missCount;
		if(cardsLeft == 1)
			document.getElementById("review_count").innerHTML = cardsLeft + " card left";
		else
			document.getElementById("review_count").innerHTML = cardsLeft + " cards left";
			
	}

	// changes text to the next card
	if(currentCard != reviewCount){
		document.getElementById("question").innerHTML = flashcardData.cards[currentCard].front;
		document.getElementById("answer").innerHTML = flashcardData.cards[currentCard].back;
	}
	else if(missCount > 0){
		document.getElementById("question").innerHTML = flashcardData.cards[missIndices[0]].front;
		document.getElementById("answer").innerHTML = flashcardData.cards[missIndices[0]].back;
	}
	else{
		endSession();
	}
}

function answer(correct){
	sessionStatus = 1;
	// updates the cards interval and duedate in the database
	if(currentCard == reviewCount)
		updateDatabase(missIndices[0], correct);
	else
		updateDatabase(currentCard, correct)

	// updates the list of missed cards
	if(currentCard == reviewCount){
		if(correct){
			missCount--;
			missIndices.shift();
		}
		else{
			missIndices.push(missIndices.shift());
		}
	}
	else if(!correct){
		missCount++;
		missIndices.push(currentCard);
		flashcardData.cards[currentCard].interval = 0;
	}

	

	//updates currentCard variable and stats
	if(currentCard != reviewCount){
		currentCard++;
	}

	updateStats(correct);

	//resets the view to front only
	document.getElementById("answer").style.visibility = "hidden";
	document.getElementById("user_input").innerHTML = 
	"<button type=\"button\" id=\"show_button\" onclick=\"showAnswer()\">Show Answer</button>" +
	"<button type=\"button\" id=\"edit_button\" onclick=\"enterEditMode()\">Edit Card</button>";

	// changes text to the next card
	if(currentCard != reviewCount){
		document.getElementById("question").innerHTML = flashcardData.cards[currentCard].front;
		document.getElementById("answer").innerHTML = flashcardData.cards[currentCard].back;
	}
	else if(missCount > 0){
		document.getElementById("question").innerHTML = flashcardData.cards[missIndices[0]].front;
		document.getElementById("answer").innerHTML = flashcardData.cards[missIndices[0]].back;
	}
	else{
		endSession();
	}
}

function updateDatabase(cardIndex, correct) {
	let cardInfo = new FormData();
	cardInfo.append("correct", correct);
	cardInfo.append("card", JSON.stringify(flashcardData.cards[cardIndex]));

	let dataUpdate = new XMLHttpRequest();
	dataUpdate.open("post", "updateData.php", true);
	dataUpdate.send(cardInfo);

	dataUpdate.onload = function() {
		if(this.responseText == "error")
			alert(this.responseText);
	};
}

var answerCount = 0;
var correctCount = 0;
function updateStats(correct){
	// updates variables
	answerCount++;
	if(correct){
		correctCount++;
	}

	// updates number of remaining cards
	var cardsLeft = reviewCount - currentCard + missCount;
	if(cardsLeft == 1)
		document.getElementById("review_count").innerHTML = cardsLeft + " card left";
	else
		document.getElementById("review_count").innerHTML = cardsLeft + " cards left";
	// updates the accuracy score
	document.getElementById("accuracy").innerHTML = Math.floor(100*correctCount/answerCount) + "% correct";
}

function endSession() {
	// give session summary and/or just congratulate user 
	document.getElementById("question").innerHTML = "You Are Winner";
	document.getElementById("user_input").innerHTML = "";
}



document.onkeyup = function(e) {

	if(sessionStatus < 1) 
		return;
  else if(e.which == 49 && sessionStatus == 2){
    answer(false);
  } 
  else if(e.which == 50 && sessionStatus == 2){
    answer(true);
  } 
  else if((e.which == 49 || e.which == 50) && sessionStatus == 1){
  	showAnswer();
  }
};