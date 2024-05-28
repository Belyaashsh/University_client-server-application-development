<!DOCTYPE html>
<html lang="en">
<head>
 <title>Форма ввода данных о пользователе</title>
</head>
<body>
 <h2>Введите данные о пользователе:</h2>
 <form action="login_process.php" method="post">
  <label for="name">ФИО:</label>
  <input type="text" id="name" name="name" required><br><br>
  <label for="email">E-mail:</label>
  <input type="email" id="email" name="email" required><br><br>
  <label for="phone">Телефон:</label>
  <input type="tel" id="phone" name="phone" required><br><br>
  <input type="submit" value="Отправить">
 </form>
 <a href="index.php"> Назад</a>
</body>
</html>