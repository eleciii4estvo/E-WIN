<?php
require_once 'config.php';

$driver="mysql";
$host="localhost";
$port = "3306";   
$db_name="e-win";
$charset="utf8";
$options=[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

try{
    $pdo = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_pass, $options);
} catch(PDOException $e){
    die("Ошибка подключения к ДБ");
}

