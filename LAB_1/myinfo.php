<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $inf = fopen("info.txt", "r");
    $infs = fgets($inf);
    while($infs != 0){
        echo "$infs<br>";
        $infs = fgets($inf);
    }
    fclose($inf);
    ?>

    <a href="index.php"><br>Назад</a>
</body>
</html>