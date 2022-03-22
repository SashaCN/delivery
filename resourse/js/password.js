let password = document.querySelectorAll("input[type=password]"),
    show_password = document.querySelectorAll(".show"),
    submit = document.querySelector("input[type=submit]");
    
for (let i = 0; i < show_password.length; i++) {
  show_password[i].onclick = function togglePassword () {
    if (this.checked) {
      password[i].setAttribute("type", "text");
    } else {
      password[i].setAttribute("type", "password");
    }
  }
}

submit.onclick = function verifyPassword (e){
  if(password[0].value == password[1].value){
    return true;
  }
  return false;
}