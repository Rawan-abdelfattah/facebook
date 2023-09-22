// let useremail=document.querySelector('#email')
// let userpassword=document.querySelector('#password')
// console.log(hi);
// document.getElementsByClassemail('form1').onsunmit=
// function(e){
//     console.log(useremail.value);


// }
// function validat(){
//     if(useremail.value==''||userpassword.value==''){
//     document.getElementsByClassName('error').innerHTML='hi';
//     }
// }
var email = localStorage.getItem("email");
var password = localStorage.getItem("password");
// Add an event listener to the logout button
document.getElementById("btn1").addEventListener("click", function() {
  // Delete the information from local storage
  localStorage.removeItem("password");
  localStorage.removeItem("email");
});