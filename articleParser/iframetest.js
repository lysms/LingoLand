
var iframe = document.getElementById("article");
var idoc= iframe.contentWindow;

$(iframe).on('load',function(){
    $(this).contents().find("body").on('click', function(event){
        var sel = idoc.getSelection().toString();
        const color = getRandomColor();
        console.log(color);
        console.log(sel);
        $(this).contents().find("body").highlight(sel, color, id, idoc);
        createTranslation(sel).then(function(translation){
          console.log(translation.translations);
          createCard(sel, translation.translations[0].translation, "lorem ipsum dolor", color);
        });
    })

    // var sel = getSelection().toString();
    // const color = getRandomColor();
    // console.log(color);
    // $(body).highlight(sel, color, id);
    // id +=1;
});