# ✍️ Prosta Księga Gości (Simple Guestbook)

## Spis Treści
1. [Wprowadzenie](#1-wprowadzenie)
2. [Cel Projektu](#2-cel-projektu)
3. [Technologie](#3-technologie)
4. [Instalacja i Uruchomienie](#4-instalacja-i-uruchomienie)
5. [Struktura Plików](#5-struktura-plików)
6. [Zrzuty Ekranu (Screenshots)](#6-zrzuty-ekranu-screenshots)

---

## 1. Wprowadzenie

Prosty projekt **Księgi Gości** napisany w czystym PHP, służący jako praca zaliczeniowa/projektowa z podstaw programowania dynamicznych stron internetowych. Projekt umożliwia użytkownikom dodawanie krótkich wpisów, które są następnie trwale zapisywane w pliku tekstowym na serwerze.

**Autor:** Roman Vykyryk

## 2. Cel Projektu

Głównym celem projektu jest demonstracja i opanowanie następujących podstawowych umiejętności:

* **Przetwarzanie danych:** Odbieranie danych z formularza HTML (POST).
* **Bezpieczeństwo (podstawowe):** Stosowanie funkcji `htmlspecialchars()` w celu zapobiegania atakom typu Cross-Site Scripting (XSS).
* **Obsługa plików:** Zapisywanie danych do pliku tekstowego (`data.txt`) za pomocą `file_put_contents()` oraz ich odczytywanie za pomocą `file()`.
* **Struktura MVC (minimalna):** Rozdzielenie logiki (PHP) od prezentacji (HTML/CSS).

## 3. Technologie

Projekt wykorzystuje wyłącznie podstawowe, wbudowane narzędzia, co czyni go lekkim i prostym do uruchomienia.

* **Język Programowania:** PHP 7.4+
* **Stylizacja:** CSS3
* **Struktura:** HTML5
* **Baza Danych:** Plik tekstowy (`data.txt`)

## 4. Instalacja i Uruchomienie

Aby uruchomić ten projekt lokalnie, potrzebujesz środowiska serwera WWW z obsługą PHP (np. XAMPP, MAMP, Laragon).

1.  **Sklonuj Repozytorium:**
    ```bash
    git clone [LINK DO TWOJEGO REPOZYTORIUM]
    ```

2.  **Przenieś Pliki:**
    Skopiuj wszystkie pliki (`index.php`, `guestbook.php`, `save.php`, `style.css`) do folderu głównego swojego serwera (np. `htdocs` w XAMPP).

3.  **Uruchom Serwer:**
    Upewnij się, że Twój lokalny serwer WWW jest włączony.

4.  **Otwórz w Przeglądarce:**
    Otwórz projekt, wpisując w przeglądarce:
    ```
    http://localhost/sciezka_do_folderu/index.php
    ```

> **Uwaga:** Plik `data.txt` zostanie automatycznie utworzony przy próbie dodania pierwszego wpisu, jeśli nie istnieje.

## 5. Struktura Plików

| Plik | Opis |
| :--- | :--- |
| `index.php` | Strona główna z opisem projektu. |
| `guestbook.php` | Główna strona Księgi Gości. Zawiera formularz dodawania wpisu i wyświetla istniejące komentarze z pliku `data.txt`. |
| `save.php` | Skrypt PHP odpowiedzialny za walidację, zabezpieczenie danych i zapisanie ich do pliku. Następnie przekierowuje użytkownika z powrotem do `guestbook.php`. |
| `style.css` | Arkusz stylów CSS do formatowania wyglądu strony. |
| `data.txt` | Plik tekstowy, który służy jako prosta baza danych, przechowując wpisy w formacie `Imię|Wiadomość|Data`. |
