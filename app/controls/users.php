<?php
include ("app\database\db.php");
$errMsg = '';
$regStatus=false;

if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['btn_reg'])){    //Проверяем что метод запроса - пост, это означает что пользователь что то ввел и нажал кнопку регистрации, а не просто перешел по ссылке
    $login=trim($_POST['login']);
    $mail=trim($_POST['mail']);
    $password=password_hash(trim($_POST['password']), PASSWORD_ARGON2I);
    $passwordSubmit=password_hash(trim($_POST['password_submit']), PASSWORD_ARGON2I);
    if($login===''){
        $errMsg='Вы не ввели имя пользователя!';
    } elseif($mail===''){
        $errMsg='Вы не ввели адрес электронной почты!';
    } elseif($password=== ''){
        $errMsg='Вы не ввели пароль!';
    } elseif(mb_strlen($login, 'UTF8')<2){
        $errMsg='Имя пользователя не может быть меньше 2 символов!';
    } elseif(trim($_POST['password'])!== trim($_POST['password'])){
        $errMsg='Пароли должны совпадать!';
    } elseif(select('users', false, ['email'=> $mail])){
        $errMsg='Пользователь с таким email уже существует!';
    } elseif(select('users', false, ['username'=> $login])){
        $errMsg='Пользователь с таким именем уже существует!';
    } else {
        $post=[
            'username'=> $login,
            'email'=> $mail,
            'password'=> $password
        ];
        $id = insert('users', $post); 
        $regStatus=true;
        $user = select('users', false, ['id'=>$id]);
        $_SESSION['id']=$user['id'];
        $_SESSION['login']=$user['username'];
        $_SESSION['money']=$user['money'];
        header('location: '. BASE_URL . 'main.php');

    }
} else{
    $login='';
    $mail='';
};

if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['btn_ath'])){
    $login=trim($_POST['login']);
    $password=trim($_POST['password']);
    if($login==''){
        $errMsg='Вы не ввели логин!';
    } elseif($password== ''){
        $errMsg= 'Вы не ввели пароль!';
    } elseif(select('users', false, ['email'=>$login]) || select('users', false, ['username'=>$login])){
        select('users', false, ['email'=>$login]) ? $user_ath = select('users', false, ['email'=>$login]) : $user_ath = select('users', false, ['username'=>$login]);
        if(password_verify($password, $user_ath['password'])){
            $_SESSION['id']=$user_ath['id'];
            $_SESSION['login']=$user_ath['username'];
            $_SESSION['money']=$user_ath['money'];
            header('location: '. BASE_URL . 'main.php');
        } else {
            $errMsg= 'Имя пользователя или пароль введены неверно!';
        }
    }
}else{
    $login='';
};
