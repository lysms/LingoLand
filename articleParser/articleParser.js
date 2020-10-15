var id = 1

var cards = []

var language = "it";

function getRandomColor() {
  color = "hsl(" + Math.random() * 360 + ", 100%, 75%)";
  return color;
}

async function createTranslation(stringToTranslate){
  url = "http://localhost/articleParser/getTranslation.php"
  console.log(url);
  const response = $.ajax({
      type: 'GET',
      url: url,
      data: {
          text: stringToTranslate,
          model_id: language + "-en"
      },
      success: function(res){
        return res.translations[0];
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) { // if there was a problem
        console.log(XMLHttpRequest, textStatus, errorThrown);
        alert('Error Occured');
      }
    });
  return new Promise((resolve, reject) => {
    if(response){
      resolve(response);
    } else{
      reject();
    }
  })
}

function createCard(sel, translation, context, color){
  var newCardObject = {
    id: id,
    term: sel,
    translation: translation,
    context: context
  }
  var newCardElement = '<div id="card-'+ id +'" class="card mb-4" style="width: 100%; background-color: '+ color +';"> \
    <i id="' +id+ '" class="fas fa-trash-alt"></i>\
    <div class="card-body">\
    <h5 class="card-title">Term</h5>\
    <p class="card-subtitle mb-2 text-muted">' + sel + 
    '<h5 class="card-title">Translation</h5> \
    <p class="card-subtitle mb-2 text-muted">'+ newCardObject.translation +'</p> \
    <h5 class="card-title">Context</h5> \
    <p class="card-subtitle mb-2 text-muted">'+ newCardObject.context +'"</p> \
    <button type="submit" class="btn btn-secondary mb-2">Make Flashcard</button>'; 
  cards.push(newCardObject)
  id += 1;
  $(newCardElement).appendTo("#terms");
}

$(document).ready(function(){
    $("p.article-text").click(function(){
        var sel = getSelection().toString();
        const color = getRandomColor();
        console.log(color);
        $("p.article-text").highlight(sel, color);
        createTranslation(sel).then(function(translation){
          console.log(translation.translations);
          createCard(sel, translation.translations[0].translation, "lorem ipsum dolor", color);
        });
    })
});

$('select').on('change', function(e){
  language = this.value;
  console.log(language);
})

$(document).on("click", ".fas.fa-trash-alt", function(){
  let cardID = this.id;
  for(var i = 0; i < cards.length; i++){
    if (cards[i].id = cardID){
      const term = cards[i].term; 
      $("p.article-text").removeHighlight(term);
      $("#card-" + cardID). remove();
    }
  }
})