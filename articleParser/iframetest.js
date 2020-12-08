
var iframe = document.getElementById("article");
var idoc= iframe.contentWindow;

/* Sets the notification to stay on the screen for approx 2 seconds after a user creates a flashcard*/
$(document).ready(function(){
  $('.toast').toast({delay: 2000});
})

/* iframe jQuery listener which begins to listen for events triggered in the article iframe once it is loaded */
$(iframe).on('load',function(){
    /*
      if an item is highlighted in the body, the below function grabs the selection, makes the translation and then creates 
      a card in the sidebar associated with the term and the definition
    */
    $(this).contents().find("body").on('click', function(event){
        var sel = idoc.getSelection().toString();
        const color = getRandomColor();
        console.log($(this).contents());
        $(this).contents().highlight(sel, color, id);
        createTranslation(sel).then(function(translation){
          createCard(sel, translation.translations[0].translation, "", color);
        });
    })
});

/*
  Each card in the sidebar has a make flashcard button. If a user clicks on the "make flashcard" button, 
  it will trigger the createFlashcard function to add that flashcard into the users flashcard collection 
*/
$(document).on("click", ".make-flashcard", function(){
  const term = this.parentNode.querySelector(".term").innerHTML
  const translation = this.parentNode.querySelector(".translation").innerHTML
  createFlashcard(term, translation);
  $(this).hide()
  $('.toast').toast('show');
})

/*
  Snap function. When any of the flashcards are clicked on, this function will 
  find the associated highlight in the article and snap to its location.
*/
$(document).on("click", ".term-card", function(){
  const cardID = this.id.replace("card-", "");
  const highlight = idoc.document.getElementById(cardID);
  highlight.scrollIntoView();
})

/*
  Trash icon associated with every card in the sidebar. It deletes the card its associated with when clicked as well as the associated highlight.
*/
$(document).on("click", ".fas.fa-trash-alt", function(){
  let cardID = this.id;
  for(var i = 0; i < cards.length; i++){
    if (cards[i].id = cardID){
      $(iframe).contents().removeHighlight(cardID);
      $("#card-" + cardID).remove();
    }
  }
})

