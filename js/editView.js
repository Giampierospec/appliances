//Variables
var product;
var brand = document.getElementById("brand");
var date = document.getElementById("date");
var type = document.getElementById("type");
var weight = document.getElementById("weight");
var color = document.getElementById("color");
var comment = document.getElementById("comment");

//functions

//This function will help load the data from the localstorage
function loadData(){
  var data = localStorage.getItem("savedProducts");
  if(data != null){
    product = JSON.parse(data);
    setEditValues();
  }
}
//This function will set all my edit values
function setEditValues(){
  brand.value = product.brand;
  date.value = product.date;
  type.value = product.type;
  weight.value = product.weight;
  color.value = product.color;
  comment.value = product.comment;
}

//Event Listeners

window.addEventListener("load",loadData);
