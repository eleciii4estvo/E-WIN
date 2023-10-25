<?php include ("path.php"); 
include ("app\database\db.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets\styles\main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;700&display=swap" rel="stylesheet">
    <title>E-WIN</title>
</head>
<body>
    <header>
        <div class="left_side">
            <a href="<?php echo BASE_URL?>"><img src="assets\img\logo.png" class="logo" alt="Logotype"></a>
            <nav class="header_nav_links">
                <ul>
                    <li class="nav_links_item"><a href="#">Главная</a></li>
                    <li class="nav_links_item"><a href="#">Игры</a></li>
                    <li class="nav_links_item"><a href="#">Топ</a></li>
                    <li class="nav_links_item"><a href="#">О проекте</a></li>
                </ul>
            </nav>
        </div>
        <div class="right_side">
            <p class="player_info"><a href="#"><img src="assets\img\profile_icon.png" alt="profile icon"><?php echo $_SESSION['login']?></a></p>
            <p><?php echo $_SESSION['money']?> e</p>
        </div>
    </header>