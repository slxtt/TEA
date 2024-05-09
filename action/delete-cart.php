<?php
include '../components/core.php';

if(isset($_POST['delete'])){
  unset($_SESSION['cart']);
}
header("Location: ../korzina.php")

?>

