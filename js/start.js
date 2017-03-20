//this will hide the view
function showEffects(){
  $("table,.row").hide(0,showRow);
}
//This will show the row
function showRow(){
  $(".row").fadeIn(5000,showTable);
}
//This will show the table
function showTable(){
  $("table").fadeIn(5000);
}
//triggered when is page loading time
window.addEventListener("load",showEffects);
