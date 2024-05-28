<?php
$file_path = 'users.txt';

function read_users_from_file($file_path) {
    $users = array();
    if (file_exists($file_path)) {
        $file = fopen($file_path, 'r');
        if ($file) {
            while (($line = fgets($file)) != false) {
                $user_info = explode(':', trim($line));
                if (count($user_info) == 3) {
                    $username = $user_info[0];
                    $password = $user_info[1];
                    $keyword = $user_info[2];
                    $users[$username] = array('password' => $password, 'keyword' => $keyword);
                }
            }
            fclose($file);
        } else {
            echo "Ошибка при открытии файла.";
        }
    } else {
        echo "Файл не существует.";
    }
    return $users;
}

function authenticate($users) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (isset($users[$username]) && $users[$username]['password'] === $password) {
        return array(true, $users[$username]['keyword']);
    } else {
        return array(false, null);
    }
}

function change_password($users, $file_path) {
    $username = $_POST['username'];
    $keyword = $_POST['keyword'];
    if (isset($users[$username]) && $users[$username]['keyword'] === $keyword) {
        $new_password = $_POST['new_password'];
        $users[$username]['password'] = $new_password;
        $file = fopen($file_path, 'w');
        if ($file) {
            foreach ($users as $user => $info) {
                fwrite($file, "$user:{$info['password']}:{$info['keyword']}\n");
            }
            fclose($file);
            echo "Пароль успешно изменен.";
        } else {
            echo "Ошибка при открытии файла для записи.";
        }
    } else {
        echo "Неправильное имя пользователя или ключевое слово.";
    }
}

$users = read_users_from_file($file_path);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'authenticate') {
            list($authenticated, $keyword) = authenticate($users);
            if ($authenticated) {
                echo "Вы успешно вошли в систему. Ключевое слово: $keyword";
            } else {
                echo "Неправильное имя пользователя или пароль.";
            }
        } elseif ($_POST['action'] === 'change_password') {
            change_password($users, $file_path);
        }
    }
}
?>
