//Javascript and Jquery for project's articles part

//Jquery for the articles below
$(document).ready(function() {
    // Click searching for more articles given by API
    $("#search").click(async function(){
        if (document.getElementById("dropdownMenuButton").innerHTML == "Language"||document.getElementById("dropdownMenuButtonPri").innerHTML == "Article Classes"){
            alert("Please choose language the choose the article class");
            location.reload();
        }
        else{
            const articles = await getArticles();
            console.log(articles);
        }
        
    });




    // Click function for changing article genre and language
    // English part
    $("#English").click(function() {
        $("#dropdownMenuButton").text("English");
        // document.getElementsByClassName("LanguageDisplay").innerHTML = "English-Lol"; This method doesnt work. Solution is that to add[0] behind (LanguageDisplay)
        alert("Look! English-Lol");
        $("#Technology").click(function() {
            $("#dropdownMenuButtonPri").text("Technology");
            if (document.getElementById("dropdownMenuButton").innerHTML == "English") {
                alert("Look! Technology is coming up!");
            }

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
            if (document.getElementById("dropdownMenuButton").innerHTML == "English") {
                alert("Look! Culture is coming up!");
            }

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
            $("#dropdownMenuButtonPri").text("Politics");
            if (document.getElementById("dropdownMenuButton").innerHTML == "English") {
                alert("Look! Politics is coming up!");
            }

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


    // German part
    $("#Germany").click(function() {
    	$("#dropdownMenuButton").text("German");
        alert("Aussehen! Deustch!");
        $("#Technology").click(function() {
            $("#dropdownMenuButtonPri").text("Technology");
            if (document.getElementById("dropdownMenuButton").innerHTML == "German") {
                alert("Technologie!");
            }

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
            if (document.getElementById("dropdownMenuButton").innerHTML == "German") {
                alert("Kultur!");
            }

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
            $("#dropdownMenuButtonPri").text("Politics");
            if (document.getElementById("dropdownMenuButton").innerHTML == "German") {
                alert("Politik!");
            }

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
    	$("#dropdownMenuButton").text("Chinese");
        alert("看! 中文-哈哈");
        document.getElementById("Right-Resources").innerHTML += "<br><li><a href='http://www.people.com.cn/'>人民日报</a>";

        //subbutton for choosing the topic
        $("#Technology").click(function() {
            $("#dropdownMenuButtonPri").text("Technology");
            if (document.getElementById("dropdownMenuButton").innerHTML == "Chinese") {
                alert("接下来是科技篇");
            }

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
            if (document.getElementById("dropdownMenuButton").innerHTML == "Chinese") {
                alert("接下来是人文篇");
            }
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
            $("#dropdownMenuButtonPri").text("Politics");
            if (document.getElementById("dropdownMenuButton").innerHTML == "Chinese") {
                alert("接下来是政治篇");
            }
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


function getArticles(){
    // Get data for API of searching articles
    const url =  window.location.href.toString().replace("articles.php", "getArticles.php");
    const result = $.ajax({    
        type: 'GET',
        url: url,
        contentType: "application/json",
        data: {
            language: document.getElementById("dropdownMenuButton").innerHTML,
            keyword: document.getElementById("dropdownMenuButtonPri").innerHTML
        },
        success: function(res){
           return res;
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { // if there was a problem
        console.log(XMLHttpRequest, textStatus, errorThrown);
        alert('Error Occured');
        }
    });

    return new Promise((resolve, reject) => {
        if(result){
          resolve(result);
        } else{
          reject();
        }
    })
}





function check() {
    if (document.getElementById("dropdownMenuButton").innerHTML == "Language") {
        alert("Choose a language!");
        location.reload();
    }
}