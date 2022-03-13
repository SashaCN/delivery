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
    <?php print_r($data); if(isset($data) && !empty($data)): ?>
      <input type="text" name="type" placeholder="type" value="<?=$data['package']['Pack_type_id']?>">
      <input class="date" type="date" name="date" value="<?=stristr($data['package']['Created_at'], ' ', true)?>"> 
      <input type="text" name="user_from" placeholder="User from" value="<?=$data['package']['User_id_from']?>"> 
      <input type="text" name="address_to" placeholder="Address to" value="<?=$data['package']['Address_id']?>"> 
      <input type="text" name="status" placeholder="Status" value="<?=$data['package']['Status']?>"> 
      <input type="text" name="manager" placeholder="Manager" value="<?=$data['package']['Manager_id']?>"> 
      <input type="text" name="address_from" placeholder="Address from" value="<?=$data['package']['Address_from']?>"> 
      <input type="submit" value="send">
    <?php endif ?>
  </form>
</body>
</html>