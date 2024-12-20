# Backend Test

Questa è un'applicazione Laravel pronta per l'uso.

## Installazione

### 1. Configura l'applicazione

Crea il file `.env` copiandolo da `.env.example`:

```bash
cp .env.example .env
```

### 2. Genera la chiave dell'app

1. Esegui il seguente comando per generare una nuova chiave dell'applicazione:

```bash
./vendor/bin/sail php artisan key:generate
```

Nota: Se utilizzi Windows, Sail richiede WSL 2 per funzionare correttamente.

2. Modifica il file `.env` e configura i dettagli del database

```bash
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=backend_test
DB_USERNAME=sail
DB_PASSWORD=password
```

### 3. Avvia l'applicazione con Sail

Laravel Sail utilizza Docker Compose per gestire il tuo ambiente. Avvia il progetto eseguendo:

```bash
./vendor/bin/sail up
```

Nota: Se utilizzi Windows, Sail richiede WSL 2 per funzionare correttamente.

### 4. Esegui le migrazioni e i seeder del database

Con i container in esecuzione, esegui le migrazioni per configurare il database:

```bash
./vendor/bin/sail php artisan migrate
```

Puoi eseguire i seeder con:

```bash
./vendor/bin/sail php artisan db:seed
```
