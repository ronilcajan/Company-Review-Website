// show password when toggle
$(".toggle-password").click(function() {
    $(this).toggleClass("bi-eye bi-eye-slash");
    var input = $($(this).attr("toggle"));
    
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

$(document).ready(function() {  
    $("#st1").click(function() {  
        $(".star-rate").css("color", "black");  
        $("#st1").css("color", "goldenrod");  
        $('#myrating').val('1');
    });  
    $("#st2").click(function() {  
        $(".star-rate").css("color", "black");  
        $("#st1, #st2").css("color", "goldenrod");  
        $('#myrating').val('2');
    });  
    $("#st3").click(function() {  
        $(".star-rate").css("color", "black")  
        $("#st1, #st2, #st3").css("color", "goldenrod");  
        $('#myrating').val('3');
    });  
    $("#st4").click(function() {  
        $(".star-rate").css("color", "black");  
        $("#st1, #st2, #st3, #st4").css("color", "goldenrod");  
        $('#myrating').val('4');
    });  
    $("#st5").click(function() {  
        $(".star-rate").css("color", "black");  
        $("#st1, #st2, #st3, #st4, #st5").css("color", "goldenrod");  
        $('#myrating').val('5');
    });  
  });  