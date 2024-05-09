<?php
include '../components/core.php';



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/menu.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500;700;900&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="../img/TEAicon.png" type="image/x-icon">
  <title>TEA</title>
</head>

<body>
  <main>
    <div class="menu">
      <div class="left">
        <div class="static">
          <div class="mainstr">
            <a href="../index.php">
              <img src="../img/icon/krest.png" alt="">
            </a>
          </div>
          <p><a <?= href('../index')?> class="glavnaya">Главная</a></p>
          <p><a <?= href('../menu')?> class="katalog">Каталог</a></p>
          <p><a <?= href('../dostavka')?> class="dostavka">Доставка и оплата</a></p>
          <p><a <?= href('../korzina')?> class="korzina">Корзина</a></p>
        </div>
      </div>
      <div class="right">
        <p class="p1">Каталог</p>
        <form action="search.php" method="POST">
          <input type="search" placeholder="Введите интересующий вас товар" class="searchtext" name="search-text">
          <button name="search" class="search"><img src="../img/icon/search.png" alt=""></button>
        </form>
        <p class="p2">Фильтры</p>
        <form name="form" action="filter.php" method="post" class="filter">
                    <button name="kresla">Кресла</button>
                    <button name="divan">Диваны</button>
                    <button name="posyda">Посуда</button>
                    <button name="teksctil">Текстиль</button>
                    <button name="dekor">Декор</button>
                    <button name="shkaf">Шкафы</button>
                    <a href="../menu.php"><img src="../img/icon/krest.png" alt=""></a>
                </form>


        <div class="line">
          <div class="line1"></div>
        </div>

        <?php
        if(isset($_POST['go'])){
          $filter = $_POST['filter'];
          $catalog = $link->query("SELECT * FROM `catalog` WHERE `type` = '{$filter}'");
                
          while ($product = $catalog->fetch_assoc()) {
                    ?>
                    <form action="../korzina.php" method="POST" class="tovar1">
                        <input type="hidden" value="<?=$product['id']?>" name="id">
                        <div class="left-tovar">
                            <img src="../img/kartochka_tovara/<?= $product['img'] ?>.jpg" alt="">
                        </div>
                        <div class="right-tovar">
                            <p class="name">
                                <?= $product['name'], ', ', $product['color'] ?>
                            </p>
                            <p class="cena">
                                <?= $product['price'] ?> ₽ 
                            </p>
                            <p class="opisanie">
                                <?= $product['description'] ?>
                            </p>
                            <?php
                            if($product['quantity']>0){
                                ?>
                                <p class="opisanie"> В наличии: <?= $product['quantity']?> ед-ц</p>
                                <button name="go-cart" class="dobavit">Добавить в корзину</button>
                                <?php
                            }else{
                                ?>
                                <p class="name"> Нет в наличии!</p>
                                <?php
                            }
                            ?>
                        </div>
                    </form>
          <?php
        }
      }
        ?>

      </div>
    </div>
  </main>
  <footer>
    <div class="upfoot">
      <img src="../img/TEA.png">
      <a href="../index.php">
        <p>Главная</p>
      </a>
      <a href="../menu.php">
        <p>Каталог</p>
      </a>
      <a href="../dostavka.php">
        <p>Доставка и оплата</p>
      </a>
      <a href="../korzina.php">
        <p>Корзина</p>
      </a>
    </div>
  </footer>
</body>

</html>