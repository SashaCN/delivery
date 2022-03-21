<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="stylesheet" href="resourse/css/password.css">
</head>

<body>
  <form action="" method="POST">
    <input type="text" name="phone" placeholder="phone">
    <span><?=((isset($user->error["phone"]))?$user->error["phone"]:false)?></span>
    <input type="text" name="name" placeholder="name">
    <input type="text" name="default_address" placeholder="address">
    <p class="password_line">
      <input type="password" name="password" placeholder="password">
      <input type="checkbox" class="show">
    </p>
    <input type="submit" value="Send">
  </form>
  <script src="resourse/js/show_password.js"></script>
</body>

</html>