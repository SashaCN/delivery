let password = document.querySelector("input[type=password]"),
    show_password = document.querySelector(".show");
    
show_password.oninput = togglePassword;
    
function togglePassword ()
{
  
  if (this.checked) {
    password.setAttribute("type", "text");
  } else {
    password.setAttribute("type", "password");
  }
}