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
function select($table, $selectAll=true, $params =[], $custom=''){
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
    //Проверка на то, не введен ли пользовательский запрос?
    if (!empty($custom)){
        $sql = $custom;
    };
    $query = $pdo->prepare($sql);   //Подготавливаем запрос
    $query->execute();  //Выполняем запрос
    dbCheckError($query);
    return $selectAll ? $query->fetchAll() : $query->fetch();    //Получать все или только одну запись?
};
//Примеры использования
// tt(select('users', true, [], "SELECT * FROM users WHERE money>500"));
// tt(select('users'));

//Функция записи в БД
function insert($table, $params){
    global $pdo;
    $i=0;
    $columns ='';
    $mask='';
    foreach($params as $key => $value){
        if($i==0){
            $columns = $columns . "$key";
            $mask = $mask . "'$value'";
        } else{
            $columns = $columns . ", $key";
            $mask = $mask . ", '$value'";
        }
        $i++;
    }
    $sql = "INSERT INTO $table ($columns) VALUES ($mask)";   //запрос c заполнителями
    //Для отладки 
    // tt($sql);
    // exit();
    $query = $pdo->prepare($sql);   //Подготавливаем запрос
    $query->execute($params);  //Выполняем запрос
    dbCheckError($query);
    return $pdo->lastInsertId();
};
//для отладки insert
// $arrData = [
//     'admin'=>'0',
//     'username'=>'Andedsrson',
//     'email'=>'andadr@dropbox.com',
//     'password'=>'sadKASdsadw231L',
// ];
//  insert('users', $arrData);

//Обновление строки в таблице
function update($table, $id, $params){
    global $pdo;
    $i=0;
    $str ='';
    foreach($params as $key => $value){
        if($i==0){
            $str = $str . "$key = '$value'";
        } else{
            $str = $str . ", $key = '$value'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE id = $id";   //запрос
    //отладка
    // tt($sql);
    // exit();
    $query = $pdo->prepare($sql);   //Подготавливаем запрос
    $query->execute();  //Выполняем запрос
    dbCheckError($query);
};
//для отладки update
// $arrData=[
//     'admin'=>'1',
//     'username'=>'olakOslw',
//     'money'=>500,
// ];
// update('users', 3, $arrData);

//Удаление строки в таблице
function delete($table, $id){
    global $pdo;
    $sql = "DELETE FROM $table WHERE id = $id";   //запрос
    //отладка
    // tt($sql);
    // exit();
    $query = $pdo->prepare($sql);   //Подготавливаем запрос
    $query->execute();  //Выполняем запрос
    dbCheckError($query);
};

// delete('users', 3);