<?php

include '../../components/core.php';

if(isset($_POST['update-status'])){
  $id = $_POST['id'];
  $status = $_POST['status'];
  $link->query("UPDATE `orders` SET `status` = '{$status}' WHERE `id` = '$id'");
}
header("Location: ../admin-order.php");

?>