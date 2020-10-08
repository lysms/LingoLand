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

    $("#Art-and-Culture").click(function() {
        $("#dropdownMenuButtonPri").text("Art and Culture");
        alert("Look! HASS Coming up!");
    });

    $("#Politics").click(function() {
        $("#dropdownMenuButtonPri").text("Trumpian");
        alert("Look! Trump is Coming up!");
    });
});

function speakText() {
    var text = document.getElementById('txt').value;
    responsiveVoice.speak(text);

}
function stopSpeak() {
    responsiveVoice.cancel();
}