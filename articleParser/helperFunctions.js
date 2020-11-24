var id = 1;

var cards = []

var language = getQueryVariable("language");
var languagename = getQueryVariable("languagename");

function getQueryVariable(variable) {
  var query = window.location.search.substring(1);
  var vars = query.split('&');
  for (var i = 0; i < vars.length; i++) {
      var pair = vars[i].split('=');
      if (decodeURIComponent(pair[0]) == variable) {
          return decodeURIComponent(pair[1]);
      }
  }
  console.log('Query variable %s not found', variable);
}

function getRandomColor() {
    color = "hsl(" + Math.random() * 360 + ", 100%, 75%)";
    return color;
}

function createCard(sel, translation, context, color){
    var newCardObject = {
      id: id,
      term: sel,
      translation: translation,
      context: context
    }
    var newCardElement = '<div id="card-'+ id +'" class="term-card card" style="width: 100%; background-color: '+ color +';"> \
      <i id="' +id+ '" class="delete-flashcard fas fa-trash-alt"></i>\
      <div class="card-body">\
      <h5 class="card-title">Term</h5>\
      <p class="card-subtitle term mb-2 text-muted">' + sel + 
      '<h5 class="card-title">Translation</h5> \
      <p class="card-subtitle translation mb-2 text-muted">'+ newCardObject.translation +'</p>\
      <button type="submit" id="create-card-'+ id +'" class="make-flashcard btn btn-secondary mb-2">Make Flashcard</button></div></div>'; 
    cards.push(newCardObject)
    id += 1;
    $(newCardElement).appendTo("#terms");
  }

async function createTranslation(stringToTranslate){
    const url = window.location.href.toString().replace("iframetest.php", "getTranslation.php")
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

function createFlashcard(front, back){
  const url = window.location.href.toString().replace("articleParser/iframetest.php", "flashcards/addCard.php")
  
  let cardInfo = new FormData();
  cardInfo.append("card", "{\"front\":\""+front+"\",\"back\":\""+back+"\",\"deck\":\""+languagename+"\"}");
  
  let cardAdd = new XMLHttpRequest();
  cardAdd.open("post", url, true);
  cardAdd.send(cardInfo);
}
