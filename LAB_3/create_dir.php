<!DOCTYPE html>
<html>
<head>
    <title>Создание директории</title>
</head>
<body>

<h2>Введите имя директории:</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="text" name="name">
    <input type="submit" name="submit" value="Создать директорию">
</form>
<a href="index.php">Назад<br></a>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, было ли отправлено имя директории
    if (isset($_POST["name"])) {
        $name = $_POST["name"];
    
        if (!empty($name)) {
        
            if (mkdir($name)) {
                echo "Директория '$name' успешно создана.";
            } else {
                echo "Ошибка при создании директории '$name'.";
            }
        } else {
            echo "Пожалуйста, введите имя директории.";
        }
    }
}
?>

</body>
</html>
