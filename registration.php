<?php include ("path.php");
include ("app\controls\users.php");
?>
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
        <?php 
        if($regStatus){
          echo "<div class='end_of_reg'>";
          echo "<p class='reg_succsesful'>Пользователь $login успешно зарегестрирован!</p>";
          echo "<p class='have_an_account'>Теперь вы можете войти в свой аккаунт на странице <a href='" . BASE_URL . "'>авторизации</a></p>";
          echo "</div>";
        } else{
          echo '<div class="introduction">';
          echo '<div class="greeting">';
          echo'    <h2>Создание аккаунта</h2>';
          echo'</div>';
          echo'<div class="error_msg">';
          echo'  <p>' . $errMsg . '</p>';
          echo'</div>';
          echo "<form method='post' action='registration.php'>";
          echo "<input type='text' placeholder='Придумайте имя пользователя' class='input_reg' name='login' value='" . $login . "'>";
          echo '<input type="email" placeholder="Введите свой email" class="input_reg" name="mail" value="' . $mail . '">';
          echo '<input type="password" placeholder="Придумайте свой пароль" class="input_reg input_password" name="password">';
          echo '<input type="password" placeholder="Повторите пароль" class="input_reg input_password" name="password_submit">';
          echo '<input type="submit" value="Зарегистрироваться" class="input_submit">';
          echo '<p class="have_an_account">Есть аккаунт? <a href="'. BASE_URL . '">Войдите</a></p>';
          echo '</form>';
        }
        ?>
    </main>
    <?php
    include("app\include\\footer_auth.php");
    ?>
  </body>
</html>