<?php
try {
    $pdo = new PDO('mysql:host=127.0.0.1;port=3306', 'root', '');
    echo "MYSQL_OK\n";
} catch (Exception $e) {
    echo "MYSQL_FAIL: " . $e->getMessage() . "\n";
}
