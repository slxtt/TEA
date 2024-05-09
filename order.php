<?php
include 'components/core.php';

if(isset($_POST['order'])){
  $cart = implode(", ", $_SESSION['cart']);
  $catalog = $link->query("SELECT * FROM `catalog` WHERE `id` IN ($cart) ");
  $num = array_count_values($_SESSION['cart']);
  $allproduct = count($_SESSION['cart']);
  $totalprice = 0;
  while($row = mysqli_fetch_array($catalog)){
  $totalprice += $row['price']*$num[$row['id']];}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/korzina.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500;700;900&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="img/TEAicon.png" type="image/x-icon">
  <title>Оформление заказа</title>
</head>
<body>
<div class="menu">
        <div class="left">
            <div class="static">
            <div class="mainstr">
                <a href="index.php">
                    <img src="img/icon/krest.png" alt="">
                </a>
            </div>
              <p><a <?= href('index')?> class="glavnaya">Главная</a></p>
              <p><a <?= href('menu')?> class="katalog">Каталог</a></p>
              <p><a <?= href('dostavka')?> class="dostavka">Доставка и оплата</a></p>
              <p><a <?= href('korzina')?> class="korzina">Корзина</a></p>
            </div>
        </div>
        <div class="right">
        <h1>Оформление заказа</h1>
            <div class="line">
                <div class="line1"></div>
            </div>
            <div class="place-order">
          <form action="action/go-order.php" class="go-order" method="POST">
            <input type="text" placeholder="Фамилия" name="surname" required>
            <input type="text" placeholder="Имя" name="name" required>
            <label for="phone" style="font-size: 10px; color: grey; margin-left: 10px; z-index: 1; margin-bottom: -37px;" required>Мобильный телефон</label>
            <input type="text" value="+7" name="phone" maxlength="12" required>
            <input type="email" placeholder="Электронная почта" name="email" required>
            <button name="submit" class="order">Подтвердить заказ</button>
          </form>
          <div class="itog">
            <p>Итого: <?=$totalprice?> ₽</p>
          </div>
          </div>
        </div>
</div>
<footer>
        <div class="upfoot">
            <img src="img/TEA.png">
            <a <?= href('index')?>>
                Главная
            </a>
            <a <?= href('menu')?>>
                Каталог
            </a>
            <a <?= href('dostavka')?>>
                Доставка и оплата
            </a>
            <a <?= href('korzina')?>>
                Корзина
            </a>
        </div>
    </footer>
</body>

</html>