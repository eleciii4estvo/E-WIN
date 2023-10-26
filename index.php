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
    <link rel="stylesheet" type="text/css" href="assets\styles\authorization.css">
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
                <h2>Добро пожаловать в E-Win!</h2>
            </div>
            <ul class="info">
                <li>Этот сайт предоставляет вам уникальную возможность насладиться азартом без необходимости вносить реальные деньги. </li>
                <li>Здесь есть свои правила. Вот некоторые из них:</li>
                <ul class="info_num">
                    <li>Монеты (ecoins)  раздаются бесплатно каждый час.</li>
                    <li>За внутриигровые монеты вы можете покупать себе различные титулы, которые будут видеть остальные.</li>
                    <li>Добавляйте других пользователей в друзья, чтобы просматривать истории игр и трофеи друг-друга.</li>
                    <li>Eдинственный способ тратить реальные деньги на этом проекте - это поддержать автора, за что вы получите уникальный символ рядом с никнеймом. </li>
                </ul>
                <li>Я благодарю вас за вашу поддержку и желаю незабываемых моментов на своем сайте!</li>
                <li>Регистрируйтесь и окунитесь в увлекательный мир развлечений. </li>
            </ul>
        </div>
        <form class="login" method='post' action='index.php'>
            <h1 class="auth_name">Авторизация</h1>
            <div class="error_msg">
                <p><?=$errMsg?></p>
            </div>
            <input value="<?=$login?>" type="text" placeholder="Имя пользователя или e-mail" class="input_login" name="login">
            <input type="password" placeholder="Пароль" class="input_login input_password" name="password">
            <input name="btn_ath" type="submit" value="Войти" class="input_submit">
            <p class="no_acc_inst">Нет аккаунта? <a href="<?php echo BASE_URL;?>registration.php">Зарегистрироваться</a></p>
        </form>
    </main>
    <?php
    include("app\include\\footer_auth.php");
    ?>
  </body>
</html>