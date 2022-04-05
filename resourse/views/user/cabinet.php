<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Official page of delivery company</title>
  <link rel="stylesheet" href="resourse/css/main.css">
  <link rel="stylesheet" href="resourse/css/cabinet.css">
</head>
<body>
  <div class="header-line">
    <div class="wrapper">
      <div class="flex">
        <form action="POST" class="search-form">
          <input type="search" name="search" id="search" class="search-input" placeholder="Search">
          <label for="search"></label>
          <input type="submit" value="" class="search-btn" id="submit">
          <label for="submit"><img src="resourse/img/search.svg"></label>
        </form>
        <nav class="menu">
          <ul>
            <li><a href="index">Главная</a></li>
            <li><a href="profile-packages?id=<?=$_SESSION["id"]?>">Мои поссылки</a></li>
            <li><a href="user-view?id=<?=$_SESSION["id"]?>"><?=$_SESSION["user"]?></a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</body>
</html>
