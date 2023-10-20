<?php include ("path.php"); ?>
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
        <form>
            <input type="text" placeholder="Придумайте имя пользователя" class="input_reg">
            <input type="email" placeholder="Введите свой email" class="input_reg">
            <input type="password" placeholder="Придумайте свой пароль" class="input_reg input_password">
            <input type="password" placeholder="Повторите пароль" class="input_reg input_password">
            <input type="submit" value="Зарегистрироваться" class="input_submit">
            <p class="have_an_account">Есть аккаунт? <a href="<?php echo BASE_URL;?>">Войдите</a></p>
        </form>
    </main>
    <?php
    include("app\include\\footer_auth.php");
    ?>
  </body>
</html>