<?php
session_start();
$link = new mysqli('localhost', 'root', '', 'tea');

function href($url){
  $url = "/$url.php";
  return " href= '$url'";
}
?>