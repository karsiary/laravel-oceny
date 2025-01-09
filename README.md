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

### 2. Instalacja zależności
Instalacja zależności PHP:
```bash
composer install
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

### 6. Kompilacja assetów
```bash
npm run build
```

### 7. Uruchomienie aplikacji
Uruchom serwer Laravel:
```bash
php artisan serve
```

W osobnym terminalu uruchom Vite (do hot-reload frontendu):
```bash
npm run dev
```

## Dostęp do aplikacji
Aplikacja będzie dostępna pod adresem: http://localhost:8000

### Panele użytkowników:
- Panel administracyjny: http://localhost:8000/admin
- Panel nauczyciela: http://localhost:8000/teacher
- Panel ucznia: http://localhost:8000/student

### Domyślne dane logowania
Administrator systemu:
```
Email: admin@example.com
Hasło: password
```

## Rozwiązywanie problemów
1. Jeśli występują problemy z uprawnieniami do katalogów storage i cache:
```bash
php artisan cache:clear
php artisan config:clear
chmod -R 777 storage bootstrap/cache
```

2. W przypadku problemów z bazą danych:
```bash
php artisan migrate:fresh --seed
```

3. Jeśli zmiany w plikach CSS/JS nie są widoczne:
```bash
npm run build
php artisan view:clear
``` 