<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
  <tr>
    <tr>Color</tr>
    <tr>Name</tr>
  </tr>
  <?php
    $colors = array(
      "Red", 
      "Green", 
      "Blue"
    );
  
    foreach ($colors as $color) {
      echo "<tr>";
      echo "<td width=40px, style='background-color:$color;'></td>";
      echo "<td>$color</td>";
      echo "</tr>";
    }
    ?>
</table>
<a href="index.php"><br>Назад</a>
</body>
</html>