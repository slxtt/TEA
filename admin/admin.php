<?php
include '../components/core.php';

if(!isset($_SESSION['user'])){
  header("Location: login-admin.php");
}

$user = $link->query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['user']['id']}'");
$userName = $user->fetch_assoc();

$price = 0;
$total = 0;
$quantity = 0;

$products = $link->query("SELECT * FROM `catalog`");
while($prod = mysqli_fetch_array($products)){
  $quantity += $prod['quantity'];
}

$sql = $link->query("SELECT * FROM `orders`");
while($row= mysqli_fetch_array($sql)){ 
  $price += $row['totalPrice'];
  $total +=1;
}
$average = $price/$total;

$formatedAvarage = number_format($average, 2,".", "");

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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
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
    <h1 style="font-weight: 900; color: #282828;">Добро пожаловать, <?= $userName['name'] ?></h1>
    <div class="line">
      <div class="line1"></div>
    </div>
  <nav>
    <a <?= href('admin/admin')?> style="margin-right: 40px; color: #e07f00" >Статистика</a>
    <a <?= href('admin/admin-catalog')?> style="margin-right: 40px;">Товары</a>
    <a <?= href('admin/admin-order')?>>Заказы</a>
  </nav>

  <div class="stats">
    <div class="stats-info">
      <p style="font-size: 18px; font-weight: 400; color: #282828">Всего продано на сумму:</p>
      <p style="font-size: 35px; font-weight: 700; color: #282828" ><?=$price?> ₽</p>
    </div>
    <div class="stats-info">
      <p style="font-size: 18px; font-weight: 400; color: #282828">Всего заказов на сайте:</p>
      <p style="font-size: 35px; font-weight: 700; color: #282828"><?= $total?></p>
    </div>
    <div class="stats-info">
      <p style="font-size: 18px; font-weight: 400; color: #282828">Средняя сумма заказа:</p>
      <p style="font-size: 35px; font-weight: 700; color: #282828"><?= $formatedAvarage?> ₽</p>
    </div>
    <div class="stats-info">
      <p style="font-size: 18px; font-weight: 400; color: #282828">Товаров в наличии:</p>
      <p style="font-size: 35px; font-weight: 700; color: #282828"><?= $quantity?> Шт.</p>
    </div>
  </div>
  

  </main>
</body>
</html>