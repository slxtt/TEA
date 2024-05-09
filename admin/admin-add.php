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

  <div class="neworder">
    <h1>Добавить товар</h1>

    <form action="admin-action/add.php" class="add" method="POST">
      <p>Название товара</p>
      <input type="text" name="name" required>
      <p>Тип товара</p>
      <input type="text" name="type" required>
      <p>Изображение</p>
      <input type="file" name="img">
      <p>Описание товара</p>
      <textarea name="description" cols="30" rows="10" required></textarea>
      <p>Количество</p>
      <input type="text" name="quantity" required>
      <p>Цвет</p>
      <input type="text" name="color">
      <p>Цена</p>
      <input type="text" name="price">
      <button name="add">Добавить товар</button>
    </form>
  </div>