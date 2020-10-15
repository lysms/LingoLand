//Javascript and Jquery for project's articles part

//Jquery for the articles below
$(document).ready(function() {

    // Click function for changing article genre and language
    // English part
    $("#English").click(function() {
        $("#dropdownMenuButton").text("English");
        // document.getElementsByClassName("LanguageDisplay").innerHTML = "English-Lol"; This method doesnt work. Solution is that to add[0] behind (LanguageDisplay)
        alert("Look! English-Lol");
        $("#Technology").click(function() {
            $("#dropdownMenuButtonPri").text("Technology");
            alert("Look! Technology is coming up!");
            //This is for displaying articles 
            //The first one is for the Technology
            var i, x = "";
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var myObj = JSON.parse(this.responseText);

                    // I use for--in-- iteration to go through all elements in the array
                    for (i in myObj.article_Technology) {
                        x += "<li><a href='" + myObj.article_Technology[i].url + "'>" + myObj.article_Technology[i].name + " </a>" + "<br></li>";
                    }
                    document.getElementById("Output-div").innerHTML = x;


                }
            };
            xmlhttp.open("GET", "articles_English.txt", true);
            xmlhttp.send();
        });
        $("#Humanity").click(function() {
            $("#dropdownMenuButtonPri").text("Humanity");
            alert("Look! HASS is coming up!");
            //The second one is for the Humanity
            var i, x = "";
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var myObj = JSON.parse(this.responseText);

                    // I use for--in-- iteration to go through all elements in the array
                    for (i in myObj.article_Humanity) {
                        x += "<li><a href='" + myObj.article_Humanity[i].url + "'>" + myObj.article_Humanity[i].name + " </a>" + "<br></li>";
                    }
                    document.getElementById("Output-div").innerHTML = x;


                }
            };
            xmlhttp.open("GET", "articles_English.txt", true);
            xmlhttp.send();
        });
        $("#Politics").click(function() {
            $("#dropdownMenuButtonPri").text("Politicians-emmm");
            alert("Look! Politics is Coming up!");
            //The third one is for the Politics
            var i, x = "";
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var myObj = JSON.parse(this.responseText);

                    // I use for--in-- iteration to go through all elements in the array
                    for (i in myObj.article_Politics) {
                        x += "<li><a href='" + myObj.article_Politics[i].url + "'>" + myObj.article_Politics[i].name + " </a>" + "<br></li>";
                    }
                    document.getElementById("Output-div").innerHTML = x;

                }
            };
            xmlhttp.open("GET", "articles_English.txt", true);
            xmlhttp.send();
        });

    });


    // Germany part
    $("#Germany").click(function() {
        $("#dropdownMenuButton").text("Deutsch");
        alert("Aussehen! Deustch-Lol");
        $("#Technology").click(function() {
            $("#dropdownMenuButtonPri").text("Technology");
            alert("Look! Technology is coming up!");
            //This is for displaying articles 
            //The first one is for the Technology
            var i, x = "";
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var myObj = JSON.parse(this.responseText);

                    // I use for--in-- iteration to go through all elements in the array
                    for (i in myObj.article_Technology) {
                        x += "<li><a href='" + myObj.article_Technology[i].url + "'>" + myObj.article_Technology[i].name + " </a>" + "<br></li>";
                    }
                    document.getElementById("Output-div").innerHTML = x;


                }
            };
            xmlhttp.open("GET", "articles_Germany.txt", true);
            xmlhttp.send();
        });
        $("#Humanity").click(function() {
            $("#dropdownMenuButtonPri").text("Humanity");
            alert("Look! HASS is coming up!");
            //The second one is for the Humanity
            var i, x = "";
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var myObj = JSON.parse(this.responseText);

                    // I use for--in-- iteration to go through all elements in the array
                    for (i in myObj.article_Humanity) {
                        x += "<li><a href='" + myObj.article_Humanity[i].url + "'>" + myObj.article_Humanity[i].name + " </a>" + "<br></li>";
                    }
                    document.getElementById("Output-div").innerHTML = x;


                }
            };
            xmlhttp.open("GET", "articles_Germany.txt", true);
            xmlhttp.send();
        });
        $("#Politics").click(function() {
            $("#dropdownMenuButtonPri").text("Politicians-emmm");
            alert("Look! Politics is Coming up!");
            //The third one is for the Politics
            var i, x = "";
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var myObj = JSON.parse(this.responseText);

                    // I use for--in-- iteration to go through all elements in the array
                    for (i in myObj.article_Politics) {
                        x += "<li><a href='" + myObj.article_Politics[i].url + "'>" + myObj.article_Politics[i].name + " </a>" + "<br></li>";
                    }
                    document.getElementById("Output-div").innerHTML = x;

                }
            };
            xmlhttp.open("GET", "articles_Germany.txt", true);
            xmlhttp.send();
        });

    });


    // Chinese part
    $("#Chinese").click(function() {
        $("#dropdownMenuButton").text("中文");
        alert("看! 中文-哈哈");
        $("#Technology").click(function() {
            $("#dropdownMenuButtonPri").text("Technology");
            alert("Look! Technology is coming up!");
            //This is for displaying articles 
            //The first one is for the Technology
            var i, x = "";
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var myObj = JSON.parse(this.responseText);

                    // I use for--in-- iteration to go through all elements in the array
                    for (i in myObj.article_Technology) {
                        x += "<li><a href='" + myObj.article_Technology[i].url + "'>" + myObj.article_Technology[i].name + " </a>" + "<br></li>";
                    }
                    document.getElementById("Output-div").innerHTML = x;


                }
            };
            xmlhttp.open("GET", "articles_Chinese.txt", true);
            xmlhttp.send();
        });
        $("#Humanity").click(function() {
            $("#dropdownMenuButtonPri").text("Humanity");
            alert("Look! HASS is coming up!");
            //The second one is for the Humanity
            var i, x = "";
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var myObj = JSON.parse(this.responseText);

                    // I use for--in-- iteration to go through all elements in the array
                    for (i in myObj.article_Humanity) {
                        x += "<li><a href='" + myObj.article_Humanity[i].url + "'>" + myObj.article_Humanity[i].name + " </a>" + "<br></li>";
                    }
                    document.getElementById("Output-div").innerHTML = x;


                }
            };
            xmlhttp.open("GET", "articles_Chinese.txt", true);
            xmlhttp.send();
        });
        $("#Politics").click(function() {
            $("#dropdownMenuButtonPri").text("Politicians-emmm");
            alert("Look! Politics is Coming up!");
            //The third one is for the Politics
            var i, x = "";
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var myObj = JSON.parse(this.responseText);

                    // I use for--in-- iteration to go through all elements in the array
                    for (i in myObj.article_Politics) {
                        x += "<li><a href='" + myObj.article_Politics[i].url + "'>" + myObj.article_Politics[i].name + " </a>" + "<br></li>";
                    }
                    document.getElementById("Output-div").innerHTML = x;

                }
            };
            xmlhttp.open("GET", "articles_Chinese.txt", true);
            xmlhttp.send();
        });

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