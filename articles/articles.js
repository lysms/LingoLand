//Javascript and Jquery for projects

//Jquery for the project below
$(document).ready(function() {

    // Click function for changing article genre and language
    $("#English").click(function() {
        $("#dropdownMenuButton").text("English");
        // document.getElementsByClassName("LanguageDisplay").innerHTML = "English-Lol"; This method doesnt work
        alert("Look! English-Lol");
    });

    $("#Germany").click(function() {
        $("#dropdownMenuButton").text("Deutsch");
        alert("Aussehen! Deustch-Lol");
    });

    $("#Chinese").click(function() {
        $("#dropdownMenuButton").text("中文");
        alert("看! 中文-哈哈");
    });

    $("#Technology").click(function() {
        $("#dropdownMenuButtonPri").text("Technology");
        alert("Look! Technology Coming up!");
    });

    $("#Humanity").click(function() {
        $("#dropdownMenuButtonPri").text("Humanity");
        alert("Look! HASS Coming up!");
    });

    $("#Politics").click(function() {
        $("#dropdownMenuButtonPri").text("Trumpian");
        alert("Look! Trump is Coming up!");
    });
});


//This is a function for speech input
function speakText() {
    var text = document.getElementById('txt').value;
    responsiveVoice.speak(text);

}


//This is a function for speech to be stopped
function stopSpeak() {
    responsiveVoice.cancel();
}


//This is for displaying articles 
//check what the setting language is, 3 languages in total
//if ($("#dropdownMenuButton").text() == "中文") {
    var i, x = "";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var myObj = JSON.parse(this.responseText);
            //check what genre user needs, 3 types in total
            //if ($("#dropdownMenuButtonPri").text() == "Technology") {

                for (i in myObj.article_Technology) {
                    x += myObj.article_Technology[i].name + "<br>";
                }
                document.getElementById("Output-div").innerHTML = x;
            //}


        }
    };
    xmlhttp.open("GET", "articles_Chinese.txt", true);
    xmlhttp.send();
//}
