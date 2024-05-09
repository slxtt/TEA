<?php
include 'components/core.php';

if(isset($_POST['go-cart'])){
    $_SESSION['cart'][] = $_POST['id'];
    header("Location: menu.php");
}

if(isset($_POST['remove'])){
    $key = array_search($_POST['id'], $_SESSION['cart']);
    unset($_SESSION['cart'][$key]);
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
    <title>Корзина</title>
</head>
<body>
    <div class="menu">
        <div class="left">
            <div class="static">
            <div class="mainstr">
                <a <?= href('index')?>>
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
            <h1>Корзина</h1>
            <div class="line">
                <div class="line1"></div>
            </div>
            <?php
            if(!empty($_SESSION['cart'])){
                $cart = implode(", ", $_SESSION['cart']);
                $catalog = $link->query("SELECT * FROM `catalog` WHERE `id` IN ($cart) ");
                $num = array_count_values($_SESSION['cart']);
                $allproduct = count($_SESSION['cart']);
                $totalprice = 0;
                ?>
                
                <?php
                while($row = mysqli_fetch_array($catalog)){
                    $totalprice += $row['price']*$num[$row['id']];
                    ?>
                    <form action="korzina.php" class="cart" method="POST">
                    <div class="left-tovar">
                        <img src="./img/kartochka_tovara/<?= $row['img'] ?>.jpg" alt="">
                    </div>
                    <div class="right-tovar" style="margin-top: 50px">
                        <input type="hidden" value="<?=$row['id']?>" name="id">
                        <p style="color: #282828; font-size: 25px; font-weight: 500; margin-right: 10px;"><?=$row['name']?></p>
                        <p style ="color: #e07f00; font-size: 30px; font-weight: 900; "><?=$row['price']?> ₽</p>
                        <p style="color: gray; font-size: 15px; font-weight: 500; margin-right: 10px;">В корзине всего: <?= $num[$row['id']]?> единиц товара</p>
                        <button name="remove" class="remove">x</button>
                    </div>
                    </form>
                <?php
                    } 
                ?>
                <div class="line">
                    <div class="line1"></div>
                </div>
                <div class="fullprice">
                    <p style="color: #282828; font-size: 25px; font-weight: 500; margin-right: 10px;"><?=$allproduct?> товар(а) на сумму: </p><p style ="color: #e07f00; font-size: 30px; font-weight: 900;"><?=$totalprice?> ₽</p>
                </div>
                <div class="but">
                <form action="action/delete-cart.php" method="post">
                    <button name="delete" class="delete">Очистить корзину</button>
                </form>
                <form action="order.php" method="post">
                    <button name ="order" class="order">Оформить заказ</button>
                </form>
                </div>
                <?php
            }
                else{
            ?>
                <h2 style="margin-bottom: 685px">Корзина пуста</h2>
            <?php
                }
            ?>

            
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