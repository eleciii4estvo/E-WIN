<?php
include ("app\database\db.php");
$errMsg = '';
$regStatus=false;

if($_SERVER['REQUEST_METHOD']==='POST'){    //Проверяем что метод запроса - пост, это означает что пользователь что то ввел и нажал кнопку регистрации, а не просто перешел по ссылке
    $login=trim($_POST['login']);
    $mail=trim($_POST['mail']);
    $password=trim($_POST['password']);
    $passwordSubmit=trim($_POST['password_submit']);

    
    if($login===''){
        $errMsg='Вы не ввели имя пользователя!';
    } elseif($mail===''){
        $errMsg='Вы не ввели адрес электронной почты!';
    }
    elseif($password=== ''){
        $errMsg='Вы не ввели пароль!';
    } elseif(mb_strlen($login, 'UTF8')<2){
        $errMsg='Имя пользователя не может быть меньше 2 символов!';
    } elseif($password!== $passwordSubmit){
        $errMsg='Пароли должны совпадать!';
    } elseif(select('users', false, ['email'=> $mail])){
        $errMsg='Пользователь с таким email уже существует!';
    } elseif(select('users', false, ['username'=> $login])){
        $errMsg='Пользователь с таким именем уже существует!';
    }
    else {
        $post=[
            'username'=> $login,
            'email'=> $mail,
            'password'=> password_hash($password, PASSWORD_DEFAULT)
        ];
        $id = insert('users', $post); 
        $regStatus=true;
    }
} else{
    $login='';
    $mail='';
};

