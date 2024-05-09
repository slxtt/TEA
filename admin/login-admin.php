<?php
  include '../components/core.php';
  if(isset($_SESSION['user'])){
    header("Location: admin.php");
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
  <link rel="shortcut icon" href="img/TEAicon.png" type="image/x-icon">
  <title>TEA-Admin</title>
</head>
<body>
  <header>
  <a <?= href('index')?>><img src="../img/TEA2.png" alt=""></a>
  <p>Admin-panel TEA</p>
  </header>

  <main>
    <h1>Для получения данных авторизируйтесь!</h1>

    <form action="admin-action/auth.php" class="auth" method="POST">
      <input type="text" placeholder="Логин" name="login">
      <input type="password" placeholder="Пароль" name="password">
      <button name="go-admin">Войти</button>
      <?php
      if(isset($_SESSION['errors'])){
        foreach($_SESSION['errors'] as $key => $value):
          ?>
          <p class="error"> <?= $value?></p>
          <?php
        endforeach;
      }
        unset($_SESSION['errors']);
      ?>
    </form>
  </main>
</body>
</html>