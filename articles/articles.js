//Javascript and Jquery for project's articles part

//Jquery for the articles below
var languageToKey = {}

/* 
	function called to populate our selection input with all languages available to the user through our webpage, based on all languages listed in our 
	identifiableLanguages.json.
*/
$(document).ready(function () {
    $.getJSON("./identifiableLanguages.json", function (data) {
        var languages = []
        $.each(data.languages, function (key, language) {
            languages.push('<option value="' + language.name + '">' + language.name + '</option>')
            languageToKey[language.name] = language.language;
        })

        $(languages.join("")).appendTo("#language-select");

    })
    /*function called to query for articles based on the users keyword filter and language specified.*/
    $("#search-articles").submit(async function (e) {
        e.preventDefault();
        const formInputs = $('#search-articles').serializeArray();
        console.log(formInputs);
        const articles = await getArticles(formInputs[1].value, formInputs[0].value);
        document.getElementById("articles").innerHTML = articles
        /*takes the returned html from the API and changes the linked uri to our site, with the uri tagged as a uri query variable*/ 
        $("#articles > table > tbody > tr > td > a").each(function () {
            const modifiedhref = this.href.replace("javascript:window.open('", "").replace("');", "").replaceAll("%27", "");
            this.href = window.location.href.toString().replace("/articles/articles.php", "/articleParser/iframetest.php?uri=") + modifiedhref + "&language=" + languageToKey[formInputs[1].value] + "&languagename=" + formInputs[1].value;
        })
    })
});


// Get data for API of searching articles
function getArticles(language, keyword) {
    console.log(language, keyword);
    const url = window.location.href.toString().replace("articles.php", "getArticles.php");
    const result = $.ajax({
        type: 'GET',
        url: url,
        contentType: "application/html",
        data: {
            "language": language,
            "keyword": keyword
        },
        success: function (res) {
            return res;
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) { // if there was a problem
            console.log(XMLHttpRequest, textStatus, errorThrown);
            alert('Error Occured');
        }
    });

    return new Promise((resolve, reject) => {
        if (result) {
            resolve(result);
        } else {
            reject();
        }
    })
}