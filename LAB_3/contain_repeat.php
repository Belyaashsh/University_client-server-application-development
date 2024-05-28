<!DOCTYPE html>
<html>
<head>
    <title>Список строк и их повторений</title>
</head>
<body>

<h2>Список строк и их повторений:</h2>

<ul>
<?php
// Путь к файлу
$file = 'file1.txt';

// Чтение содержимого файла
$file_content = file_get_contents($file);

// Разбиваем содержимое файла на строки
$lines = explode("\n", $file_content);

// Подсчет количества повторений каждой строки
$line_counts = array_count_values($lines);

// Вывод строк и их повторений
foreach ($line_counts as $line => $count) {
    echo "<li>$line - $count повторений</li>";
}
?>
</ul>
<a href="index.php">Назад<br></a>

</body>
</html>
