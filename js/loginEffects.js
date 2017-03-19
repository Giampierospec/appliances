//VARIABLES

//functions

function showEffects(){
  $(".jumbotron, footer").hide(0,showJumbotronAndFooter);
}

function showJumbotronAndFooter(){
  $(".jumbotron, footer").fadeIn(5000,stopBouncing).addClass("animated pulse infinite");
}
function stopBouncing(){
  $(".jumbotron, footer").removeClass("animated pulse infinite");
}

//events
$(document).ready(showEffects);
