<?php
// Перевірка, чи дані були надіслані методом POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: guestbook.php");
    exit;
}

// Очищення та екранування введених даних
// *БЕЗПЕКА/ПОКРАЩЕННЯ:* nl2br() видалено; тепер воно в guestbook.php.
$name = trim($_POST['name'] ?? '');
$message = trim($_POST['message'] ?? '');

// Додаткова перевірка на порожні поля
if (empty($name) || empty($message)) {
    // Можна додати повідомлення про помилку тут, але поки що просто перенаправляємо
    header("Location: guestbook.php");
    exit;
}

// Екранування HTML-символів перед збереженням
$safe_name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$safe_message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

// Форматування дати
$date = date("Y-m-d H:i");

// Форматування рядка для файлу
$line = $safe_name . "|" . $safe_message . "|" . $date . "\n";

// Збереження
file_put_contents("data.txt", $line, FILE_APPEND | LOCK_EX); // Додано LOCK_EX для безпечного запису

header("Location: guestbook.php");
exit;
?>