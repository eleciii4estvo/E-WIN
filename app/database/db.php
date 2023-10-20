<?php

require('connect.php');

//Функция вывода на страницу всей информации, полученной при запросе SELECT
function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
};

//Функция выбора всего из выбранной таблицы
function selectAll($table){
    global $pdo;
    $sql = "SELECT * FROM $table";   //запрос
    $query = $pdo->prepare($sql);   //Подготавливаем запрос
    $query->execute();  //Выполняем запрос
    $errInfo = $query->errorInfo();   //записываем сообщения об ошибках в переменную errorInfo
    if($errInfo[0]!==PDO::ERR_NONE){
        echo "Ошибка:".$errInfo;
        exit();
    };
    return $query->fetchAll();
}

tt(selectAll('users'));