const logoutButton = document.getElementById("nav_button_logout");
const homeButton = document.getElementById("nav_button_home");
const phoneButton = document.getElementById("nav_button_phone");
const userButton = document.getElementById("nav_button_user");
const cont = document.getElementById("container_button");

userButton.addEventListener("click", function() {
  window.location.href = "user.php"; 
});

phoneButton.addEventListener("click", function() {
  window.location.href = "contacts.php";
});

homeButton.addEventListener("click", function() {
  window.location.href = "home.php";
});

logoutButton.addEventListener("click", function() {
    
  window.location.href = "logout.php";
});

const menu = document.getElementById("menu");
menu.addEventListener("click", function() {
  //se clicco devono comparire le opzioni
  this.classList.add("hidden");
  cont.style.display = "flex";
  cont.style.flexDirection = "column";
  cont.classList.add("container_button_piccolo");
});


