<?php

include '../../components/core.php';

if(isset($_POST['add'])){
  $name = $_POST['name'];
  $type = $_POST['type'];
  $description = $_POST['description'];
  $quantity = $_POST['quantity'];
  $color = $_POST['color'];
  $price = $_POST['price'];
  $image = $_POST['img'];
  
  $img = substr($image, 0, -4);

  $link->query("INSERT INTO `catalog`(`name` , `img`, `type` , `description`, `quantity`, `color`, `price`)  VALUE ('{$name}', '{$img}', '{$type}', '{$description}', '{$quantity}', '{$color}', '{$price}')");
}

header("Location: ../admin-catalog.php")

?>