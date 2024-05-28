<!DOCTYPE html>
<html>
<head>
    <title>Содержимое файлов</title>
</head>
<body>

<h2>Содержимое файлов:</h2>

<?php
$file1 = 'file1.txt';
$file2 = 'file2.txt';
$file3 = 'file3.txt';


$handle1 = fopen($file1, "r");
$handle2 = fopen($file2, "r");
$handle3 = fopen($file3, "r");

// Счетчик строк
$line_number = 1;

// Чтение и вывод содержимого файлов
while (!feof($handle1) || !feof($handle2) || !feof($handle3)) {
    if (!feof($handle1)) {
        echo fgets($handle1) . " S1$line_number<br>";
    }
    if (!feof($handle2)) {
        echo fgets($handle2) . " S2$line_number<br>";
    }
    if (!feof($handle3)) {
        echo fgets($handle3) . " S3$line_number<br>";
    }
    $line_number++;
}

// Закрытие файлов
fclose($handle1);
fclose($handle2);
fclose($handle3);
?>
<a href="index.php">Назад<br></a>

</body>
</html>
