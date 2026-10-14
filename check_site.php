<?php
// Check if the site is accessible
$url = 'http://localhost:8080/index.php';
$html = @file_get_contents($url);
if ($html === false) {
    echo 'Failed to fetch: ' . $url . PHP_EOL;
    exit(1);
}

echo 'Fetched: ' . strlen($html) . ' bytes' . PHP_EOL;
echo 'Has CSS: ' . (strpos($html, 'style.css') !== false ? 'Yes' : 'No') . PHP_EOL;
echo 'Has JS: ' . (strpos($html, 'main.js') !== false ? 'Yes' : 'No') . PHP_EOL;

$checks = [
    'Hero section' => 'Build. Learn.',
    'Stats section' => 'counter',
    'Services section' => 'Our Services',
    'CTA section' => 'Ready to Transform',
    'Footer include' => '</footer>',
];
foreach ($checks as $name => $needle) {
    echo $name . ': ' . (strpos($html, $needle) !== false ? 'Found' : 'MISSING') . PHP_EOL;
}

// Check for PHP errors in output
if (strpos($html, 'Fatal error') !== false || strpos($html, 'Parse error') !== false || strpos($html, 'Warning:') !== false) {
    echo PHP_EOL . '!! PHP errors detected in output:' . PHP_EOL;
    preg_match_all('/(Fatal error|Parse error|Warning:).*/', $html, $m);
    foreach (array_slice($m[0], 0, 5) as $err) {
        echo '  ' . $err . PHP_EOL;
    }
} else {
    echo PHP_EOL . 'No PHP errors detected.' . PHP_EOL;
}

// Smoke-test all main pages
echo PHP_EOL . '=== Page smoke test ===' . PHP_EOL;
$pages = ['index.php', 'services.php', 'portfolio.php', 'team.php', 'contact.php', 'login.php', 'register.php', 'dashboard.php', '404.php'];
foreach ($pages as $page) {
    $h = @file_get_contents('http://localhost:8080/' . $page);
    if ($h === false) {
        echo str_pad($page, 16) . 'FETCH FAIL' . PHP_EOL;
        continue;
    }
    $err = 'OK';
    if (strpos($h, 'Fatal error') !== false || strpos($h, 'Parse error') !== false) {
        $err = 'PHP ERROR';
        preg_match('/(Fatal error|Parse error)[^<]*/', $h, $m);
        if (isset($m[0])) $err .= ' -> ' . substr($m[0], 0, 120);
    } elseif (strpos($h, '</html>') === false) {
        $err = 'INCOMPLETE (no closing html)';
    }
    echo str_pad($page, 16) . $err . ' (' . strlen($h) . ' bytes)' . PHP_EOL;
}
