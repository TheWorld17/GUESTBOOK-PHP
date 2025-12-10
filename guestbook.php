<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Księga gości</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>Księga gości</header>

<nav>
    <a href="index.php">Strona główna</a>
    <a href="guestbook.php">Księga gości</a>
</nav>

<div class="container">

    <h2>Dodaj wpis</h2>

    <form action="save.php" method="post">
        <input type="text" name="name" placeholder="Twoje imię" required maxlength="50">
        <textarea name="message" placeholder="Twoja wiadomość" rows="4" required></textarea>
        <button type="submit">Wyślij</button>
    </form>

    <hr>

    <h2>Wpisy użytkowników:</h2>

    <?php
    $file = "data.txt";

    // 1. АВТОМАТИЧНЕ СТВОРЕННЯ ФАЙЛУ (Якщо він не існує)
    if (!file_exists($file)) {
        // Спроба створити порожній файл.
        if (@file_put_contents($file, "") === false) {
             echo "<p class='error'>Błąd: Nie można utworzyć pliku $file. Sprawdź uprawnienia do zapisu!</p>";
             // Зупиняємо виконання, якщо створити не вдалося
             exit;
        }
    }

    // 2. ЧИТАННЯ ФАЙЛУ
    // Читаємо кожен рядок як окремий елемент масиву.
    // FILE_IGNORE_NEW_LINES: Видаляє \n з кінця кожного рядка.
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if (empty($lines)) {
        echo "<p>Brak wpisów...</p>";
    } else {
        // 3. ВІДОБРАЖЕННЯ: Сортуємо записи у зворотному порядку, щоб новіші були зверху.
        $lines = array_reverse($lines);

        foreach ($lines as $line) {
            // Розділяємо рядок на 3 частини: ім'я, повідомлення, дата.
            // Використовуємо @, щоб приховати попередження, якщо рядок пошкоджений (не має 3 частин).
            @list($name, $msg, $date) = explode("|", $line, 3);
            
            // Якщо рядок не містить усіх 3 частин, пропускаємо його.
            if (count(explode("|", $line)) !== 3) {
                continue;
            }

            // 4. БЕЗПЕКА: Обов'язкове екранування даних, отриманих із файлу, перед виведенням.
            $safe_name = htmlspecialchars($name);
            $safe_date = htmlspecialchars($date);
            
            // Відображаємо переноси рядків у повідомленні, які були збережені.
            $safe_msg = nl2br(htmlspecialchars($msg));

            // HTML-структура для відображення одного запису
            echo "<div class='message'>
                    <div class='name'>$safe_name</div>
                    <div class='date'>$safe_date</div>
                    <p>$safe_msg</p>
                  </div>";
        }
    }
    ?>

</div>

</body>
</html>