var reviewCount;
var currentCard = 0;
var flashcardData;
var againData; //this will store indices of cards that were marked wrong, so they can come back around durring the session

var dataReq = new XMLHttpRequest();
dataReq.open("get", "getData.php", true);
dataReq.send();

dataReq.onload = function() {
	flashcardData = JSON.parse(this.responseText);
	reviewCount = flashcardData.reviewCount;

	if(reviewCount == "0"){
		document.getElementById("review_count").innerHTML = "0 cards left";
		document.getElementById("question").innerHTML = "No new reviews";
		return;
	}

	if(reviewCount == "1")
		document.getElementById("review_count").innerHTML = reviewCount + " card left";
	else
		document.getElementById("review_count").innerHTML = reviewCount + " cards left";

	document.getElementById("question").innerHTML = flashcardData.cards[0].front;
	document.getElementById("answer").innerHTML = flashcardData.cards[0].back;
};


function showAnswer(){
	document.getElementById("answer").style.visibility = "visible";
	document.getElementById("user_input").innerHTML = 
	"<button type=\"button\" class=\"answer_button\" id=\"wrong_button\" onclick=\"answer(false)\">Again</button>" +
	"<button type=\"button\" class=\"answer_button\" id=\"right_button\" onclick=\"answer(true)\">Correct</button>" +
	"<button type=\"button\" id=\"edit_button\">Edit Card</button>";
}

function answer(correct){
	// updates the cards interval and duedate in the database

	// TODO

	//updates currentCard variable and stats
	currentCard++;
	updateStats(correct);

	//resets the view to front only
	document.getElementById("answer").style.visibility = "hidden";
	document.getElementById("user_input").innerHTML = 
	"<button type=\"button\" id=\"show_button\" onclick=\"showAnswer()\">Show Answer</button>" +
	"<button type=\"button\" id=\"edit_button\">Edit Card</button>";

	// changes text to the next card
	if(currentCard != reviewCount){
		document.getElementById("question").innerHTML = flashcardData.cards[currentCard].front;
		document.getElementById("answer").innerHTML = flashcardData.cards[currentCard].back;
	}
	else{
		endSession();
	}
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
	var cardsLeft = reviewCount - currentCard;
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
