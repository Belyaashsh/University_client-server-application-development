<?php
// Начало сессии
session_start();

// Уничтожение всех переменных сессии
session_unset();

// Уничтожение сессии
session_destroy();

// Удаление сессионных cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Отладочные сообщения
echo "Сессия завершена. Перенаправление на главную страницу...";

// Перенаправление на главную страницу через 3 секунды
header("Refresh:3; url=index.php");
exit;
?>
