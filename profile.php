<?php include("app\include\header.php");?>
<link rel="stylesheet" href="assets\styles\profile.css">
<main>
    <div class="content">
        <div class="column">
            <h1 class="username"><?=strtoupper($_SESSION['login'])?></h1>
    
            <div class="balance">
                <p>Баланс: <?=select('users', false, ['id'=>$_SESSION['id']])['money']?> e</p>
            </div>
            <div class="rang">
                <p class="rang_name">Новичек</p>
                <progress id="progress_bar" value="50" max="100"></progress>
            </div>

            <div class="stats">
                <h2>Статистика игрока:</h2>
                <ul>
                    <li>Игр сыграно: 0</li>
                    <li>Всего выиграно: 0</li>
                    <li>Рейтинг: 5</li>
                    <li>Дата регистрации: <?=select('users', false, ['id'=>$_SESSION['id']])['created']?></li>
                </ul>
            </div>
            <div class="last_row">
                <div class="promocode_area">
                    <input type="text" placeholder="ПРОМОКОД">
                    <button><img src="assets\img\check.png" alt="check"></button>
                </div>
                <div class="logout_btn">
                    <button><a href="<?=BASE_URL?>logout.php">Выйти</a></button>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include("app\include\\footer.php") ?>