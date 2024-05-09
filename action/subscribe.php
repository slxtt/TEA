<?php
include "../components/core.php";
$email = $_POST['email'];
$check = $link->query("SELECT * FROM subscriptions WHERE email = '{$email}'");

if(isset($_POST['subscribe'])){
  if(empty($email)){
    echo "<script> alert('Строка email пуста'); 
    document.location.href = '../dostavka.php';</script>";
  }
  elseif($check->num_rows>0){
    echo "<script> alert('Данный email уже подписан'); 
    document.location.href = '../dostavka.php';</script>";
  }
  else{
    $link->query("INSERT INTO `subscriptions`(`email`) VALUES ('{$email}')");
    echo "<script> alert('Вы подписаны на уведомления'); 
    document.location.href = '../dostavka.php';</script>";
  }
}