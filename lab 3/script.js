let registrants = [];
let virtual = 0;
let inperson = 0;

function registerUser(){

let name = document.getElementById("name").value;
let email = document.getElementById("email").value;
let company = document.getElementById("company").value;

let type = document.querySelector('input[name="type"]:checked');

let valid = true;

document.getElementById("nameError").innerHTML="";
document.getElementById("emailError").innerHTML="";
document.getElementById("typeError").innerHTML="";

if(name.length < 6 || name.length > 100){
document.getElementById("nameError").innerHTML =
"Name must be between 6 and 100 characters.";
valid=false;
}

if(!email.includes("@") || !email.includes(".")){
document.getElementById("emailError").innerHTML =
"Please enter a valid professional email address.";
valid=false;
}

if(!type){
document.getElementById("typeError").innerHTML =
"Please select your attendance type.";
valid=false;
}

if(!valid){
return false;
}

registrants.push(name);

if(type.value=="Virtual"){
virtual++;
}else{
inperson++;
}

alert("Registration Successful");

updateAnalytics();

return false;
}

function updateAnalytics(){

document.getElementById("total").innerHTML = registrants.length;
document.getElementById("virtualCount").innerHTML = virtual;
document.getElementById("personCount").innerHTML = inperson;

}

function toggleAnalytics(){

let panel = document.getElementById("analyticsPanel");
let btn = document.getElementById("analyticsBtn");

if(panel.style.display=="none"){
panel.style.display="block";
btn.innerHTML="Hide Event Analytics";
}else{
panel.style.display="none";
btn.innerHTML="Show Event Analytics";
}

}