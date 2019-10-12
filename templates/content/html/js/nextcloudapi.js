function uploadClick() {
  //// TODO:
  alert("Upload");
}

function downloadClick(){
  //// TODO:
  alert("Download");
}

function viewClick(){
  //// TODO:
  alert("View");
}

function shareClick(){
  //// TODO:
  alert("Share");
}
function deleteClick(){
  // TODO:
  alert("Delete");
}
//jQuery
//Change action when photo is right-clicked (contextmenu)
$('.photo').bind("contextmenu", function (event) {

  event.preventDefault();
  //shows custom context menu in mouse position
  $(".custom-contextmenu").finish().toggle().
  css({
    top: event.pageY + "px",
    left: event.pageX + "px"
  });
});
//if click somewhere other than contextmenu, hide it
$(document).bind("mousedown", function (e) {
  if(!$(e.target).parents(".custom-contextmenu").length > 0){
    $(".custom-contextmenu").hide();
  }
});
//if menu element clicked
$(".custom-contextmenu li").click(function(){
  switch($(this).attr("data-action")){
    case "download": downloadClick(); break;
    case "share": shareClick(); break;
    case "delete": deleteClick(); break;
  }
  $(".custom-contextmenu").hide();
});
