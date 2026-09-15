<?php
// Start Laravel server in background
$descriptors = [
    0 => ['pipe', 'r'],
    1 => ['pipe', 'w'],
    2 => ['pipe', 'w'],
];
$process = proc_open('php artisan serve --host=127.0.0.1 --port=8000 2>&1', $descriptors, $pipes);
if (!is_resource($process)) {
    echo "FAIL: could not start server\n";
    exit(1);
}

// Wait for server to be ready
for ($i = 0; $i < 30; $i++) {
    usleep(500000); // 0.5s
    $result = @file_get_contents('http://127.0.0.1:8000');
    if ($result !== false) {
        echo "Server is up!\n";
        break;
    }
    echo "Waiting... ($i)\n";
}

// Fetch home page
$html = file_get_contents('http://127.0.0.1:8000');
echo "HOME PAGE (first 1000 chars):\n";
echo substr($html, 0, 1000) . "\n";
echo "\nTotal length: " . strlen($html) . "\n";

proc_close($process);
