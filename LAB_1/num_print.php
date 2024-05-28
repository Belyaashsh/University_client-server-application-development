<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <?php
        for ($i = 1; $i <= 100; $i++) {
          for ($j = 10; $j <= 23; $j++) {
            if ($j >= 12 and $j <= 15 and $j != 16) {
              echo "$j $j ";
            } else if ($j != 16) {
              echo "$j ";
            }
          }
          echo "<br>";
        }
        ?>
    </table>
    <a href="index.php"><br>Назад</a>
</body>
</html>