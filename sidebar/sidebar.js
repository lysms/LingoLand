

$(document).ready(function(){
    $('#terms').hide();
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        if($("#wrapper").hasClass("toggled")){
            $('#terms').fadeIn();
        }else{
            $('#terms').hide();
        }
    });

    $(window).resize(function(e) {
      if($(window).width()<=768){
        $("#wrapper").removeClass("toggled");
        $('#terms').hide();
      }else{
        $("#wrapper").addClass("toggled");
        $('#terms').show();
    }
    });
})