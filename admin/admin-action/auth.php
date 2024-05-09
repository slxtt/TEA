<?php
include '../../components/core.php';

if(isset($_POST['go-admin'])){
  $users = $link->query("SELECT * FROM users WHERE login = '{$_POST['login']}' AND password = '{$_POST['password']}'");

  if($users->num_rows !=1){
      $_SESSION['errors']['login'] = "Логин или пароль не совпадают";
      header("Location: ".$_SERVER['HTTP_REFERER']);
  }

  if(!isset($_SESSION['errors'])){
      $user = $users -> fetch_assoc();
      $_SESSION['user']['id'] = $user['id'];
      header("Location: ../admin.php");
  }
}

?>