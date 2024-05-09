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
    <div class="line">
      <div class="line1"></div>
    </div>
  <nav>
    <a <?= href('admin/admin')?> style="margin-right: 40px;" >Статистика</a>
    <a <?= href('admin/admin-catalog')?> style="margin-right: 40px; color: #e07f00">Товары</a>
    <a <?= href('admin/admin-order')?>>Заказы</a>
  </nav>

  <div class="catalog">
    <h1>Все товары</h1>
    <a <?= href('admin/admin-add')?>>Добавить товар</a>
    <form action="catalog-search.php" method="POST" class="search">
      <input type="text" placeholder="Введите интересующий товар" name="search-text" require>
      <button name="search" ><img src="../img/icon/search.png" alt=""></button>
    </form>
    <div class="labels">
      <p style="margin-right: 80px">img</p>
      <p style="margin-right: 140px">Название товара</p>
      <p style="margin-right: 80px">Тип</p>
      <p style="margin-right: 470px">Описание</p>
      <p style="margin-right: 40px">Кол-во</p>
      <p>Цвет</p>
    </div>
    <?php
    $catalog = $link->query("SELECT * FROM `catalog`");
    while($product = $catalog->fetch_assoc()){
?>
    <form action="admin-action/update.php" class="update" method="POST">
      <input type="hidden" name="id" value="<?=$product['id']?>">
      <input type="text" name="img" value="<?=$product['img']?>" style="width: 100px;" required>
      <input type="text" name="name" value="<?=$product['name']?>" style="width: 300px;" required>
      <input type="text" name="type" value="<?=$product['type']?>" style="width: 90px;" required>
      <input type="text" name="description" value="<?=$product['description']?>" style="width: 600px;" required>
      <input type="text" name="quantity" value="<?=$product['quantity']?>" style="width: 65px;" required>
      <input type="text" name="color" value="<?=$product['color']?>" style="width: 150px; ">
      <button name="delete" class="but-del">Удалить</button>
      <button name="update" class="upd-del">Обновить</button>
    </form>

<?php
    }
    ?>
  </div>

  </main>
</body>
</html>