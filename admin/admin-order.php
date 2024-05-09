<?php
include '../components/core.php';

if(!isset($_SESSION['user'])){
  header("Location: login-admin.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/login-admin.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500;700;900&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="../img/TEAicon.png" type="image/x-icon">
  <title>TEA-Admin</title>
</head>
<body>
  <header>
  <a <?= href('index')?>><img src="../img/TEA2.png" alt=""></a>
  <p>Admin-panel TEA</p>
  <form action="admin-action/logout.php">
    <button name="leave" class="leave">Выйти</button>
  </form>
  </header>
  <main>
    <div class="line">
      <div class="line1"></div>
    </div>
  <nav>
    <a <?= href('admin/admin')?> style="margin-right: 40px;" >Статистика</a>
    <a <?= href('admin/admin-catalog')?> style="margin-right: 40px;">Товары</a>
    <a <?= href('admin/admin-order')?> style="color: #e07f00">Заказы</a>
  </nav>

  <div class="orders">

  <div class="labels">
      <p style="margin-right: 40px">Статус</p>
      <p style="margin-right: 10px">Н/з</p>
      <p style="margin-right: 80px">Заказчик</p>
      <p style="margin-right: 48px">Телефон</p>
      <p style="margin-right: 130px">Email</p>
      <p style="margin-right: 40px">Стоимость</p>
      <p>Товары</p>
    </div>

  <?php
    $orders = $link->query("SELECT * FROM `orders`");
    while($order = mysqli_fetch_array($orders)){
  ?>
    <form action="admin-action/update-status.php" class="form-orders" method="POST">
      
      <select name="status">
        <option <?php if($order['status'] == 'Принят'){ echo ' selected="selected"'; } ?> value="Принят">Принят</option>
        <option <?php if($order['status'] == 'В обработке'){ echo ' selected="selected"'; } ?> value="В обработке">В обработке</option>
        <option <?php if($order['status'] == 'Выполняется'){ echo ' selected="selected"'; } ?> value="Выполняется">Выполняется</option>
        <option <?php if($order['status'] == 'Выполнен'){ echo ' selected="selected"'; } ?> value="Выполнен">Выполнен</option>
        <option <?php if($order['status'] == 'Отменен'){ echo ' selected="selected"'; } ?> value="Отменен">Отменен</option>
      </select>
      <input type="hidden" name = "id" value="<?= $order['id']?>">
      <p style="width: 20px"><?=$order['id']?></p>
      <p name = "name" style="width: 150px"><?=$order['name'] ." ". $order['surname']?></p>
      <p name = "phone" style="width: 130px"><?=$order['phone']?></p>
      <p name = "email" style="width: 190px"><?=$order['email']?></p>
      <p name = "price" style="width: 90px"><?=$order['totalPrice']?>₽</p>
      <p name = "products" style="width: 120px"><?=$order['products']?></p>
      <button name="update-status">Обновить статус</button>
    </form>
    <div class="line">
      <div class="line1"></div>
    </div>
    <?php
  }
  ?>
  </div>

</body>

</html>
