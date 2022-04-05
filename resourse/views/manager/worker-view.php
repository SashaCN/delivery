<div class="main">
  <h2>Мой аккаунт</h2>
  <ul class="profile-data">
    <li><b>Имя</b>: <?=$worker["name"]?></li>
    <li><b>Телефон</b>: <?=$worker["login"]?></li>
    <li><b>Отделение</b>: <?=$worker["department_id"]?></li>
    <li><b>Должность</b>: <?=($worker["role"] == '1')?"Админ":"Менеджер"?></li>
  </ul>
  <p class="button-line flex">
    <a href="#" class="button" id="change">Изменить</a>
    <a href="logout" class="button" id="logout">Выйти</a>
  </p>
  <script src="../resourse/js/action.js"></script>
</div>
