<?php
try {
    $Response = file_get_contents('http://127.0.0.1:8000');
    echo 'HTTP_OK length=' . strlen($Response) . PHP_EOL;
    echo substr($Response, 0, 800) . PHP_EOL;
} catch (Exception $e) {
    echo 'HTTP_FAIL: ' . $e->getMessage() . PHP_EOL;
}