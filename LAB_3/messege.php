<?php

// Обработка формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $name = $_POST["name"];
    $text = $_POST["text"];
    

    $file = 'guest_book.txt';
    
    // Создаем строку с данными для записи в файл
    $message = "$name|" . date("Y-m-d H:i:s") . "|$text\n";
    
    // Добавляем запись в файл
    file_put_contents($file, $message, FILE_APPEND);
    
    // Перенаправляем пользователя обратно на страницу гостевой книги
    header("Location: guest_book.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Добавление записи в гостевую книгу</title>
</head>
<body>

<h2>Добавление записи в гостевую книгу</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Ваше имя: <input type="text" name="name"><br>
    Сообщение: <textarea name="text"></textarea><br>
    <input type="submit" value="Добавить запись">
</form>

<a href="index.php">Назад<br></a>

</body>
</html>
