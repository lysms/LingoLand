function showAnswer(){
	document.getElementById("answer").style.visibility = "visible";
	document.getElementById("user_input").innerHTML = 
	"<button type=\"button\" class=\"answer_button\" id=\"wrong_button\" onclick=\"answer(false)\">Again</button>" +
	"<button type=\"button\" class=\"answer_button\" id=\"right_button\" onclick=\"answer(true)\">Correct</button>" +
	"<button type=\"button\" id=\"edit_button\">Edit Card</button>";
}

function answer(correct){
	updateStats(correct);

	document.getElementById("answer").style.visibility = "hidden";
	document.getElementById("user_input").innerHTML = 
	"<button type=\"button\" id=\"show_button\" onclick=\"showAnswer()\">Show Answer</button>" +
	"<button type=\"button\" id=\"edit_button\">Edit Card</button>";
}

var reviewsLeft = 999;
var answerCount = 0;
var correctCount = 0;
function updateStats(correct){
	// updates variables
	answerCount++;
	if(correct){
		reviewsLeft--;
		correctCount++;
	}
	// updates number of remaining cards
	document.getElementById("review_count").innerHTML = reviewsLeft + " cards left";
	// updates the accuracy score
	document.getElementById("accuracy").innerHTML = Math.floor(100*correctCount/answerCount) + "% correct";
	// ends the session if there are no more cards remaining
	if(reviewsLeft == 0)
		endSession();
}

function endSession() {
	// give session summary and/or just congratulate user 
}
