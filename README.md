# System zarządzania ocenami

## Wymagania wstępne
- PHP 8.1 lub wyższy
- Composer
- Node.js i npm
- MySQL/MariaDB
- Git

## Instrukcja instalacji i uruchomienia

### 1. Pobranie projektu
```bash
git clone [adres-repozytorium]
cd [nazwa-katalogu]
```

### 1.1 Pobieramy wersje PHP:
-8.1.31
[PHP](https://windows.php.net/downloads/releases/php-8.1.31-nts-Win32-vs16-x64.zip)

### 1.2 Podnieniamy plik php.ini:
Podmieniamy plik php.ini na plik z repozytorium.
/resources/php.ini



### 1.3 Problemy z zapisem php.ini:
Przenosimy aktualny plik ini do pulpitu,
a plik z repozytorium przenosimy do katalogu php

### 1.4 Instalujemy composera:
Nalezy pobrac i zainstalowac composera
Jako engine php wskazujemy mu wcześniej zainstalowana wersje php


### 1.5 Pobieramy xampa:
Pobranie oficnalnej wersji xamppa
[XAAMP](https://www.apachefriends.org/download_success.html)

### 1.6 Uruchamiany xampp:
Włączamy serwer apache oraz mysql

### 1.7 Dodajemy baze danych:
Dodajemy baze danych o takiej samej nazwie jak w pliku .env

### 2. Instalacja zależności
Instalacja zależności PHP:
```bash
composer install
```

### 2.1 Jeżeli install nie działa:
```bash
composer update
```

Instalacja zależności Node.js:
```bash
npm install
```

### 3. Konfiguracja środowiska
Skopiuj plik konfiguracyjny:
```bash
cp .env.example .env
```

Wygeneruj klucz aplikacji:
```bash
php artisan key:generate
```

### 4. Konfiguracja bazy danych
Skonfiguruj połączenie z bazą danych w pliku `.env`:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nazwa_twojej_bazy
DB_USERNAME=twoj_uzytkownik
DB_PASSWORD=twoje_haslo
```

### 5. Przygotowanie bazy danych
Wykonaj migracje:
```bash
php artisan migrate
```

Wgraj dane testowe:
```bash
php artisan db:seed
```

### 6. W osobnym terminalu uruchom Vite (do hot-reload frontendu):
```bash
npm run dev
```


### 7. Uruchomienie aplikacji
Uruchom serwer Laravel:
```bash
php artisan serve
```



## Dostęp do aplikacji
Aplikacja będzie dostępna pod adresem: http://localhost:8000



### Domyślne dane logowania
Administrator systemu:
```
Email: admin@example.com
Hasło: password
```
