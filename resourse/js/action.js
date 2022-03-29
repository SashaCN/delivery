let change = document.querySelector('#change'),
    logout = document.querySelector('#logout');

change.onclick = function (){
  window.prompt("Подтвердите пароль", "Пароль");
}

logout.onclick = function (){
  if (!window.confirm("Уверены, что хотите выйти с аккаунта?")) {
    return false;
  }
}