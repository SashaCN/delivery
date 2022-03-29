<div class="main">
  <h2>Мой аккаунт</h2>
  <ul class="profile-data">
    <li><b>Имя</b>: <?=$user["User_name"]?></li>
    <li><b>Телефон</b>: <?=$user["Phone"]?></li>
    <li><b>Адресс</b>: <?=$user["Default_address"]?></li>
  </ul>
  <p class="button-line flex">
    <a href="#" class="button" id="change">Изменить</a>
    <a href="logout" class="button" id="logout">Выйти</a>
  </p>
  <script src="resourse/js/action.js"></script>
</div>
