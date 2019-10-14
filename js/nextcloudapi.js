function downloadClick(){
  var largeImage = elementMouseIsOver;
  var url=largeImage.getAttribute('src');
  window.open(url,'Image','width=largeImage.stylewidth,height=largeImage.style.height,resizable=1');
}
function shareClick(){
  //// TODO:
  // alert("Share");
}
function deleteClick(){
  // TODO:
  // alert("Delete");
}
//jQuery
//Change action when photo is right-clicked (contextmenu)
$('.photo').bind("contextmenu", function (event) {

  event.preventDefault();
  x = event.clientX, y = event.clientY,
      elementMouseIsOver = document.elementFromPoint(x, y);
  console.log(elementMouseIsOver);
  var pagY = event.pageY-30;
  var pagX = event.pageX-300;
  //shows custom context menu in mouse position
  $(".custom-contextmenu").finish().toggle().
  css({
    top: pagY + "px",
    left: pagX + "px"
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
    case "download": downloadClick(elementMouseIsOver); break;
    case "share": shareClick(elementMouseIsOver); break;
    case "delete": deleteClick(elementMouseIsOver); break;
  }
  $(".custom-contextmenu").hide();
});
