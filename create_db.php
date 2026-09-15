<?php
// setup.php — one-shot DB + migrate + seed
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = $_ENV['DB_HOST'] ?? '127.0.0.1';
$port = $_ENV['DB_PORT'] ?? '3306';
$user = $_ENV['DB_USERNAME'] ?? 'root';
$pass = $_ENV['DB_PASSWORD'] ?? '';
$db   = $_ENV['DB_DATABASE'] ?? 'mykaeltech';

try {
    $pdo = new PDO("mysql:host=$host;port=$port", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Throwable $e) {
    echo "FAIL connect: " . $e->getMessage() . PHP_EOL;
    exit(1);
}

try {
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "OK database $db ready" . PHP_EOL;
} catch (Throwable $e) {
    echo "FAIL create db: " . $e->getMessage() . PHP_EOL;
    exit(1);
}

echo "Running migrations..." . PHP_EOL;
passthru('php artisan migrate --force 2>&1');
echo PHP_EOL;

echo "Running seeder..." . PHP_EOL;
passthru('php artisan db:seed --force 2>&1');
echo PHP_EOL;

echo "Setup complete." . PHP_EOL;
