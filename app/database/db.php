<?php

require('connect.php');

//Функция вывода на страницу всей информации, полученной при запросе SELECT
function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
};

//Функция проверки на ошибки в подключении к БД
function dbCheckError($query){
    $errInfo = $query->errorInfo();   //записываем сообщения об ошибках в переменную errorInfo
    if($errInfo[0]!==PDO::ERR_NONE){
        echo "Ошибка:".$errInfo;
        exit();
    };
    return true;    //Возможно пригодится для дальнейшей логики
};

//Функция выбора данных из одной таблицы
function select($table, $selectAll=true, $params =[]){
    global $pdo;
    $sql = "SELECT * FROM $table";   //запрос
    //Модификация запроса, если были заданы параметры
    if(!empty($params)){    //проверяем, не пустой ли массив $params (задан ли он при вызове, так как изначально пустой)
        $i=0;   //создаем инкремент для дальнейшей логики
        foreach($params as $key => $value){
            if(!is_numeric($value)){    //Если значение ключа не является числом, то мы обрамляем его в кавычки (например email)
                $value = "'".$value."'";
            };
            if($i == 0){    //Если был задан один параметр то, к запросу добавится следующая запись
                $sql = $sql . " WHERE $key = $value";
            }else{          //Если параметров было больше одного, тогда такая
                $sql = $sql . " AND $key = $value";
            }
            $i++;   //Увеличиваем инкремент каждую итерацию
        };
    };
    $query = $pdo->prepare($sql);   //Подготавливаем запрос
    $query->execute();  //Выполняем запрос
    dbCheckError($query);
    return $selectAll ? $query->fetchAll() : $query->fetch();    //Получать все или только одну запись?
};

tt(select('users'));