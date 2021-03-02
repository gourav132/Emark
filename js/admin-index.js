$(document).ready(function () {

  if ($(window).width() < 768) {

    $(".sidebar").toggleClass("toggled");

  };
  $("#ajax").load("AdminPanel.php", {});

});

function ajaxCallStart(){
    $(".loading").removeClass("d-none");
};

function ajaxCallStop(){
    $(".loading").addClass("d-none");
};

function autoClose(){
    if ($(window).width() < 768) {
      $(".sidebar").toggleClass("toggled");
    };
  };

function AddClass(param){
    ajaxCallStart();
    $("#ajax").load(param, {}, function(){
        
        ajaxCallStop();
    });
    autoClose();
    return false;
}

function ajaxstart_subButton(){
    $(".load").css("display", "block");
    $(".sub").css("display", "none");
}; 

function ajaxstop_subButton(){
    $(".sub").css("display", "block");
    $(".load").css("display", "none");
};

function ajaxstart_delButton(param){
    var deleteButton = param.concat("-button");
    var deleteLoadingButton = param.concat("-delete");
    document.getElementById(deleteButton).style.display = "none";
    document.getElementById(deleteLoadingButton).classList.remove("d-none");
}; 