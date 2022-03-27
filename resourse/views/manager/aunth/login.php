<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="resourse/css/password.css">
</head>

<body>
  <form method="POST">
    <input type="text" name="login" placeholder="login">
    <span><?=((isset($worker->error["login"]))?$worker->error["login"]:false)?></span>
    <p class="password_line">
      <input type="password" name="password" placeholder="password">
      <input type="checkbox" class="show">
      <span class="eye"></span>
    </p>
    <input type="submit" value="Send">
  </form>
  <script src="resourse/js/password.js"></script>
</body>

</html>