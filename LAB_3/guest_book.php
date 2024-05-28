<!DOCTYPE html>
<html>
<head>
    <title>Гостевая книга</title>
</head>
<body>

<h2>Гостевая книга</h2>

<?php
// Путь к файлу с записями
$file = 'guest_book.txt';

// Чтение содержимого файла
$messages = file($file);

// Вывод записей
foreach ($messages as $message) {
    // Разбиваем строку на части: имя пользователя, время добавления и текст сообщения
    list($name, $time, $text) = explode("|", $message);
    echo "<p><strong>$name</strong> ($time): $text</p>";
}
?>
<a href="index.php">Назад<br></a>

</body>
</html>
