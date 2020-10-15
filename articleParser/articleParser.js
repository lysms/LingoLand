var id = 1

cards = []

function createTranslation(stringToTranslate){
  url = "https://api.au-syd.language-translator.watson.cloud.ibm.com/instances/2339c367-dbe9-4f5b-9747-db8b1ea37e00"
  urlTranslate = url + "/v3/translate?version=2018-05-01"
  //urlTranslate =  "https://test.api.randomkey.io/v1/quota"
  console.log(urlTranslate);
  $.ajax({
      beforeSend: function (xhr) {
          xhr.setRequestHeader ("Authorization", "Basic " + btoa("apikey" + ":" + "fF2CLHL3rU9x64hVoq3kH9mdHzIke5obf_n5fKFg2TpE"));
      },
      headers: {
        "Content-Type": "application/json",
      },
      type: 'POST',
      url: urlTranslate,
      data: {
          text: stringToTranslate,
          model_id: "it-en"
      },
      dataType: 'application/json',
      success: function(res){
        console.log(res);
        return res;
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) { // if there was a problem
        console.log(XMLHttpRequest, textStatus, errorThrown);
        alert('Error Occured');
      }
    });
}

function createCard(sel, translation, context){
  var newCardObject = {
    id: id,
    term: sel,
    translation: translation,
    context: context
  }
  var newCardElement = '<div id="card-'+ id +'" class="card background-green mb-4" style="width: 100%;"> \
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
        $("p.article-text").highlight(sel);
        createCard(sel, "TBD", "lorem ipsum dolor");
    })
});
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


//createTranslation("quanto")