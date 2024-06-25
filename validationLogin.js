let showPassword = document.getElementById("showPassword");
let password = document.getElementById("password");
showPassword.addEventListener("click", tampilSandi);

function tampilSandi() {
  if (password.type === "text") {
    password.type = "password";
  } else {
    password.type = "text";
  }
}
