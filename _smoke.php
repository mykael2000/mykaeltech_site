<?php
// Temporary smoke test: boot the app and render GET /.
// Delete after use - must never be deployed.

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$request = Illuminate\Http\Request::create('/', 'GET');

try {
    $response = $kernel->handle($request);
    $status = $response->getStatusCode();
    $content = (string) $response->getContent();

    echo "STATUS: {$status}\n";
    echo 'LENGTH: '.strlen($content)."\n";

    if ($status >= 400) {
        echo "--- BODY ---\n";
        echo substr(strip_tags($content), 0, 2000)."\n";
    } else {
        echo "--- FIRST 400 ---\n";
        echo substr($content, 0, 400)."\n";
    }
} catch (Throwable $e) {
    echo "EXCEPTION: ".get_class($e)."\n";
    echo 'MESSAGE: '.$e->getMessage()."\n";
    echo 'AT: '.$e->getFile().':'.$e->getLine()."\n";
}
