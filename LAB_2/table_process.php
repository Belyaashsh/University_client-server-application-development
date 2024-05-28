<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<?php
if(isset($_POST['rows']) && isset($_POST['cols'])){
    $rows = $_POST['rows'];
    $cols = $_POST['cols'];
    echo "<table border='1'>";
    for($i=1;$i<=$rows;$i++){
        echo "<tr>";
        for($j=1;$j<=$cols;$j++){
            echo "<td>Строка ".$i.", Столбец ".$j."</td>" ;
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>
<a href="table.php">Назад<a>
</body>
</html>