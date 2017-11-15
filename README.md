# Avg Speed Generator

## Uruchomienie lokalne

### jak uruchomić
```
composer install
```

Po zaciągnięciu zależności przez composer, zostanie utworzona baza lokalna o podanej nazwie (wartość domyślna: symfony).
Następnie należy zbudować schemat bazy oraz uzupełnić ją danymi używając polecenia:

```
php bin/console doctrine:migrations:migrate
```

Następnie należy użyć poniższej komendy w celu uruchomienia serwera lokalnego z aplikacja:

```
php bin/console server:run
```

Aplikacja będzie dostępna pod adresem:

```
http://localhost:8000/avg-speed
```


W razie problemów z uruchomieniem aplikacji proszę o kontakt

