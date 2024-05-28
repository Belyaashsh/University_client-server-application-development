<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = filter_var($_POST['name'], FILTER_UNSAFE_RAW);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);

      $isValidName = validateName($name);
      $isValidEmail = validateEmail($email);
      $isValidPhone = validatePhone($phone);


      if ($isValidName && $isValidEmail && $isValidPhone) {
        echo "Все данные введены корректно:<br>";
        echo "ФИО: " . htmlspecialchars($name) . "<br>";
        echo "E-mail: " . htmlspecialchars($email) . "<br>";
        echo "Телефон: " . htmlspecialchars($phone) . "<br>";
    } else {
        echo "Обнаружены ошибки в следующих полях:<br>";
        if (!$isValidName) {
            echo "ФИО должно содержать только русские буквы и начинаться с заглавной буквы.<br>";
        }
        if (!$isValidEmail) {
            echo "E-mail должен быть в правильном формате.<br>";
        }
        if (!$isValidPhone) {
            echo "Телефон должен быть в формате +71231234567 или 81231234567.<br>";
        }
    }
    }

    function validateName($name) {
      // Проверяем, что все слова начинаются с заглавной буквы и содержат только русские буквы
      $trimmedFullname = trim($name);

      return preg_match('/^(?:[А-ЯЁ][а-яё]+(?:\s+|$))+$/u', $trimmedFullname);

  }
  
  // Функция проверки e-mail
  function validateEmail($email) {
      // Проверяем формат e-mail
      return filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/^[a-zA-Z0-9_]+@[a-zA-Z0-9_]+\.[a-zA-Z0-9_]+$/', $email);
  }
  
  // Функция проверки телефона
  function validatePhone($phone) {
      // Проверяем формат телефона
      return preg_match('/^(\+7|8)[0-9]{10}$/', $phone);
  }
  ?>

  <a href="login.php"> Назад</a>
</body>
</html>