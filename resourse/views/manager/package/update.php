<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update package</title>
</head>
<body>
  <form action="" method="POST">
    <?php if(isset($package) && !empty($package)): ?>
      <input type="text" name="type" placeholder="type" value="<?=$package['Pack_type_id']?>">
      <input class="date" type="date" name="date" value="<?=stristr($package['Created_at'], ' ', true)?>"> 
      <input type="text" name="user_from" placeholder="User from" value="<?=$package['User_id_from']?>"> 
      <input type="text" name="user_to" placeholder="User to" value="<?=$package['User_id_to']?>"> 
      <input type="text" name="address_to" placeholder="Address to" value="<?=$package['Address_id']?>"> 
      <input type="text" name="status" placeholder="Status" value="<?=$package['Status']?>"> 
      <input type="text" name="manager" placeholder="Manager" value="<?=$package['Manager_id']?>"> 
      <input type="text" name="address_from" placeholder="Address from" value="<?=$package['Address_from']?>"> 
      <input type="submit" value="send">
    <?php endif ?>
  </form>
</body>
</html>