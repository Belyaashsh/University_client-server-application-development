<!DOCTYPE html>
<html lang="en">
<head>
 <title>Выбор формы</title>
</head>
<body>
<h2>Введите данные о таблице</h2>
 <form action="table_process.php" method="post">
  <label for="rows">Строчки</label>
  <input type="number" id="rows" name="rows" required><br><br>
  <label for="cols">Столбцы</label>
  <input type="number" id="cols" name="cols" required><br><br>
  <input type="submit" value="Отправить">
 </form>
 <a href="index.php">Назад</a>
</body>
</html>