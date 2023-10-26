<?php include ("path.php");
include ("app\controls\users.php");
if (isset($_SESSION['id'])){
    header("location: " . BASE_URL . "main.php");
    exit();
}?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets\styles\registration.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Login</title>
  </head>
  <body>
    <?php
        include("app\include\header_auth.php");
    ?>
    <main>
          <div class="introduction">
          <div class="greeting">
              <h2>Создание аккаунта</h2>
          </div>
          <div class="error_msg">
            <p><?=$errMsg?></p>
          </div>
          <form method='post' action='registration.php'>
            <input type='text' placeholder='Придумайте имя пользователя' class='input_reg' name='login' value='<?=$login?>'>
            <input type="email" placeholder="Введите свой email" class="input_reg" name="mail" value="<?=$mail?>">
            <input type="password" placeholder="Придумайте свой пароль" class="input_reg input_password" name="password">
            <input type="password" placeholder="Повторите пароль" class="input_reg input_password" name="password_submit">
            <input type="submit" value="Зарегистрироваться" name="btn_reg" class="input_submit">
            <p class="have_an_account">Есть аккаунт? <a href="<?=BASE_URL?>">Войдите</a></p>
          </form>
    </main>
    <?php 
    include("app\include\\footer_auth.php");
    ?>
  </body>
</html>