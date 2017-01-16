<?php
if (isset($_POST['name']) && isset($_POST['text'])){
    // Переменные с формы
    $name = $_POST['name'];
    $text = $_POST['text'];

    // Параметры для подключения
    $db_host = "localhost";
    $db_user = "root"; // Логин БД
    $db_password = ""; // Пароль БД
    $db_name = "t_db"; // имя БД
    $db_table = "user"; // Имя Таблицы БД

    // Подключение к базе данных
    $db = mysqli_connect($db_host,$db_user,$db_password, $db_name) OR DIE("Не могу создать соединение ");

    // Выборка базы
//    mysqli_select_db("t_db", $db);

    // Установка кодировки соединения
//    mysqli_query("SET NAMES 'utf8'",$db);

    $sql = "INSERT INTO user (name,text) VALUES ('$name', '$text')";
    $result = mysqli_query($db, $sql);

    if ($result = 'true'){
        echo "Информация занесена в базу данных";
    }else{
        echo "Информация не занесена в базу данных";
    }
}
?>
<html>
<head>
</head>
<body>
<form method="POST" action="">
    <input name="name" type="text" placeholder="Имя"/>
    <input name="text" type="text" placeholder="Текст"/>
    <input type="submit" value="Отправить"/>
</form>
</body>
</html>