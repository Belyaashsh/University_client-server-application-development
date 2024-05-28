<?php
// Данные для MySQL сервера
$DBHost = "localhost"; // Хост
$DBUser = "root"; // Имя пользователя
$DBPassword = ""; // Пароль
$DBName = "test2"; // Имя базы данных
$DBSocket = "/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock";

// Подключаемся к MySQL серверу
$Link = mysqli_connect($DBHost, $DBUser, $DBPassword, '', 0, $DBSocket);

// Проверяем соединение
if (!$Link) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

// Создаем БД
$Query = "CREATE DATABASE IF NOT EXISTS $DBName";
if (!mysqli_query($Link, $Query)) {
    die("Ошибка создания базы данных: " . mysqli_error($Link));
}

// Выбираем нашу базу данных
if (!mysqli_select_db($Link, $DBName)) {
    die("Ошибка выбора базы данных: " . mysqli_error($Link));
}

// Создаём таблицу customer
$Query = "CREATE TABLE IF NOT EXISTS customer (
    id INT(11) PRIMARY KEY AUTO_INCREMENT, 
    name VARCHAR(100), 
    tel VARCHAR(20)
)";
if (!mysqli_query($Link, $Query)) {
    die("Ошибка создания таблицы: " . mysqli_error($Link));
}
function search_by_phone($Link, $phone) {
    $phone = mysqli_real_escape_string($Link, $phone);
    $query = "SELECT * FROM customer WHERE tel = '$phone'";
    $result = mysqli_query($Link, $query);
    
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "ID: " . $row["id"] . "<br>";
                echo "Name: " . $row["name"] . "<br>";
                echo "Phone: " . $row["tel"] . "<br>";
                echo "<hr>";
            }
        } else {
            echo "Человек с таким номером телефона не найден.";
        }
    } else {
        echo "Ошибка запроса: " . mysqli_error($Link);
    }
}

// Проверяем, был ли передан номер телефона через GET-запрос
if (isset($_GET['phone'])) {
    $phone = $_GET['phone'];
    search_by_phone($Link, $phone);
} else {
    echo "Пожалуйста, укажите номер телефона для поиска.";
}

// Закрываем соединение
mysqli_close($Link);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Поиск по телефону</title>
</head>
<body>
    <form method="get" action="index.php">
        <label for="phone">Номер телефона:</label>
        <input type="text" id="phone" name="phone" required>
        <input type="submit" value="Поиск">
    </form>
</body>
</html>