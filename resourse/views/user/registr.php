<div class="main">
  <link rel="stylesheet" href="resourse/css/main.css">
  <link rel="stylesheet" href="resourse/css/login.css">
  <link rel="stylesheet" href="resourse/css/password.css">
  <form class="login_form" action="" method="POST">
    <p><input type="text" name="phone" placeholder="phone" required></p>
    <p class="registr-error"><b><?=((isset($user->error["phone"]))?$user->error["phone"]:false)?></b></p>
    <p><input type="text" name="name" placeholder="name" required></p>
    <p class="registr-error"><b><?=((isset($user->error["name"]))?$user->error["name"]:false)?></b></p>
    <p><input type="text" name="default_address" placeholder="address" required></p>
    <p class="password_line">
      <input type="password" name="password" placeholder="password" required>
      <input type="checkbox" class="show">
      <span class="eye"></span>
    </p>
    <p class="registr-error"><b><?=((isset($user->error["password"]))?$user->error["password"]:false)?></b></p>
    <p class="password_line">
      <input type="password" name="confirm_password" placeholder="Confirm password" required>
      <input type="checkbox" class="show">
      <span class="eye"></span>
    </p>
    <p class="registr-error verify-password"><b></b></p>
    <p><input type="submit" class="registr" value="Send"><p>
  </form>
</div>
<script src="resourse/js/password.js"></script>