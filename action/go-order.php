<?php

include '../components/core.php';

if(isset($_POST['submit'])){
  $cart = implode(", ", $_SESSION['cart']);
  $catalog = $link->query("SELECT * FROM `catalog` WHERE `id` IN ($cart) ");
  $num = array_count_values($_SESSION['cart']);
  $allproduct = count($_SESSION['cart']);
  $totalprice = 0;
  while($row = mysqli_fetch_array($catalog)){
  $totalprice += $row['price']*$num[$row['id']];
  $quantity = $num[$row['id']];
  $link->query("UPDATE `catalog` SET `quantity`= `quantity` - '{$quantity}' WHERE `id` = '{$row['id']}'");
}


  $link->query("INSERT INTO `orders`(`name`, `surname`, `phone`, `email`, `totalPrice`, `products`, `status`) VALUES ('{$_POST['name']}', '{$_POST['surname']}', '{$_POST['phone']}', '{$_POST['email']}', '{$totalprice}', '{$cart}', 'Принят')");

  unset($_SESSION['cart']);
  header("Location: ../");
}
?>