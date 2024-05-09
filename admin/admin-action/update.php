<?php
include '../../components/core.php';

if(isset($_POST['delete'])){
  $id = $_POST['id'];
  $link->query("DELETE FROM `catalog` WHERE `id` = '{$id}'");
  header("Location: ../admin-catalog.php");
}

if(isset($_POST['update'])){
  $id = $_POST['id'];
  $img = $_POST['img'];
  $name = $_POST['name'];
  $type = $_POST['type'];
  $description = $_POST['description'];
  $quantity = $_POST['quantity'];
  $color = $_POST['color'];

  $link->query("UPDATE `catalog` SET `img` = '{$img}', `name` = '{$name}', `type` = '{$type}', `description` = '{$description}', `quantity` = '{$quantity}', `type` = '{$type}' WHERE `id` = $id ");
  header("Location: ../admin-catalog.php");
}

?>