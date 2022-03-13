<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="resourse/css/package_list.css">
  <title>Package list</title>
</head>
<body>
  <h1>All packages</h1>
  <div class="wrapper">
        <table>
          <tr>
            <th>Pack №</th>
            <th>Pack type</th>
            <th>Created date</th>
            <th>User from</th>
            <th>Address to</th>
            <th>Status</th>
            <th>Manager</th>
            <th>Address from</th>
            <th></th>
          </tr>
          <?php foreach ($data["packages"] as $package):?>
            <tr>
              <?php foreach ($package as $info):?>
                <td><?=$info?></td>
                <?php endforeach?>
              <td><a href='package-view?id=<?=$package["Pack_id"]?>'>Инфо</a></td>
              <td><a href='package-update?id=<?=$package["Pack_id"]?>'>Редактировать</a></td>
            </tr>
          <?php endforeach?>
        </table>
  </div>
</body>
</html>
<?php 

